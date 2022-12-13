@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Komponen</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-4">
  <a href="{{ url('/dashboard/komponen/create') }}" class="btn btn-primary mb-3">Tambah Komponen</a>  {{-- create sudah default untuk form tambah data, tidak bisa diganti--}}
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Komponen</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($komponens as $komponen)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $komponen->name }}</td>
        <td>
          {{-- <a href="{{ url('/dashboard/staff/' .$s->id. '') }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
          <a href="{{ url('/dashboard/komponen/' .$komponen->id . '/edit') }}" class="badge bg-warning"><span data-feather="edit"></span></a>
          {{-- <form action="{{ url('/dashboard/staff/' . $s->id) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
          </form> --}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection


