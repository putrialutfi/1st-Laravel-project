<div id="pencarian">
  {!! Form::open(['url' => $urls, 'method' => 'GET', 'id' => 'form-search'])!!}

  <div class="row">
    <div class="col-md-2">
      {!! Form::select($ids, $lists, (!empty($id_kelas) ? $idv : null), ['id' => $ids, 'class' => 'form-control', 'placeholder' => $pholder])!!}
    </div>

    <div class="col-md-8">
      <div class="input-group">
        {!! Form::text('kata_kunci', (!empty($kata_kunci)) ? $kata_kunci : null, ['class' => 'form-control', 'placeholder' => $pholder2]) !!}
        <span class="input-group-btn">
          {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
        </span>
      </div>
    </div>
  </div>

  {!! Form::close()!!}
</div>
