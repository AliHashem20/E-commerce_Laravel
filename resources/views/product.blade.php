<?php
$c = 0;
?>



@extends('master')
@section('content')
    @if (count($products) > 0)
        <div class="custom-product">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($products as $p)
                        <li data-target="#myCarousel" data-slide-to="{{ $p['id'] }}"
                            class="{{ $p->id == 1 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach ($products as $p)
                        <div class="item <?php echo $c == 0 ? 'active' : ''; ?> ">
                            <?php
                            if (!$c) {
                                $c++;
                            }
                            ?>
                            <a href="detail/{{ $p['id'] }}">
                                <img class="slider-img" src="{{ URL($p['gallery']) }}">
                                <div class="carousel-caption slider-text">
                                    <h3>{{ $p['name'] }}</h3>
                                    <p>{{ $p['description'] }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="tranding-wrapper">
                <h3>Trending Products</h3>
                @foreach ($products as $p)
                    <div class="trending-item">
                        <a href="detail/{{ $p['id'] }}">
                            <img class="trending-image" src="{{ URL($p['gallery']) }}">
                            <div class="">
                                <h3>{{ $p['name'] }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <h1 style="margin: 20px;">No Results Found</h1>
    @endif
@endsection
