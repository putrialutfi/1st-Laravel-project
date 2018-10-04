<div id="pencarian">
  {!! Form::open(['url' => 'admins/order/cari', 'method' => 'GET', 'id' => 'form-cari'])!!}

    <div class="row">
      <div class="col-md-4">
        {!! Form::select('id_item', $list_item, (!empty($id_item) ? $id_item : null), ['id' => 'id_item', 'class' => 'form-control', 'placeholder' => '-Item-']) !!}
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!! Form::text('kata_kunci', (!empty($kata_kunci)) ? $kata_kunci : null, ['id' => 'kata_kunci', 'class' => 'form-control', 'placeholder' => 'Masukkan Nama (Customer)']) !!}
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
