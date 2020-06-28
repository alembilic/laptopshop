@extends('layouts.app')

@section('content')
<style>
    #fh5co-product{
        padding: 2em 0;
    }
</style>
    <div id="fh5co-product">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Cool Stuff</span>
                    <h2>Products.</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
            <div class="row p-3">
                <div class="input-group" >
                    <form action="{{ route('products') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Search.." name="q" style="float: left;height: 42px;" value="{{ $q ?? '' }}">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </span>
                    </form>
                </div>
            </div>
            <div class="row">
                @include('layouts.products', $products)
            </div>
        </div>
    </div>

    <div class="text-center">
        {{ $products->links() }}
    </div>

@endsection
