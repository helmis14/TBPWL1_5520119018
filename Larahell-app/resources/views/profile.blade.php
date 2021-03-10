@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Isi Profile</p>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; {{ date('Y')}} <a href="http://ft.unsur.ac.id/" target="_blank">Fakultas Teknik, Universitas Suryakancana</a>.</strong>All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log( 'Hi!')</script>
@stop
