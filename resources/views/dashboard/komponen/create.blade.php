@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Komponen</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ url('/dashboard/komponen') }}" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
      @error('name')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ url('/dashboard/komponen/') }}" class="btn btn-warning">Batal</a>

  </form>
</div>



@endsection