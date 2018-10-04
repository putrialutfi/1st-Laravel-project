@extends('admins.template')

@section('main')
<div id="contoh">
	<h2>Edit Portofolio</h2>

	{!! Form::model($contoh, ['method' => 'PATCH', 'action' => ['ContohController@update', $contoh->id], 'enctype' => 'multipart/form-data']) !!}

	@include('admins/contoh/form', ['submitButtonText' => 'Edit Portofolio'])

	{!! Form::close() !!}
</div>
@stop

@section('footer')
	@include('admins.footer')
@stop
