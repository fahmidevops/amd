<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardLapAgendaController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d', strtotime(now()));
        $agendas = Agenda::with(['type', 'staff'])->where('date', '<', $date)->orderBy('date', 'desc')->get();

        return view('dashboard.reports.agendas.index', [
            'agendas' => $agendas
        ]);
    }

    public function printpdf()
    {

        $date = date('Y-m-d', strtotime(now()));
        $agendas = Agenda::with(['type', 'staff'])->where('date', '<', $date)->orderBy('date', 'desc')->get();

        $pdf = Pdf::loadView('dashboard.reports.agendas.printpdf', [
            'agendas' => $agendas
        ])->setPaper('A4', 'landscape');

        return $pdf->stream('Laporan kegiatan.pdf');

        // $pdf = Pdf::loadView('dashboard.reports.agendas.index', $data)->setPaper('a4', 'portrait');
        // return $pdf->stream('daftar-agenda.pdf');

        // $pdf = PDF::loadView('hadir.printpdf', [
        //     'username' => auth()->user()->username,
        //     'rapat' => RapatModel::where('id', $id)->get(),
        //     'hadir' => HadirModel::where('rapat_id', $id)->get()
        // ])->setPaper('a4', 'potrait');
        // return $pdf->stream('Daftar-Hadir-Rapat.pdf');
    }
}
