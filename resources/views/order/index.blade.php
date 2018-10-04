@extends('template')

@section('main')
<h2>Order</h2>

<br><br><br>
<div class="row">
  <div class="col-sm-6 my-4">
    <div class="card" style="text-align: center;">
      <a href="order/create"><img src="{{ asset('img/ict.jpg') }}" style="width: 150px; height: 150px; text-align: center;" alt="">
      </a>
      <div class="card-body">
        <a href="order/create" style="text-align: center; font-weight: bolder; color:#000; font-weight: bold"> (ICT)<br>Information and <br>Communication Technologies</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 my-4">
    <div class="card" style="text-align: center;">
      <a href="order/create"><img src="{{ asset('img/cm.png') }}" style="width: 150px; height: 150; text-align: center;" alt="">
      </a>
      <div class="card-body">
        <a href="order/create" style="text-align: center;font-weight: bolder; color:#000; font-weight: bold">(CM)<br>Creative Media</a>
      </div>
    </div>
  </div>
</div>
<br><br><br>

<style type="text/css">
  .card img {
    transition: all .2s ease-in-out;
  }
  .card img:hover {
    transform: scale(1.1);
  }
 .container button:hover {
   background:#20B2AA;
   border-radius: 10px;
 }
 .container button {
   border-radius: 20px;
   border-color: yellow;
   width: 100px;
   height:70px;
   background:#00FA9A;
   margin-top: 30px;
   margin-right: 10px;
 }
</style>
@stop

@section('footer')
  @include('footer')
@stop
