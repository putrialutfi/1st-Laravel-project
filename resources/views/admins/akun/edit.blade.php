@extends('admins.template')

@section('main')
  <div id="akun">
    <h2>Edit Akun Admin</h2>

    {!! Form::model($akun, ['method' => 'PATCH', 'action' => ['AkunController@update', $akun->id]]) !!}
    @include('admins.akun.form', ['submitButtonText' => 'Update Akun'])
    {!! Form::close() !!}
  </div>
@stop

@section('footer')
  @include('admins.footer')
@stop
