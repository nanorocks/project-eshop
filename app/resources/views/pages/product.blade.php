@extends('layout.master')
@section('title')
    {{ $product->title }}
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="header_text sub">
        <img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products" >
        <h4><span>{{ $product->slug }} | {{ $product->title }}</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <div class="row">
                    <div class="span4">
                        <a href="{{ $product->image }}" class="thumbnail" data-fancybox-group="group1" title="Description 1">
                            <img alt="" src="{{ asset($product->image) }}"></a>
                        <ul class="thumbnails small">
                            @foreach($product->productImages as $item)
                            <li class="span1">
                                <a href="{{ asset($item->image) }}" class="thumbnail" data-fancybox-group="group1" title="Description 2">
                                    <img src="{{ asset($item->image) }}" alt="{{ $product->title }}"></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="span5">
                        <address>
                            <h1>{{ $product->title }}</h1>
                            <strong>Category: <span>Apple</span></strong><br><br>
                            @if($product->hasLowerStock())
                                <p class="badge badge-warning">Low Stock</p><br>
                            @endif
                            @if($product->outOfStock())
                                <p class="badge badge-important">Out of stock</p><br>
                            @endif
                            <strong>SKU:</strong> <span>{{ $product->slug }}</span><br>
                            <strong>Brand:</strong> <span>Apple</span><br>
                        </address>
                        <h4><strong>Price: ${{ $product->price }}</strong></h4>
                    </div>
                    <div class="span5">
                        <form class="form-inline">
                            <br/>
                            <label class="checkbox">
                                <input type="checkbox" value=""> Be sure to include why it's great
                            </label>
                            <p>&nbsp;</p>
                            <label>Qty:</label>
                            <input type="number" min="1" max="{{ $product->stock }}" placeholder="1" class="input-mini" id="input-quantity" value="1" @if($product->outOfStock()) disabled='disabled' @endif>
                            <button class="btn btn-inverse" @if($product->outOfStock()) disabled='disabled' @endif onclick="Swal.fire(
                                'Good job!',
                                'You added your product to cart!',
                                'success'
                                ); window.location.href='/cart/add/{{$product->slug}}/' + document.getElementById('input-quantity').value">Add to cart</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="span9">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#home">Description</a></li>
                            <li class="{{ $product->additional != null ? ' ' : 'd-none' }}"><a href="#profile">Additional Information</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                            {{ $product->description }}
                            </div>
                            @if($product->additional != null)
                                <div class="tab-pane" id="profile">
                                    <table class="table table-striped shop_attributes">
                                        <tbody>
                                        @foreach(json_decode($product->additional, true) as $key => $attribute)
                                            <tr class="alt">
                                                <th>{{ strtoupper($key) }}</th>
                                                <td>{{ implode(" | ", $attribute) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="span9">
                        <br>
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel-1" class="carousel slide">
                            <div class="carousel-inner">
                                @for($i = 0; $i < count($products); $i++)
                                    <div class="{{ $i == 0 ? 'active' : '' }} item">
                                        <ul class="thumbnails">
                                            @foreach($products[$i] as $product)
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="/products/{{ $product->slug }}"><img src="{{ asset($product->image) }}"
                                                                                                         alt="{{ $product->title }}"/></a></p>
                                                        <a href="/products/{{ $product->slug }}" class="title">{{ $product->title }}</a><br/>
                                                        <a href="/shop?category=" class="category">category name</a>
                                                        <p class="price">${{ $product->price }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span3 col">
                <div class="block">
                    <ul class="nav nav-list">
                        <li class="nav-header">CATEGORIES</li>
                        <li><a href="products.html">Nullam semper elementum</a></li>
                        <li class="active"><a href="products.html">Phasellus ultricies</a></li>
                        <li><a href="products.html">Donec laoreet dui</a></li>
                    </ul>
                    <br/>
                    <ul class="nav nav-list below">
                        <li class="nav-header">BRANDS</li>
                        <li><a href="products.html">Adidas</a></li>

                    </ul>
                </div>
                <div class="block">
                    <h4 class="title">
                        <span class="pull-left"><span class="text">Randomize</span></span>
                        <span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
                    </h4>
                    <div id="myCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            @for($i = 0; $i < count($random); $i++)
                                <div class="{{ $i == 0 ? 'active' : '' }} item">
                                    <ul class="thumbnails">
                                        @foreach($random[$i] as $product)
                                            <li class="span3">
                                                <div class="product-box">
                                                    <span class="sale_tag"></span>
                                                    <p><a href="/products/{{ $product->slug }}"><img src="{{ asset($product->image) }}"
                                                                                                     alt="{{ $product->title }}"/></a></p>
                                                    <a href="/products/{{ $product->slug }}" class="title">{{ $product->title }}</a><br/>
                                                    <a href="/shop?category=" class="category">category name</a>
                                                    <p class="price">${{ $product->price }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="block">
                    <h4 class="title"><strong>Best</strong> Seller</h4>
                    <ul class="small-product">
                        @foreach($best as $product)
                        <li>
                            <a href="/products/{{ $product->slug }}" title="{{ $product->title }}">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                            </a>
                            <a href="#">{{ $product->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
    @parent
    <script>
        $(function () {
            // $('#myTab a:first').tab('show');
            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            })
        })
        $(document).ready(function() {
            $('#myCarousel-2').carousel({
                interval: 2500
            });
        });
    </script>
@stop
