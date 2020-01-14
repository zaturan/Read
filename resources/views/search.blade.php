@extends('layouts.app')

@section('content')

<div class="content">
    <div class="search-container">
        <form action="{{route('search', $books)}}">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

@endsection
