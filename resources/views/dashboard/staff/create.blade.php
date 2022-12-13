@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Pegawai</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ url('/dashboard/staff') }}" class="mb-5">
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
    <div class="mb-3">
      <label for="position" class="form-label">Jabatan</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}" required>
      @error('position')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
      @error('email')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="telp" class="form-label">No Telp</label>
      <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp') }}">
      @error('telp')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="komponen_id" class="form-label">komponen</label> <label class="text-danger fs-5 fw-bold">*</label>
      <select class="form-select @error('komponen_id') is-invalid @enderror" name="komponen_id" required>
        <option selected disabled>--- Silahkan pilih ---</option>
        @foreach ($komponens as $komponen)
          @if (old('komponen_id') == $komponen->name)
            <option value="{{ $komponen->id }}" selected>{{ $komponen->name }}</option>
          @else
            <option value="{{ $komponen->id }}">{{ $komponen->name }}</option>  
          @endif
        @endforeach        
        
      </select>
      @error('komponen_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ url('/dashboard/staff/') }}" class="btn btn-warning">Batal</a>
  </form>
</div>



@endsection