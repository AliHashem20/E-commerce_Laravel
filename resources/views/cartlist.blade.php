{{-- we use here -> instead of [''] since $products here is object class not array (DB returns object) --}}

@extends('master')
@section('content')
    @if(count($products) > 0)
        <div class="custom-product">
            <div class="col-sm-10">
                <div class="trending-wrapper">
                    <h2>Result for Products</h2> <br>
                    <a href="ordernow" class="btn btn-success">Order Now</a><br><br>
                    @foreach ($products as $p)
                        <div class="row searched-item cart-list">
                            <div class="col-sm-3">
                                <a href="detail/{{ $p->id }}">
                                    <img src="{{ URL($p->gallery) }}" class="trending-image">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="">
                                    <h2>{{ $p->name }}</h2>
                                    <h5>{{ $p->description }}</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="/remove/{{ $p->cart }}" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <h1 style="margin: 20px;">No Results Found</h1>
    @endif
@endsection
