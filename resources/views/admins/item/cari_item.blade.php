<div id="pencarian">
  {!! Form::open(['url' => 'admins/item/cari', 'method' => 'GET', 'id' => 'form-cari'])!!}

    <div class="row">
      <div class="col-md-4">
        {!! Form::select('id_produk', $list_produk, (!empty($id_produk) ? $id_produk : null), ['id' => 'id_produk', 'class' => 'form-control', 'placeholder' => '-Produk-']) !!}
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!! Form::text('kata_kunci', (!empty($kata_kunci)) ? $kata_kunci : null, ['id' => 'kata_kunci', 'class' => 'form-control', 'placeholder' => 'Masukkan Item']) !!}
        </div>
      </div>
      <div class="col-md-2">
        <div>
          {!! Form::button('Cari', ['class' => 'btn btn-info', 'type' => 'submit']) !!}
        </div>
      </div>
    </div>
  {!! Form::close()!!}
</div>
