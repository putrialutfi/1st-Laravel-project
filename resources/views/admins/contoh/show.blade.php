@extends('admins.template')

@section('main')
  <div id="contoh">
    <h2>Detail Portofolio</h2>

    <table class="table table-striped">
      <tr>
        <th>Nama Portofolio :</th>
        <td>{{ $contoh->nama_contoh }}</td>
      </tr>
      <tr>
        <th>Deskripsi :</th>
        <td>{{ $contoh->deskripsi }}</td>
      </tr>
      <tr>
        <th>Link :</th>
        <td>{{ $contoh->link }}</td>
      </tr>
      <tr>
        <th>Produk :</th>
        <td>{{ $contoh->produk->nama_produk }}</td>
      </tr>
      <tr>
        <th>Foto</th>
  			<td>
  				@if(isset($contoh->fotocontoh))
  					<img src="{{ asset('fotocontoh/' . $contoh->fotocontoh) }}">
  				@else
  					<p>Tidak ada foto</p>
  				@endif
  			</td>
      </tr>
    </table>
  </div>
@stop

@section('footer')
  @include('admins.footer')
@stop
