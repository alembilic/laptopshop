@extends('layouts.app')

@section('content')
    <style>
        .owl-stage-outer {
            height: auto !important;
        }

        #fh5co-product {
            padding: 2em 0;
        }

        .fh5co-tabs .fh5co-tab-nav li {
            width: 50%;
        }

        .fh5co-tabs .fh5co-tab-content-wrap {
            top: 0;
        }
    </style>
    <div id="fh5co-product">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 ">
                    @if(count(json_decode($product->image))==1)
                        <div class="active text-center">
                            <figure>
                                <img src="{{ Voyager::image(json_decode($product->image)[0]) }}" alt="user">
                            </figure>
                        </div>
                    @else
                        <div class="owl-carousel owl-carousel-fullwidth product-carousel">
                            @foreach(json_decode($product->image) as $img)
                                <div class="item">
                                    <div class="active text-center">
                                        <figure>
                                            <img src="{{ Voyager::image($img) }}" alt="user">
                                        </figure>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="row ">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>{{ $product->title }}</h2>
                            <p>
                                <a href="#" class="btn btn-primary btn-outline btn-lg">Add to Cart</a>
                                @guest
                                @else
                                    @if($reviewed=0)
                                        <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"
                                           class="btn btn-primary btn-outline btn-lg">
                                            Add a review</a>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form method="post" action="{{route('review')}}">
                                        <input type="hidden" name="product_id" value="{{$id}}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Add a review</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true" style="font-size: 20px">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Review:</label>
                                                    <textarea class="form-control" required name="review"
                                                              id="message-text"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rating"
                                                           class="col-form-label">Rating:</label>
                                                    <select name="rating" id="rating" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option selected value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary m-0"
                                                        data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary m-0 ml-4">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            @endif
                            @endguest
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="fh5co-tabs ">
                        <ul class="fh5co-tab-nav">
                            <li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i
                                                class="icon-file"></i></span><span
                                            class="hidden-xs">Product Details</span></a></li>
                            <li><a href="#" data-tab="2"><span class="icon visible-xs"><i
                                                class="icon-star"></i></span><span class="hidden-xs">Feedback &amp; Ratings</span></a>
                            </li>
                        </ul>

                        <!-- Tabs -->
                        <div class="fh5co-tab-content-wrap">

                            <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                                <div class="col-md-10 col-md-offset-1">
                                    <span class="price">Price: {{ $product->price }}KM</span>
                                    <h2>{{ $product->title }}</h2>
                                    <div>{!! $product->description !!}</div>

                                </div>
                            </div>

                            <div class="fh5co-tab-content tab-content" data-tab-content="2">
                                <div class="col-md-10 col-md-offset-1">
                                    <h3>Recent product reviews</h3>
                                    <div class="feed">
                                        @foreach($reviews as $review)
                                        <div>
                                            <blockquote>
                                                <p>{{ $review->review }}</p>
                                            </blockquote>
                                            <h3>&mdash; {{$review->user ? $review->user->name : ''}}</h3>
                                            <span class="rate">
                                                @for($i=1;$i<=$review->rating;$i++)
												<i class="icon-star2"></i>
												@endfor
											</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
