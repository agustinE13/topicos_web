@extends('layout.e-commerce')

@section('title','Product by category')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-4">          
        @foreach ($categories as $c)          
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            
            <ol class="carousel-indicators">
                @foreach ($c->products as $p)
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
               @endforeach
            </ol>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h1 class="d-block w-100">{{$c->name}}</h1>
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                @foreach ($c->products as $p)
              <div class="carousel-item">
                <img src="{{asset('img')}}/{{$p->image}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{$p->name}}</h5>
                  <p>${{$p->original_proce}}</p>
                </div>
              </div>              
              @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
          </div>
          @endforeach
        </div>
    </div>
@endsection
