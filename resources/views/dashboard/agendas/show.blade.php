@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">
      <div class="col-lg-8">
          <h1 class="mb-3">{{ $agenda->title }}</h1>
          
          <a href="{{ url('/dashboard/agendas') }}" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
          <a href="{{ url('/dashboard/agendas/' . $agenda->slug . '/edit') }}" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
          <form action="{{ url('/dashboard/agendas/' . $agenda->slug) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
          </form>
      
          <article class="my-3 fs-5">
              {{ $agenda->description }}
          </article>
          
      </div>
  </div>
</div>


{{-- <div class="mb-3">
  <a href="/posts">Back to Posts</a>
</div> --}}

@endsection