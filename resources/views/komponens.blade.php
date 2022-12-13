{{-- @dd($posts) komentar memberhentikan script die dump  --}} 

@extends('layouts.main')

@section('container')

    <h1 class="mb-5"> Post Komponen</h1>

    <div class="container">
        <div class="row">
            @foreach ($komponens as $komponen)    
                <div class="col-md-4">
                    <a href="/posts?category={{ $komponen->slug }}" class="text-white text-decoration-none">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/500x500? {{ $komponen->name }}" class="card-img" alt="{{ $komponen->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.6)">{{ $komponen->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection


