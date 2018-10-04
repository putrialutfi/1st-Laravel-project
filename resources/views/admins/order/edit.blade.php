@extends('admins.template')

@section('main')
<div id="order">
	<h2>Form Edit Order</h2>

	@include('_partial.flash_message')

  <br>

	{!! Form::model($order, ['method' => 'PATCH', 'action' => ['NotifController@update', $order->id], 'enctype' => 'multipart/form-data']) !!}
    @if(isset($order))
      {!! Form::hidden('id', $order->id) !!}
    @endif
    @if ($errors -> any())
    	<div class="form-group {{ $errors -> has('nama') ? 'has-error' : 'has-success' }}">
    		@else
    		<div class="form-group">
    			@endif
    			{!! Form::label('nama', 'Nama : ', ['class' => 'control-label']) !!}
    			{!! Form::text('nama', null, ['class' => 'form-control']) !!}
    			@if ($errors -> has('nama'))
    				<span class="help-block">{{ $errors -> first('nama') }}</span>
    			@endif
    		</div>

      @if ($errors -> any())
        <div class="form-group {{ $errors -> has('alamat') ? 'has-error' : 'has-success' }}">
          @else
          <div class="form-group">
            @endif
            {!! Form::label('alamat', 'Alamat : ', ['class' => 'control-label']) !!}
            {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
            @if ($errors -> has('alamat'))
              <span class="help-block">{{ $errors -> first('alamat') }}</span>
            @endif
          </div>

      @if ($errors -> any())
      	<div class="form-group {{ $errors -> has('email') ? 'has-error' : 'has-success' }}">
      		@else
          <div class="form-group">
      			@endif
      			{!! Form::label('email', 'Email : ', ['class' => 'control-label']) !!}
          	{!! Form::text('email', null, ['class' => 'form-control']) !!}
          	@if ($errors -> has('email'))
          		<span class="help-block">{{ $errors -> first('email') }}</span>
          	@endif
      		</div>

      @if ($errors -> any())
        <div class="form-group {{ $errors -> has('no_telp') ? 'has-error' : 'has-success' }}">
          @else
          <div class="form-group">
            @endif
            {!! Form::label('no_telp', 'Telepon : ', ['class' => 'control-label']) !!}
            {!! Form::text('no_telp', null, ['class' => 'form-control']) !!}
            @if ($errors -> has('no_telp'))
              <span class="help-block">{{ $errors -> first('no_telp') }}</span>
            @endif
          </div>

<!-- dropdown using ajax -->
					<div class="form-group">
                <label for="title">Pilih Produk :</label>
                <select name="id_produk" class="form-control" style="width:350px">
                    <option value="">- Produk -</option>
                    @foreach ($produks as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

			@if ($errors -> any())
			  <div class="form-group {{ $errors -> has('id_item') ? 'has-error' : 'has-success' }}">
			    @else
			    <div class="form-group">
			      @endif
          	<label for="title">Pilih Item :</label>
						<br><span>Item Terpilih : {{ $order->item->nama_item }}</span>
            <select name="id_item" class="form-control" style="width:350px">
							<option value="">- Item -</option>
            </select>
						@if ($errors -> has('id_item'))
              <span class="help-block">{{ $errors -> first('id_item') }}</span>
            @endif
      	</div>

						<script src="{{ asset('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}"></script>
						<script type="text/javascript">
    					$(document).ready(function() {
								$('select[name="id_produk"]').on('change', function() {
									var produkid = $(this).val();
									if(produkid) {
										$.ajax({
											url: 'edit/ajax/'+produkid,
											type: "GET",
											dataType: "json",
											success:function(data) {
												$('select[name="id_item"]').empty();
												$.each(data, function(key, value) {
													$('select[name="id_item"]').append('<option value="'+ key +'">'+ value +'</option>');
												});
											}
										});
									}else{
										$('select[name="id_item"]').empty();
									}
								});
							});
						</script>
<!-- end -->
        @if ($errors -> any())
          <div class="form-group {{ $errors -> has('detail') ? 'has-error' : 'has-success' }}">
            @else
            <div class="form-group">
              @endif
              {!! Form::label('detail', 'Keterangan : ', ['class' => 'control-label']) !!}
              {!! Form::textarea('detail', null, ['class' => 'form-control']) !!}
              @if ($errors -> has('no_telp'))
                <span class="help-block">{{ $errors -> first('detail') }}</span>
              @endif
            </div>

        @if($errors -> any())
    		<div class="form-group {{ $errors -> has('filebrief') ? 'has-error' : 'has-success'}}">
    			@else
        	<div class="form-group">
      			@endif
    				{!! Form::label('filebrief', 'File Brief : ') !!}
        		{!! Form::file('filebrief') !!}
        		@if($errors->has('filebrief'))
    				<span class="help-block">{{ $errors->first('filebrief') }}</span>
    				@endif
        	</div>

        <div class="form-group" style="margin-bottom: 50px;">
        		{!! Form::submit('Update', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
  </div>
  <br>
@stop

@section('footer')
  @include('admins.footer')
@stop
