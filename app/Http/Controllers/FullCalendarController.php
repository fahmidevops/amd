<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index()
    {

        $events = array();
        $dataEvents = Event::all();

        foreach ($dataEvents as $dataEvent) {
            $events[] = [
                'title' => $dataEvent->title,
                'start' => $dataEvent->start,
                // 'end'   => $dataEvent->end,
            ];
        }
        // return $events;

        return view('full-calendar', [
            'events' => $events
        ]);
    }

    // public function action(Request $request)
    // {
    //     // if ($request->ajax()) {
    //     //     if ($request->type == 'add') {
    //     //         $event = Event::create([
    //     //             'title' => $request->title,
    //     //             'start' => $request->start,
    //     //             'end' => $request->end
    //     //         ]);

    //     //         return response()->json($event);
    //     //     }
    //     // }

    //     if ($request->ajax()) {
    //         if ($request->type == 'add') {
    //             $event = Event::create([
    //                 'title'        =>    $request->title,
    //                 'start'        =>    $request->start,
    //                 'end'        =>    $request->end
    //             ]);

    //             return response()->json($event);
    //         }
    //     }
    // }
}


// {
//     public function index(Request $request)
//     {
//         if ($request->ajax()) {
//             $data = Event::whereDate('start', '>=', $request->start)
//                 ->whereDate('end',   '<=', $request->end)
//                 ->get(['id', 'title', 'start', 'end']);
//             return response()->json($data);
//         }
//         return view('full-calendar');
//     }

//     public function action(Request $request)
//     {
//         dd($request);
//         if ($request->ajax()) {
//             if ($request->type == 'add') {
//                 $event = Event::create([
//                     'title'        =>    $request->title,
//                     'start'        =>    $request->start,
//                     'end'        =>    $request->end
//                 ]);

//                 return response()->json($event);
//             }

//             if ($request->type == 'update') {
//                 $event = Event::find($request->id)->update([
//                     'title'        =>    $request->title,
//                     'start'        =>    $request->start,
//                     'end'        =>    $request->end
//                 ]);

//                 return response()->json($event);
//             }

//             if ($request->type == 'delete') {
//                 $event = Event::find($request->id)->delete();

//                 return response()->json($event);
//             }
//         }
//     }
// }
