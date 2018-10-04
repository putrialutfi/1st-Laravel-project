@extends('admins.template')

@section('main')
<div id="item">
	<h2>Tambah Item</h2>

  {!! Form::open(['url' => 'admins/item']) !!}
		<input type="hidden" name="_token" value="{{csrf_token()}}">

    @if ($errors -> any())
    	<div class="form-group {{ $errors -> has('nama_item') ? 'has-error' : 'has-success' }}">
    		@else
    		<div class="form-group">
    			@endif
    			{!! Form::label('nama_item', 'Nama Item : ', ['class' => 'control-label']) !!}
    			{!! Form::text('nama_item', null, ['class' => 'form-control']) !!}

    			@if ($errors -> has('nama_item'))
    				<span class="help-block">{{ $errors -> first('nama_item') }}</span>
    			@endif
    		</div>

        @if ($errors -> any())
        	<div class="form-group {{ $errors -> has('id_produk') ? 'has-error' : 'has-success' }}">
        		@else
        		<div class="form-group">
        			@endif
        			{!! Form::label('id_produk', 'Produk :', ['class' => 'control-label']) !!}
        			@if(count($list_produk) > 0)
        				{!! Form::select('id_produk', $list_produk, null, ['class' => 'form-control', 'id' => 'id_produk', 'placeholder' => 'Pilih Produk']) !!}
        			@else
        				<p>Tidak ada pilihan</p>
        			@endif
        			@if ($errors -> has('id_produk'))
        				<span class="help-block">{{ $errors -> first('id_produk') }}</span>
        			@endif
        		</div>

        <div class="form-group">
        		{!! Form::submit('Tambah Item', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
  </div>
@stop

@section('footer')
  @include('admins.footer')
@stop
