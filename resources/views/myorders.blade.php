{{-- we use here -> instead of [''] since $products here is object class not array (DB returns object) --}}

@extends('master')
@section('content')
    @if(count($products) > 0)
        <div class="custom-product">
            <div class="col-sm-10">
                <div class="trending-wrapper">
                    <h2>My Orders</h2> <br>
                    @foreach ($products as $p)
                        <div class="row searched-item cart-list">
                            <div class="col-sm-3">
                                <a href="detail/{{ $p->id }}">
                                    <img src="{{ URL($p->gallery) }}" class="trending-image">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <div class="">
                                    <h2><b>Name</b>: {{ $p->name }}</h2>
                                    <h5><b>Delivery Status</b>: {{ ucfirst($p->status) }}</h5>
                                    <h5><b>Address</b>: {{ $p->address }}</h5>
                                    <h5><b>Payment Status</b>: {{ ucfirst($p->payment_status) }}</h5>
                                    <h5><b>Payment Method</b>: {{ ucfirst($p->payment_method) }}</h5>
                                </div>
                                </a>
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
