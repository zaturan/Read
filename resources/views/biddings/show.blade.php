@extends('layouts.main')

@section('content')

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Book Details</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<!--================Single Product Area =================-->
@if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                 </div>
@endif

<?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 10; URL=$url");
?>

<div class="product_image_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">
                    <div class="single_product_img">
                        <img src="{{url('book/'.$books->img)}}" alt="image" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3>{{$books->title}}</h3>
                    <p>
                        {{$books->desc}}
                    </p>
                    <p>Minimum Price: RM{{$books->min_price}}</p>
                    <div class="card_area">

                        <form method="post" action="{{route('biddings.store', $books->id)}}" >
                        @csrf
                            @method('post')


                            <div class="product_count_area">
                                RM <input name="price" placeholder="Bid Price" />
                            </div>
                            <div class="product_count_area">
                                RM <input name="book_id" type="hidden" value="{{$books->id}}"/>
                            </div>
                            <div class="button">
                                <button type="submit" value="Submit">Add bid</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

@endsection
