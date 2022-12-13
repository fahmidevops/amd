<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $date = date('Y-m-d', strtotime(now()));
        $agendas = Agenda::with(['type', 'staff'])->where('date', '>=', $date)->orderBy('date', 'desc')->get();
        $agendasCount = $agendas->count();

        return view('dashboard.index', [
            'coba' => 'testing controller',
            'agendasCount' => $agendasCount
        ]);
    }
}
