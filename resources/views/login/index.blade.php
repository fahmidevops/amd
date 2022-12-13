@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-4">
    {{-- pesan bootstrap dismissing, hasil feedback dari register berhasil--}}
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif


    <main class="form-signin w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
      
      <form action="/login" method="post">
        @csrf
        {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <div class="form-floating mb-2">
        <label for="email">Email address</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autofocus>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
    
        {{-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
        <button class="w-100 btn btn-lg btn-danger" type="submit">Login</button>
        {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> --}}
      </form>

      {{-- <small class="d-block text-center mt-3">
        Not registered? <a href="/register" class="text-decoration-none">Register Now!</a>
      </small> --}}
    </main>
  </div>
</div>


@endsection