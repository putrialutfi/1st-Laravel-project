@extends('template')

@section('main')
<h2 style="margin-bottom:20px; margin-top:40px;">ICT (Information and Communication Technologies)</h2>
<!-- Page Features -->
  <div class="row text-center">
    <?php $i = 0;
      foreach ($contoh_list1 as $contoh1) {
    ?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card" style="border:2px solid rgba(0,0,0,.125);">
          <img class="card-img-top" src="{{ asset('fotocontoh/'. $contoh1->fotocontoh )}}" alt="">
          <div class="card-body">
            <h4 class="card-title" style="color: #000;">{{ $contoh1->nama_contoh }}</h4>
            <p class="card-text">{{ $contoh1->deskripsi }}</p>
          </div>
          <div class="card-footer">
            {{ link_to('portofolio/' . $contoh1->id, 'Lihat', ['class' => 'btn btn-primary btn-block']) }}
          </div>
        </div>
      </div>
    <?php if (++$i == 4) break;
    } ?>
  </div>

  <br><br><br><br>

<h2 style="margin-bottom:20px; margin-top:40px;">CM (Creative Media)</h2>
  <!-- Page Features -->
    <div class="row text-center">
      <?php $i = 0;
        foreach ($contoh_list2 as $contoh2) {
      ?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card" style="border:2px solid rgba(0,0,0,.125);">
          <img class="card-img-top" src="{{ asset('fotocontoh/'. $contoh2->fotocontoh )}}" alt="">
            <div class="card-body">
              <h4 class="card-title" style="color: #000;">{{ $contoh2->nama_contoh }}</h4>
                <p class="card-text">{{ $contoh2->deskripsi }}</p>
            </div>
            <div class="card-footer">
              {{ link_to('portofolio/' . $contoh2->id, 'Lihat', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        </div>
      </div>
      <?php if (++$i == 4) break;
      } ?>
    </div>

    <br><br><br><br>
@stop

@section('footer')
  @include('footer')
@stop
