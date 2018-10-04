@extends('admins.template')

@section('main')
  <div id="item">
    <h2>Item</h2>

    @include('_partial.flash_message')
    @include('admins.item.cari_item')

    @if(count($item_list) > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Item</th>
          <th>Produk</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($item_list as $item)
        <tr>
          <td>{{ $item->nama_item }}</td>
          <td>{{ $item->produk->nama_produk }}</td>
          <td>
            <div class="box-button">
              {!! Form::open(['method' => 'DELETE', 'action' => ['ItemController@destroy', $item->id]]) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
              {!! Form::close() !!}
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
      <p> Tidak Ada Item</p>
    @endif

    <div class="table-nav">
      <div class="jumlah-data">
        <strong>Jumlah Item: {{ $jumlah_item }}</strong>
      </div>
      <div class="paging">
        {{ $item_list->links() }}
      </div>
    </div>

  </div>

  <div class="tombol-nav">
		<div>
			<a href="item/create" class="btn btn-primary btn-block">Tambah Item</a>
		</div>
	</div>

@stop

@section('footer')
  @include('admins.footer')
@stop
