@extends('layouts.master')

@section('title')
    {{ $title ?? 'home' }}
@endsection

@section('content')
    <p><b>"Industri rokok,</b><strong><em> bunuh diri yang dilakukan secara sadar."</em></strong></p>

    {{-- <x-button.button  nameButton="kirim" classButton="btn btn-danger" typeButton="button"/>
    <x-button.button  nameButton="submit" classButton="btn btn-primary" typeButton="button"/> --}}
    {{-- <x-app-layouts >
        <x-button.button />
    </x-app-layouts> --}}

    {{-- <x-button /> --}}


@endsection