@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Agenda Kegiatan</h1>
</div>



@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif


@if (!auth()->user()->is_admin)
  <div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm">
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
          <th scope="col">Keterangan</th>
          <th scope="col">Action</th>
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
          <td>{{ $agenda->description }}</td>
          <td>
            {{-- <a href="{{ url('/dashboard/agendas/' . $agenda->slug) }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="{{ url('/dashboard/agendas/' . $agenda->slug . '/edit') }}" class="badge bg-warning"><span data-feather="edit"></span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif

@can('admin')
  <div class="table-responsive col-lg-12">
    <a href="{{ url('/dashboard/agendas/create') }}" class="btn btn-primary mb-3">Buat Agenda Baru</a>  {{-- create sudah default untuk form tambah data, tidak bisa diganti--}}
    <table class="table table-striped table-sm">
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
          <th scope="col">Keterangan</th>
          <th scope="col">Action</th>
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
          <td>{{ $agenda->description }}</td>
          <td>
            {{-- <a href="{{ url('/dashboard/agendas/' . $agenda->slug) }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="{{ url('/dashboard/agendas/' . $agenda->slug . '/edit') }}" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="{{ url('/dashboard/agendas/' . $agenda->slug) }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endcan

@endsection


