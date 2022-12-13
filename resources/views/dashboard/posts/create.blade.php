@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create new post</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ url('/dashboard/posts') }}" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
      @error('title')        
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
        <option selected disabled>--- Silahkan pilih ---</option>
        @foreach ($categories as $category)
          @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>  
          @endif
        @endforeach       
      </select>
      @error('category_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label ">Post Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">  {{-- nama img-preview adalah class dibuat oleh kita sendiri untuk javascript sedangkan img-fluid adalah class bootstrap supaya gambar responsive--}}
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()"> {{-- perviewImage penamaan kita sendiri --}}
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      @error('body')
        <p class="text-danger"> {{ $message }}
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor input="body"></trix-editor>
    </div>


    <button type="submit" class="btn btn-primary">Create Post</button>
  </form>
</div>

<script> 
  // start fetch API Javascript untuk slug
  const title = document.querySelector('#title'); //mengambil data judul dari form dengan id title
  const slug = document.querySelector('#slug'); //mengisi data berupa slug yang sudah di proses fetch

  title.addEventListener('change', function(){
    fetch('{{ url("/dashboard/posts/checkSlug?title=") }}' + title.value) //kalau ada request ke URL ini,  
      .then(response => response.json()) //maka ambil isinya, nanti response nya akan dijalankan dengan method json
      .then(data => slug.value = data.slug) //json bentuknya promise kasih then lagi, dikembalikan dalam bentuk data, data ini akan mengganti slug.value (isi dari inputan slug di form). diambil dari data yg nama property nya slug
    });
    
  //agar tidak jalan fungsi attach file di trix editor
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault()
  });

  // -- end off slug --//
  
  // start untuk image
  function previewImage() {
    const image = document.querySelector('#image'); //ambil inputan id image kita
    const imgPreview = document.querySelector('.img-preview'); // ambil text image kosong
    
    const oFReader = new FileReader(); //ambil data gambarnya
    oFReader.readAsDataURL(image.files[0]);

    imgPreview.style.display = 'block';

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
  // -- end off image --//
</script>

@endsection