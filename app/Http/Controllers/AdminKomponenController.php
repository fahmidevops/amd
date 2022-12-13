<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Http\Request;

class AdminKomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.komponen.index', [
            'komponens' => Komponen::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.komponen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        // $validatedData['user_id'] = auth()->user()->id;

        // dd($validatedData);
        Komponen::create($validatedData);
        return redirect('/dashboard/komponen')->with('success', 'Data Komponen Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komponen  $komponen
     * @return \Illuminate\Http\Response
     */
    public function show(Komponen $komponen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komponen  $komponen
     * @return \Illuminate\Http\Response
     */
    public function edit(Komponen $komponen)
    {
        return view('dashboard.komponen.edit', [
            'komponen' => $komponen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komponen  $komponen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komponen $komponen)
    {
        $rules = [
            'name' => 'required'
        ];

        $validatedData = $request->validate($rules);


        // $validatedData['user_id'] = auth()->user()->id;

        Komponen::where('id', $komponen->id)
            ->update($validatedData);

        return redirect('/dashboard/komponen')->with('success', 'Data komponen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komponen  $komponen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komponen $komponen)
    {
        //
    }
}
