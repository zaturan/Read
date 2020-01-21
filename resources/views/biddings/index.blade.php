@extends('layouts.main')

@section('content')

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Book List</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<!-- product list part start-->
<section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div>
                    <div class="product_list">
                        <div class="row">
                            @foreach($books as $book)
                            <div class="col-lg-4 col-sm-20">
                                <div class="single_product_item">
                                    <img src="{{url('book/'.$book->img)}}" alt="image" class="img-fluid" >
                                    <h3> <a href="{{route('biddings.show', $book->id)}}">{{$book->title}}</a> </h3>
                                    <p>Current Amount of Bid: RM{{$currentbid}}</p>
                                    <p>Price start from RM {{$book->min_price}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- product list part end-->

@endsection
