@extends('admins.template')

@section('main')
  <div id="order">
    <h2>Portofolio</h2>

    @include('_partial.flash_message')

  @if(count($contoh_list) > 0)
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Portofolio</h4>
              <div style="float:right;">
								Jumlah Portofolio : {{ $jumlah_contoh }}
                <a href="contoh/create" class="btn btn-primary">Tambah Portofolio</a>
              </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
										<th>Nama Portofolio</th>
										<th>Deskripsi</th>
										<th>Link</th>
										<th>Produk</th>
										<th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($contoh_list as $contoh)
                    <tr>
											<td>{{ $contoh->nama_contoh }}</td>
											<td>{{ $contoh->deskripsi }}</td>
											<td>{{ $contoh->link }}</td>
											<td>{{ $contoh->produk->nama_produk}}</td>
                      <td>
												<div class="form-inline">
													<div class="box-button">
														{{ link_to('admins/contoh/' . $contoh -> id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
													</div>
													<div class="box-button">
														{{ link_to('admins/contoh/' . $contoh -> id . '/edit', 'Edit', ['class' => 'btn btn-warning  btn-sm']) }}
													</div>
													<div class="box-button">
														{!! Form::open(['method' => 'DELETE', 'action' => ['ContohController@destroy', $contoh->id]]) !!}
														{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
														{!! Form::close() !!}
													</div>
												</div>
                      </td>
                    </tr>
          					@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  @else
    <p> Tidak Ada Data</p>
  @endif

	<div style="float: right;">
		{{ $contoh_list -> links() }}
	</div>

  </div>
@stop
