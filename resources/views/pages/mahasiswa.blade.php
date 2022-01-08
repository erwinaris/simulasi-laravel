@extends('layouts.master')

@section('title')
    {{ $title ?? 'unknown title' }}
@endsection

@section('content')

{{-- @if (session('flash_message_success'))
    <div class="alert alert-success alert-dismissible fade show" id="swal" role="alert">
      {{ session('flash_message_success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('flash_message_danger'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('flash_message_danger') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif --}}


    @foreach ($tb_mahasiswa as $data)
        
    <div class="modal fade" id="staticBackdrop-{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">update data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/mahasiswa/{{ $data->id }}" method="post">
                    <div class="modal-body">
                        @method('put')
                        @csrf
                        <input type="text" name="tmbh_nim" placeholder="masukan nim" class="form-control @error('todo') is-invalid @enderror" value="{{ $data->nim }}">
                        
                        <input type="text" name="tmbh_nama" placeholder="masukan nama" class="form-control @error('todo') is-invalid @enderror mt-2" value="{{ $data->nama }}">
                        
                        <select class="form-select mt-2 text-capitalize" aria-label="Default select example" name="tmbh_jk">
                            {{-- <option selected>pilih gender</option> --}}
                            <option value="{{ ($data->jk == 'laki-laki') ? 'laki-laki' : 'perempuan' }}">{{ ($data->jk == 'laki-laki') ? 'laki-laki' : 'perempuan' }}</option>
                            <option value="{{ ($data->jk == 'perempuan') ? 'laki-laki' : 'perempuan' }}">{{ ($data->jk == 'perempuan') ? 'laki-laki' : 'perempuan' }}</option>
                            {{-- <option value="perempuan">{{ $data->jk }}</option> --}}
                        </select>
                        
                        <input type="text" name="tmbh_jurusan" placeholder="masukan jurusan" class="form-control @error('todo') is-invalid @enderror mt-2" value="{{ $data->jurusan }}">
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

<h2>simulasi tabel sederhana mahasiswa</h2>
<h5>Tambah mahasiswa</h5>

    <form action="/mahasiswa" method="post" class="row g-2 needs-validation" novalidate>
        @csrf
        <div class="col-md-3">
            <input type="text" name="tmbh_nim" placeholder="masukan nim" class="form-control @error('todo') is-invalid @enderror" value="{{ old('todo') }}" required>
            
            <input type="text" name="tmbh_nama" placeholder="masukan nama" class="form-control @error('todo') is-invalid @enderror mt-2" value="{{ old('todo') }}" required>

            {{-- <input type="text" name="tmbh_jk" placeholder="masukan jenis kelamin" class="form-control @error('todo') is-invalid @enderror mt-2" value="{{ old('todo') }}" required> --}}
            <select class="form-select mt-2 text-capitalize" aria-label="Default select example" name="tmbh_jk">
                <option selected>pilih gender</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
              

            <input type="text" name="tmbh_jurusan" placeholder="masukan jurusan" class="form-control @error('todo') is-invalid @enderror mt-2" value="{{ old('todo') }}" required>

            @error('todo')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <x-button typeButton="submit" classButton="btn btn-primary text-capitalize" valueButton="tambah" />
        </div>
    </form>

<br><br>

<table class="table text-capitalize">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Jurusan</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($tb_mahasiswa as $data_mhs)
      <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $data_mhs->nim }}</td>
            <td>{{ $data_mhs->nama }}</td>
            <td>{{ $data_mhs->jk }}</td>
            <td>{{ $data_mhs->jurusan }}</td>
            <td>
                <x-button typeButton="button" classButton="btn btn-info" valueButton="edit" bsToggle="modal" bsTarget="#staticBackdrop-{{ $data_mhs->id }}"/>
                
                <form action="/mahasiswa/{{ $data_mhs->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <x-button typeButton="submit" classButton="btn btn-danger" valueButton="delete" />
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
  </table>

  <br><br><br><br>
@endsection