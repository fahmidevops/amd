@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Laporan Kegiatan</h1>
</div>

  <div class="table-responsive col-lg-12">
    <a href="{{ url('/dashboard/reports_agendas/printpdf') }}" class="btn btn-primary mb-3" target="_blank">Print PDF</a>  
  </div>

  <!-- table responsive -->
  <div class="card">
    <div class="card-body">
        {{-- <h4 class="card-title">Table Responsive </h4>
        <h6 class="card-subtitle">Data table example</h6> --}}
        <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hari, Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Jenis Kegiatan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Komponen Pengundang</th>
                    <th scope="col">Dihadiri/Disposisi</th>
                    {{-- <th scope="col">Keterangan</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($agendas as $agenda)
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
                    {{-- <td>{{ $agenda->description }}</td> --}}
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


