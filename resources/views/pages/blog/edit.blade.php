{{-- @extends('layouts.master')

@section('title')
    {{ $title ?? 'unknown title' }}
@endsection

@section('content')
    
    <form action="/todo-list/{{ $edit->id }}" method="post">
        
        @method('put')
        @csrf
        <input type="text" name="lists" placeholder="masukan todo list kamu" value="{{ $edit->list }}"> <x-button typeButton="submit" classButton="btn btn-primary" valueButton="update" />
    </form>
@endsection --}}


@extends('layouts.master')

@section('content')
<form class="row g-3 needs-validation" novalidate>
    <div class="col-sm-3">
      <div class="">
        <input type="text" class="" required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
  </form>
@endsection
