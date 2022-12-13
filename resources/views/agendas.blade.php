{{-- @dd($agendas) komentar memberhentikan script die dump  --}} 

@extends('layouts.main')
@section('container')
    <h1 class="mb-3 text-center"> {{ $title }}</h1>
    <!-- table responsive -->
    <div class="card">
        <div class="card-body">
            {{-- <h4 class="card-title">Table Responsive </h4>
            <h6 class="card-subtitle">Data table example</h6> --}}
            <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-bordered table-striped no-wrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hari, Tanggal</th>
                            <th>Jam</th>
                            <th>Kegiatan</th>
                            <th>Jenis Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Komponen Pengundang</th>
                            <th>Dihadiri/Disposisi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ( $agendas as $agenda )
                            {{-- @dd($agenda->title) --}}
                            <tr> 
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $date = date('d M Y', strtotime($agenda->date));
                                        $day = date('D', strtotime($date));
                                        $dayList = array(
                                            'Sun' => 'Minggu', 
                                            'Mon' => 'Senin', 
                                            'Tue' => 'Selasa', 
                                            'Wed' => 'Rabu', 
                                            'Thu' => 'Kamis', 
                                            'Fri' => 'Jumat', 
                                            'Sat' => 'Sabtu'); 
                                    @endphp
                                    {{ $dayList[$day] .', '. $date }}
                                </td>
                                <td>{{ date('H:i', strtotime($agenda->time)) }}</td>
                                <td>{{ $agenda->title }}</td>
                                <td>{{ $agenda->type->name }}</td>
                                <td>{{ $agenda->location }}</td>
                                <td>{{ $agenda->komponen->name }}</td>
                                <td>@isset($agenda->staff)
                                    {{ $agenda->staff->name }}
                                    @endisset</td>
                                <td>{{ $agenda->description }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
