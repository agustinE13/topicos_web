@extends('layout.e-commerce')

@section('title','Product detail')
@section('content')
 

        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">

                                        @foreach ($products as $item)
                                        <img src="{{asset('img')}}/{{$item->image}}" alt="Product Image">
                                        @endforeach

                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        @foreach ($products as $item)
                                        <div class="slider-nav-img"><img src="{{asset('img')}}/{{$item->image}}" alt="Product Image"></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <!--inicio-->
                                        @foreach ($products as $item)
                                        <div class="title">
                                            <h2>{{$item->name}}</h2>
                                        </div>
                                        <div class="ratting">
                                            @for($i=0;$i<$item->ratting;$i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>${{$item->original_price}} <span>${{$item->sale_price}}</span></p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">S</button>
                                                <button type="button" class="btn">M</button>
                                                <button type="button" class="btn">L</button>
                                                <button type="button" class="btn">XL</button>
                                            </div> 
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">White</button>
                                                <button type="button" class="btn">Black</button>
                                                <button type="button" class="btn">Blue</button>
                                            </div> 
                                        </div>
                                        <div class="action">
                                            <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                            <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                        </div>
                                        @endforeach
                                        <!-- fin -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo. 
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        <div class="reviews-submitted">
                                            
                                            @foreach ($reviews as $item)
                                            <div class="reviewer">{{$item->name}}<span>{{$item->create_at}}</span></div>
                                            <div class="ratting">
                                                @for ($i = 0; $i < $item->ratting; $i++)
                                                <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            <p>
                                                {{$item->review}}
                                            </p>
                                                
                                            @endforeach                                         

                                        </div>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <form method="POST" action="{{ route('product_detail', ['id' => $item->id, 'category_id' => $item->category_id]) }}">
                                                @csrf
                                            <div class="rating">
                                                <i class="far fa-star" data-rating="1"></i>
                                                <i class="far fa-star text-warning" data-rating="2"></i>
                                                <i class="far fa-star text-warning" data-rating="3"></i>
                                                <i class="far fa-star text-warning" data-rating="4"></i>
                                                <i class="far fa-star text-warning" data-rating="5"></i>
                                            </div>
                                            <input type="hidden" name="ratting" id="rating" value="0">                          
                                          
                                            <div class="row form">
                                                <div class="col-sm-6">
                                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="email" name="email" value="{{old('email')}}" placeholder="Email">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea name="review"placeholder="Review">{{old('review')}}</textarea>
                                                </div>
                                                @foreach ($products as $item)
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                @endforeach
                                                <div class="col-sm-12">
                                                    <button>Submit</button>
                                                </div>
                                            </form>
                                            @if (session()->get('success'))
                                                <div class="alert alert-success text-center">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">

                                @foreach ($products_cat as $p) 
                                <div class="col-lg-3">
                                    
                                    <div class="product-item">
                                        <div class="product-title">
                                            
                                            <a href="#">{{$p->name}}</a>
                                           
                                            <div class="ratting">
                                                @for($i=0;$i<$p->ratting;$i++)
                                                <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="/product-detail/{{$p->id}}/{{$p->category_id}}">
                                                <img src="{{asset('img')}}/{{$p->image}}" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>{{$p->sale_price}}</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                   
                                </div>
                            
                            
                                @endforeach                        
 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    @foreach ($categories as $item)    
                                    <li class="nav-item">
                                        <a class="nav-link" href="/product-list/{{$item->id}}"><i class="fa {{$item->icon}}"></i>{{$item->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                @foreach($products_cat as $item)
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">{{$item->name}}</a>
                                        <div class="ratting">
                                            @for($i=0;$i<$item->ratting;$i++)
                                                <i class="fa fa-star"></i>
                                                @endfor
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="/product-detail/{{$item->id}}/{{$item->category_id}}">
                                            <img src="{{asset('img')}}/{{$item->image}}" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{$item->sale_price}}</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>  
                                @endforeach                         
                                

                            </div>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="#">Nulla </a><span>(45)</span></li>
                                <li><a href="#">Curabitur </a><span>(34)</span></li>
                                <li><a href="#">Nunc </a><span>(67)</span></li>
                                <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                                <li><a href="#">Fusce </a><span>(89)</span></li>
                                <li><a href="#">Sagittis</a><span>(28)</span></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
        @endsection