@if(isset($contoh))
	{!! Form::hidden('id', $contoh->id) !!}
@endif

@if ($errors -> any())
	<div class="form-group {{ $errors -> has('nama_contoh') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
			@endif
			{!! Form::label('nama_contoh', 'Nama Portofolio : ', ['class' => 'control-label']) !!}
			{!! Form::text('nama_contoh', null, ['class' => 'form-control']) !!}

			@if ($errors -> has('nama_contoh'))
				<span class="help-block">{{ $errors -> first('nama_contoh') }}</span>
			@endif
		</div>



@if ($errors -> any())
	<div class="form-group {{ $errors -> has('deskripsi') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
			@endif
			{!! Form::label('deskripsi', 'Deskripsi:', ['class' => 'control-label']) !!}
			{!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}

			@if($errors -> has('deskripsi'))
				<span class="help-block">{{ $errors -> first('deskripsi')}}</span>
			@endif
		</div>

@if ($errors -> any())
  <div class="form-group {{ $errors -> has('link') ? 'has-error' : 'has-success' }}">
  	@else
  	<div class="form-group">
  		@endif
  		{!! Form::label('link', 'Link :', ['class' => 'control-label']) !!}
  		{!! Form::text('link', null, ['class' => 'form-control']) !!}

  		@if($errors -> has('link'))
  			<span class="help-block">{{ $errors -> first('link')}}</span>
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

@if($errors -> any())
<div class="form-group {{ $errors -> has('fotocontoh') ? 'has-error' : 'has-success'}}">
	@else
	<div class="form-group">
		@endif
		{!! Form::label('fotocontoh', 'Foto : ') !!}
		{!! Form::file('fotocontoh') !!}
		@if($errors->has('fotocontoh'))
		<span class="help-block">{{ $errors->first('fotocontoh') }}</span>
		@endif
	</div>

<div class="form-group">
		{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
