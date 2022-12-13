@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Komponen</h1>
</div>


<div class="col-lg-8">
  <form method="post" action="{{ url('/dashboard/komponen/' . $komponen->id) }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $komponen->name) }}" required>
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