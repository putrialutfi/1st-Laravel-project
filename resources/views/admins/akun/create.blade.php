@extends('admins.template')

@section('main')
  <div id="akun">
    <h2>Tambah Akun Admin</h2>

    {!! Form::open(['url' => 'admins/akun']) !!}
    @include('admins.akun.form', ['submitButtonText' => 'Tambah Akun'])
    {!! Form::close() !!}
  </div>
@stop

@section('footer')
  @include('admins.footer')
@stop
