@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Dokumen Baru</h1>
</div>

{{-- @dd(auth()->user()) --}}

<div class="col-lg-8">
  <form method="POST" action="{{ url('/dashboard/documents') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="date_doc" class="form-label">Tanggal Dokumen</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="date"  class="form-control @error('date_doc') is-invalid @enderror" id="date_doc" name="date_doc" value="{{ old('date_doc') }}" required autofocus>
      {{-- <input class="form-control datepicker" name="tanggal_awal" id="input-tanggal-awal" placeholder="Tanggal Awal" type="text" data-date-format="dd-mm-yyyy" value="{{ old('tanggal_awal', now()->format('d-m-Y')) }}"> --}}
      @error('date_doc')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>  
    <div class="mb-3">
      <label for="title" class="form-label">Nama Dokumen</label> <label class="text-danger fs-5 fw-bold">*</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}"   required>
      @error('title')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label" >Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}"  required>
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="type_id" class="form-label">Tipe Dokumen</label> <label class="text-danger fs-5 fw-bold">*</label>
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
      <label for="description" class="form-label">Keterangan</label>
      <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" >
      @error('description')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="image" class="form-label ">Upload Dokumen</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">  
      {{-- nama img-preview adalah class dibuat oleh kita sendiri untuk javascript sedangkan img-fluid adalah class bootstrap supaya gambar responsive--}}
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()"> {{-- perviewImage penamaan kita sendiri --}} 
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    {{-- <div class="mb-3">
      <label for="description" class="form-label">Keterangan</label>
      @error('description')
        <p class="text-danger"> {{ $message }}
      @enderror
      <input id="description" type="hidden" name="description" value="{{ old('description') }}">
      <trix-editor input="description"></trix-editor>
    </div> --}}


    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ url('/dashboard/documents/') }}" class="btn btn-warning">Batal</a>
  </form>
</div>

{{-- <a href="/dashboard/documents/"> simpan </a> --}}

<script> 
  // start fetch API Javascript untuk slug
  const title = document.querySelector('#title'); //mengambil data judul dari form dengan id title
  const slug = document.querySelector('#slug'); //mengisi data berupa slug yang sudah di proses fetch

  title.addEventListener('change', function(){
    fetch('{{ url("/dashboard/agendas/checkSlug?title=") }}' + title.value) //kalau ada request ke URL ini,  
      .then(response => response.json()) //maka ambil isinya, nanti response nya akan dijalankan dengan method json
      .then(data => slug.value = data.slug) //json bentuknya promise kasih then lagi, dikembalikan dalam bentuk data, data ini akan mengganti slug.value (isi dari inputan slug di form). diambil dari data yg nama property nya slug
    });
  
    
  // start untuk image
  // function previewImage() {
  //   const image = document.querySelector('#image'); //ambil inputan id image kita
  //   const imgPreview = document.querySelector('.img-preview'); // ambil text image kosong
    
  //   const oFReader = new FileReader(); //ambil data gambarnya
  //   oFReader.readAsDataURL(image.files[0]);

  //   imgPreview.style.display = 'block';

  //   oFReader.onload = function(oFREvent) {
  //     imgPreview.src = oFREvent.target.result;
  //   }
  // }    

  //agar tidak jalan fungsi attach file di trix editor
  // document.addEventListener('trix-file-accept', function(e) {
  //   e.preventDefault()
  // });

  // -- end off slug --//

</script>

@endsection