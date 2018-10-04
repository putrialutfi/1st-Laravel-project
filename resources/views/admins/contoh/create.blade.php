@extends('admins.template')

@section('main')
<div id="contoh">
	<h2>Tambah Portofolio</h2>

	{!! Form::open(['url' => 'admins/contoh', 'files' => true]) !!}
		<input type="hidden" name="_token" value="{{csrf_token()}}">

	@include('admins/contoh/form', ['submitButtonText' => 'Tambah Portofolio'])

	{!! Form::close() !!}
</div>
@stop

@section('footer')
	@include('admins.footer')
@stop
