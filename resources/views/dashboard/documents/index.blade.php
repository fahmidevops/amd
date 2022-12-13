@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Manajemen Dokumen</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif


@if (!auth()->user()->is_admin)
<div class="card">
  <div class="card-body">
      {{-- <h4 class="card-title">Table Responsive </h4>
      <h6 class="card-subtitle">Data table example</h6> --}}
      <div class="table-responsive m-t-40">
          <table id="config-table" class="table display table-bordered table-striped no-wrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tanggal Dokumen</th>
                  <th scope="col">Nama Dokumen</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">File</th>
                  <th scope="col">Tanggal Upload</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($documents as $document)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('Y-m-d', strtotime($document->date_doc)) }}</td>
                    <td>{{ $document->title }}</td>
                    <td>{{ $document->description }}</td>
                    <td>{{ $document->image }}</td>
                    <td>{{ date('Y-m-d H:i', strtotime($document->uploaded_at)) }}</td>
                    <td>
                      <a href="{{ url('../../storage/' . $document->image) }}" download="{{ $document->image }}" class="badge bg-info"><span data-feather="download"></span></a>
                      {{-- <a href="{{ url('/dashboard/documents/' . $document->slug . '/edit') }}" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                      <form action="{{ url('/dashboard/documents/' . $document->slug) }}" method="post" class="d-inline">
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
  </div>
</div> 
@endif

@can('admin')
  <div class="table-responsive col-lg-12">
    <a href="{{ url('/dashboard/documents/create') }}" class="btn btn-primary mb-3">Buat Data Baru</a>  {{-- create sudah default untuk form tambah data, tidak bisa diganti--}}
    
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
                  <th scope="col">Tanggal Dokumen</th>
                  <th scope="col">Nama Dokumen</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">File</th>
                  <th scope="col">Tanggal Upload</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($documents as $document)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('Y-m-d', strtotime($document->date_doc)) }}</td>
                    <td>{{ $document->title }}</td>
                    <td>{{ $document->description }}</td>
                    <td>{{ $document->image }}</td>
                    <td>{{ date('Y-m-d H:i', strtotime($document->uploaded_at)) }}</td>
                    <td>
                      <a href="{{ url('../../storage/' . $document->image) }}" download="{{ $document->image }}" class="badge bg-info"><span data-feather="download"></span></a>
                      {{-- <a href="{{ url('/dashboard/documents/' . $document->slug . '/edit') }}" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                      <form action="{{ url('/dashboard/documents/' . $document->slug) }}" method="post" class="d-inline">
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
  </div>
</div>
@endcan




@endsection


