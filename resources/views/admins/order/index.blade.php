@extends('admins.template')

@section('main')
  <div id="order">
    <h2>Notifikasi</h2>

    @include('_partial.flash_message')
    @include('admins.order.cari')

@if(count($order_list) > 0)
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Order</h4>
            <h5 style="text-align: right;">Jumlah Order: {{ $jumlah_order }}</h5>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Order</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($order_list as $order)
        					<tr>
        						<td>{{ $order->nama }}</td>
        						<td>{{ $order->item->nama_item }}</td>
        						<td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
        						<td>
                      <div class="form-inline">
          							<div class="box-button">
          								{{ link_to('admins/order/' . $order -> id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
          							</div>
                        <div class="box-button">{{ link_to('admins/order/' . $order->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}</div>
          							<div class="box-button">
          								{!! Form::open(['method' => 'DELETE', 'action' => ['NotifController@destroy', $order->id]]) !!}
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
  <p> Tidak Ada Order</p>
@endif

      <div style="float:right;">
        {{ $order_list->links() }}
      </div>

  </div>
@stop
