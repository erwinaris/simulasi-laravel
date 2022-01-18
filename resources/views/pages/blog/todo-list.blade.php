@extends('layouts.master')

@section('title')
    {{ $title ?? 'unknown title' }}
@endsection

@section('content')


{{-- @if (session('success'))
      {{ session('success') }}
@elseif(session('errors'))
    {{ session('errors') }}
@endif --}}
  
  <!-- Modal -->

  @foreach ($todo_lists as $data)
      
    <div class="modal fade" id="staticBackdrop-{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">update data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/todo-list/{{ $data->id }}" method="post">
            <div class="modal-body">
              @method('put')
              @csrf
              <input type="text" name="lists" placeholder="update todo list kamu" value="{{ $data->list }}">
            </div>
            <div class="modal-footer">
              <x-button typeButton="button" classButton="btn btn-danger" valueButton="close" bsDismiss="modal" />
              <x-button typeButton="submit" classButton="btn btn-primary" valueButton="update"/>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  @endforeach
  
<h2>Input Data</h2>
<h3>Simulasi menggunakan sweet alert</h3>
<h5>Tambah todo list</h5>
<form action="/todo-list" method="post" class="row g-2 needs-validation" novalidate>
    @csrf
    <div class="col-md-3">

      <input type="text" name="lists" placeholder="masukan todo list kamu" class="form-control @error('todo') is-invalid @enderror" value="{{ old('todo') }}" required>
      {{-- @error('todo')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror --}}
      
      <div class="invalid-feedback">
        masukan todo list
      </div>
      
    </div>
    <div class="col-md-3">
      <x-button typeButton="submit" classButton="btn btn-primary" valueButton="tambah" />
    </div>
</form>
<br><br>


<ol>
        
    @foreach ($todo_lists as $todo)
        <li>{{ $todo->list }}
            {{-- <a class="btn btn-info" href="/todo-list/{{ $todo->id }}" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">edit</a> --}}
            
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Launch static backdrop modal
            </button> --}}
            <x-button typeButton="button" classButton="btn btn-info" valueButton="edit" bsToggle="modal" bsTarget="#staticBackdrop-{{ $todo->id }}"/>
            
            <form action="/todo-list/{{ $todo->id }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <x-button typeButton="submit" classButton="btn btn-danger" valueButton="delete" />
              </form>
        </li> <br>
    @endforeach
    
</ol>

@endsection