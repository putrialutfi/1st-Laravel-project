@extends('template')

@section('main')
<link href="{{ asset ('css/produk.css')}}" rel="stylesheet">
<div class='containers'>
  <div class='highlight-window' id='product-img'>
    <img class="card-img-top" src="{{ asset('fotocontoh/'. $contoh->fotocontoh )}}" style="max-width:297px auto; max-height:528px auto; " alt="">
    <div class='highlight-overlay' id='highlight-overlay'></div>
  </div>
  <div class='window'>
    <div class='main-content'>
      <h2>{{ $contoh->nama_contoh }}</h2>
      <div class='description' id='description'>{{ $contoh->deskripsi }}</div>
      <div class='divider'></div>
        <div class='purchase-info'>
          <div>
            Link : <span style="color: #2980b9">{{ $contoh->link }}</span>
          </div>
        </div>
    </div>
  </div>
</div>
@stop

@section('footer')
  @include('footer')
@stop
