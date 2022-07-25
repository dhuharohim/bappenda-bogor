@extends('dashboard.base')

@section('title')
    {{ __('Kepala Kantor Dashboard') }}
@endsection

@section('verif')
    active
@endsection

@section('main-content')


    @livewire('verifikasi')
    
@endsection

@section('custom_js')

@endsection
