@extends('layouts.app')

@section('content')
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                @foreach($featuredProducts as $product)

                <li style="background-image: url({{ Voyager::image(json_decode($product->image)[0]) }});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">{{ $product->price }}KM</span>
                                    <h2>{{ $product->title }}</h2>
                                    <p>{{ substr(clean($product->description),0,150) }}...</p>
                                    <p><a href="{{ route('product', $product->id) }}" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>


    <div id="fh5co-services" class="fh5co-bg-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center " data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-credit-card"></i>
						</span>
                        <h3>Credit Card</h3>
                        <p>Possibility to buy with credit cards
                        </p>
                        {{--<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>--}}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center " data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-wallet"></i>
						</span>
                        <h3>Save Money</h3>
                        <p>The best prices and market conditions</p>
                        {{--<p><a href="#" class="btn btn-primary btn-outline">Learn Monre</a></p>--}}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center " data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-paper-plane"></i>
						</span>
                        <h3>Free Delivery</h3>
                        <p>Fast and free delivery for the whole BiH</p>
                        {{--<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fh5co-product">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Products.</h2>
                    <p>Our most popular products.</p>
                </div>
            </div>
            <div class="row">
                @include('layouts.products', $products=$popularProducts)
            </div>
        </div>
    </div>

    <div id="fh5co-testimonial" class="fh5co-bg-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Testimony</span>
                    <h2>Happy Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row ">
                        <div class="owl-carousel owl-carousel-fullwidth">
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="images/person1.jpg" alt="user">
                                    </figure>
                                    <span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
                                    <blockquote>
                                        <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="images/person2.jpg" alt="user">
                                    </figure>
                                    <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                    <blockquote>
                                        <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="images/person3.jpg" alt="user">
                                    </figure>
                                    <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                    <blockquote>
                                        <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
        <div class="container">
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-3 col-sm-6 ">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-eye"></i>
								</span>

                                <span class="counter js-counter" data-from="0" data-to="{{$views}}" data-speed="3000" data-refresh-interval="50">1</span>
                                <span class="counter-label">All visits</span>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-shopping-cart"></i>
								</span>

                                <span class="counter js-counter" data-from="0" data-to="450" data-speed="3000" data-refresh-interval="50">1</span>
                                <span class="counter-label">Happy Clients</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-shop"></i>
								</span>
                                <span class="counter js-counter" data-from="0" data-to="{{$productsNo}}" data-speed="3000" data-refresh-interval="50">1</span>
                                <span class="counter-label">All Products</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

                                <span class="counter js-counter" data-from="0" data-to="453" data-speed="3000" data-refresh-interval="50">1</span>
                                <span class="counter-label">Days since opening</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div id="fh5co-started">--}}
        {{--<div class="container">--}}
            {{--<div class="row ">--}}
                {{--<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">--}}
                    {{--<h2>Newsletter</h2>--}}
                    {{--<p>Just stay tune for our latest Product. Now you can subscribe</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row ">--}}
                {{--<div class="col-md-8 col-md-offset-2">--}}
                    {{--<form class="form-inline">--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="email" class="sr-only">Email</label>--}}
                                {{--<input type="email" class="form-control" id="email" placeholder="Email">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<button type="submit" class="btn btn-default btn-block">Subscribe</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
