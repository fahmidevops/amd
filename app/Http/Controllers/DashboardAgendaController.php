<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Staff;
use App\Models\Agenda;
use App\Models\Komponen;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;


class DashboardAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan semua Post berdasarkan user tertentu
    public function index()
    {
        // $agendas = Agenda::with(['type'])->get();
        $date = date('Y-m-d', strtotime(now()));
        $agendas = Agenda::with(['type', 'staff'])->where('date', '>=', $date)->orderBy('date', 'desc')->get();

        return view('dashboard.agendas.index', [
            'agendas' => $agendas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman Tambah Postingan
    public function create()
    {
        return view('dashboard.agendas.create', [
            // 'staffs' => Staff::all(),
            'komponens' => Komponen::orderBy('name', 'asc')->get(),
            'types' => Type::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // menjalankan fungsi tambah yang diatas
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:agendas', //untuk menjaga user edit slug, akan di cek kembali sdh ada atau belum data slugnya
            'type_id' => 'required',
            'location' => 'required',
            'komponen_id' => 'required',
            // 'staff_id' => '',
            // 'description' => ''      
        ]);


        $validatedData['user_id'] = auth()->user()->id;

        // dd($validatedData);
        Agenda::create($validatedData);

        // Kirim notifikasi email ini udah OK
        $date = date('d M Y', strtotime($validatedData['date']));
        $day = date('D', strtotime($date));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        $newEmail = [
            'title' => $validatedData['title'],
            'body' => 'Anda mendapatkan undangan kegiatan baru pada Hari ' . $dayList[$day] . ', ' . $date . ', harap lakukan pengecekan melalui aplikasi siap.bkkbn.go.id'
        ];

        $to = 'miftakhul.fahmi@gmail.com';

        Mail::to($to)->send(new SendEmail($newEmail));

        return redirect('/dashboard/agendas')->with('success', 'Agenda baru berhasil ditambahkan dan email notifikasi sudah terkirim ke pimpinan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    // melihat detail dari sebuah postingan
    public function show(Agenda $agenda)
    {
        return view('dashboard.agendas.show', [
            'agenda' => $agenda
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman ubah data
    public function edit(Agenda $agenda)
    {
        // $staffs = Staff::orderBy('name', 'asc')->get();

        return view('dashboard.agendas.edit', [
            'agenda' => $agenda,
            'staffs' => Staff::orderBy('name', 'asc')->get(),
            'komponens' => Komponen::orderBy('name', 'asc')->get(),
            'types' => Type::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */

    // halaman untuk proses perubahan datanya
    public function update(Request $request, Agenda $agenda) //untuk halaman /dashboard/agendas dengan method put
    {
        // dd($request);
        // (!auth()->user()->is_admin)
        if (!auth()->user()->is_admin) {
            $rules = [
                // 'date' => '',
                // 'time' => '',
                // 'title' => '',
                // 'type_id' => '',
                // 'location' => '',
                // 'komponen' => '',
                'staff_id' => '',
                'description' => ''
            ];
        } else {
            $rules = [
                'date' => 'required',
                'time' => 'required',
                'title' => 'required|max:255',
                'type_id' => 'required',
                'location' => 'required',
                'komponen_id' => 'required',
                // 'description' => ''
                // 'staff_id' => 'required',
            ];

            if ($request->slug != $agenda->slug) {
                $rules['slug'] = 'required|unique:agendas';
            }
        }


        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Agenda::where('id', $agenda->id)
            ->update($validatedData);

        if ((!auth()->user()->is_admin)) {
            $newEmail = [
                'title' => 'Kegiatan terbaru',
                'body' => 'Anda mendapatkan kegiatan baru, harap melakukan pengecekan melalui aplikasi siap.bkkbn.go.id'
            ];
            $email = Staff::where('id', $request->staff_id)->get();
            $to = $email[0]->email;

            Mail::to($to)->send(new SendEmail($newEmail));
        }

        return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil diupdate!');



        // data asli lamanya
        // $rules = [
        //     'date' => 'required',
        //     'time' => 'required',
        //     'title' => 'required|max:255',
        //     'type_id' => 'required',
        //     'location' => 'required',
        //     'komponen' => 'required',
        //     'staff_id' => 'required',
        //     'description' => ''
        // ];

        // if ($request->slug != $agenda->slug) {
        //     $rules['slug'] = 'required|unique:agendas';
        // }

        // $validatedData = $request->validate($rules);


        // $validatedData['user_id'] = auth()->user()->id;

        // Agenda::where('id', $agenda->id)
        //     ->update($validatedData);

        // return redirect('/dashboard/agendas')->with('success', 'Agenda has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    // delete postingan
    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);
        return redirect('/dashboard/agendas')->with('success', 'Agenda has been deleted');
    }


    // untuk mengisi slug otomatis dari script di crate.blade.php
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Agenda::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]); //dikasih data dalam bentuk json, supaya bisa di olah di script create.blade.php
    }
}
