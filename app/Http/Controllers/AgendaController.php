<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        // Data table
        $date = date('Y-m-d', strtotime(now()));
        $agendas = Agenda::with(['type', 'staff'])->where('date', '>=', $date)->orderBy('date', 'asc')->get();

        return view('agendas', [
            'title' => 'Agenda Pimpinan',
            'active' => 'agenda',
            'agendas' => $agendas
        ]);
    }

    public function home()
    {
        // Home calendar
        $events = array();
        $dataEvents = Agenda::all();

        // dd($dataEvents);
        foreach ($dataEvents as $dataEvent) {
            // $color = null;
            // if ($dataEvent->type_id == 1) {
            //     $color = 'red';
            // }

            $events[] = [
                'title' => $dataEvent->title,
                'start' => $dataEvent->date,
                // 'color' => $color
                // 'end'   => $dataEvent->end,
            ];
        }
        // return $events;

        return view('home', [
            "title" => "Home",
            "active" => "home",
            'events' => $events
        ]);
    }
}
