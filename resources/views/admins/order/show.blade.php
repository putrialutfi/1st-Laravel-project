@extends('admins.template')

@section('main')
  <div id="order">
    <h2>Detail Order</h2>

    <table class="table table-striped">
      <tr>
        <th>Nama :</th>
        <td>{{ $order->nama }}</td>
      </tr>
      <tr>
        <th>Alamat :</th>
        <td>{{ $order->alamat }}</td>
      </tr>
      <tr>
        <th>Email :</th>
        <td>{{ $order->email }}</td>
      </tr>
      <tr>
        <th>Telepon :</th>
        <td>{{ $order->no_telp }}</td>
      </tr>
      <tr>
        <th>Produk yang dipesan :</th>
        <td>{{ $order->item->nama_item }}</td>
      </tr>
      <tr>
        <th>Detail :</th>
        <td>{{ !empty($order->detail) ? $order->detail : "-" }}</td>
      </tr>
      <tr>
        <th>File Brief :</th>
        <td>
          @if(isset($order->filebrief))
          <a href="{{URL::to('filebrief/' . $order->filebrief)}}"><button type="button">Download File Brief</button></a>
          @else
          <span>Tidak ada file</span>
          @endif
        </td>
      </tr>
      <tr>
        <th>Tanggal Order :</th>
        <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
      </tr>
    </table>
  </div>
@stop

@section('footer')
  @include('admins.footer')
@stop
