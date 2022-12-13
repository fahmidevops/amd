@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Agenda Baru</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ url('/dashboard/agendas') }}" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="date" class="form-label">Tanggal</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="date"  class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required autofocus>
      {{-- <input class="form-control datepicker" name="tanggal_awal" id="input-tanggal-awal" placeholder="Tanggal Awal" type="text" data-date-format="dd-mm-yyyy" value="{{ old('tanggal_awal', now()->format('d-m-Y')) }}"> --}}
      @error('date')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="time" class="form-label">Jam</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time') }}" required>
      @error('time')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Kegiatan</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}"   required>
      @error('title')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label" hidden>Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" hidden required>
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="type_id" class="form-label">Jenis Kegiatan</label> <label class="text-danger fs-5 fw-bold">*</label>
      <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" required>
        <option selected disabled>--- Silahkan pilih ---</option>
        @foreach ($types as $type)
          @if (old('type_id') == $type->id)
            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
          @else
            <option value="{{ $type->id }}">{{ $type->name }}</option>  
          @endif
        @endforeach       
      </select>
      @error('type_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="location" class="form-label">Tempat</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
      @error('location')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="komponen_id" class="form-label">Komponen Pengundang</label> <label class="text-danger fs-5 fw-bold">*</label>
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
    {{-- <div class="mb-3">
      <label for="staff_id" class="form-label">Kehadiran / Disposisi</label>
      <select class="form-select @error('staff_id') is-invalid @enderror" name="staff_id" required>
        <option selected disabled>--- Silahkan pilih ---</option>
        @foreach ($staffs as $staff)
          @if (old('staff_id') == $staff->id)
            <option value="{{ $staff->id }}" selected>{{ $staff->name }}</option>
          @else
            <option value="{{ $staff->id }}">{{ $staff->name }}</option>  
          @endif
        @endforeach       
      </select>
      @error('staff_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div> --}}
    
    {{-- <div class="mb-3">
      <label for="description" class="form-label">Keterangan</label>
      <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" required>
      @error('description')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div> --}}


    {{-- <div class="mb-3">
      <label for="description" class="form-label">Keterangan</label>
      @error('description')
        <p class="text-danger"> {{ $message }}
      @enderror
      <input id="description" type="hidden" name="description" value="{{ old('description') }}">
      <trix-editor input="description"></trix-editor>
    </div> --}}

    

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ url('/dashboard/agendas/') }}" class="btn btn-warning">Batal</a>
  </form>
</div>

<script> 
  // start fetch API Javascript untuk slug
  const title = document.querySelector('#title'); //mengambil data judul dari form dengan id title
  const slug = document.querySelector('#slug'); //mengisi data berupa slug yang sudah di proses fetch

  title.addEventListener('change', function(){
    fetch('{{ url("/dashboard/agendas/checkSlug?title=") }}' + title.value) //kalau ada request ke URL ini,  
      .then(response => response.json()) //maka ambil isinya, nanti response nya akan dijalankan dengan method json
      .then(data => slug.value = data.slug) //json bentuknya promise kasih then lagi, dikembalikan dalam bentuk data, data ini akan mengganti slug.value (isi dari inputan slug di form). diambil dari data yg nama property nya slug
    });
    
  //agar tidak jalan fungsi attach file di trix editor
  // document.addEventListener('trix-file-accept', function(e) {
  //   e.preventDefault()
  // });

  // -- end off slug --//
</script>

@endsection