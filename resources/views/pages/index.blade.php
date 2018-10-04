@extends('template')

@section('main')
<div id="slider">
  <div id="slide-holder">
    <div class="slide"><img src="{{ asset('img/bg1.jpg') }}" alt="" /></div>
    <div class="slide"><img src="{{ asset('img/bg2.jpg') }}" alt="" /></div>
    <div class="slide"><img src="{{ asset('img/bg3.jpg') }}" alt="" /></div>
    <div class="slide"><img src="{{ asset('img/bg4.jpg') }}" alt="" /></div>
  </div>
</div>

      <!-- Start feature Area -->
    <section class="feature-area section-gap" id="service">
        <div class="row" style="text-align: center;">
          <div class="col-lg-6">
            <div class="single-feature d-flex flex-row pb-30">
              <img src="{{ asset('img/sicon.png') }}" style="width:80px;height:80px;">
              <div class="desc">
                <h5 class="text-uppercase" style="padding-top:10px; padding-bottom:10px;">EXCLUSIVE</h5>
                <p>
                  We can create exclusive products that are <br> different from others. easy to use and secure.                </p>
              </div>
            </div>
            <div class="single-feature d-flex flex-row pb-30">
              <img src="{{ asset('img/sicon2.png') }}" style="width:80px;height: 75px;">
              <div class="desc">
                <h5 class="text-uppercase" style="padding-top:10px; padding-bottom:10px;">MAINTENANCE</h5>
                <p>
                  Maintenance products are also guaranteed, so <br> no need to worry about damage to the system.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="single-feature d-flex flex-row pb-30">
              <img src="{{ asset('img/sicon3.png') }}" style="width:80px;height: 80px;">
              <div class="desc">
                <h5 class="text-uppercase" style="padding-top:10px; padding-bottom:10px;">INOVATION</h5>
                <p>
                  Continue to innovate and create new product<br> for you with the purpose to supply a solution.
                </p>
              </div>
            </div>
            <div class="single-feature d-flex flex-row pb-30">
              <img src="{{ asset('img/sicon4.png') }}" style="width:80px;height: 80px;">
              <div class="desc">
                <h5 class="text-uppercase" style="padding-top:10px; padding-bottom:10px;">SOLUTION</h5>
                <p>
                  Provide solutions to you of products and <br>services that we sell.
                </p>
              </div>
            </div>

          </div>
        </div>
    </section>
@stop

@section('footer')
  @include('footer')
@stop
