<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use App\Models\Staff;
use Illuminate\Http\Request;

class AdminStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.staff.index', [
            'staff' => Staff::orderBy('name', 'asc')->get(),
            'komponen' => Komponen::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.staff.create', [
            'komponens' => Komponen::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'email' => 'required|max:255',
            'telp' => '',
            'komponen_id' => 'required'
        ]);

        // $validatedData['user_id'] = auth()->user()->id;

        // dd($validatedData);
        Staff::create($validatedData);



        return redirect('/dashboard/staff')->with('success', 'Data Pegawai Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        // $komponens = $komponens->find(1);

        return view('dashboard.staff.edit', [
            'komponens' => Komponen::orderBy('name', 'asc')->get(),
            'staff' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {

        $rules = [
            'name' => 'required',
            'position' => 'required',
            'email' => 'required|max:255',
            'telp' => '',
            'komponen_id' => 'required'
        ];


        $validatedData = $request->validate($rules);


        // $validatedData['user_id'] = auth()->user()->id;

        Staff::where('id', $staff->id)
            ->update($validatedData);


        return redirect('/dashboard/staff')->with('success', 'Data pegawai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
