@extends('layouts.app')

@section('title', trans('my_auctions.my_auctions'))

@section('content')
    <a class="small-button" href="{{ route('newBidding') }}">@lang('my_auctions.add_auction')</a>
    <h1>@lang('my_auctions.my_auctions')</h1>
    <h2>@lang('my_auctions.active')</h2>
    @include('partials.auction_table', ['auctions' => $activeAuctions])
    <h2>@lang('my_auctions.expired')</h2>
    @include('partials.auction_table', ['auctions' => $expiredAuctions])
    <h2>@lang('my_auctions.sold')</h2>
    @include('partials.auction_table', ['auctions' => $soldAuctions])
    @include('partials.scripts.remaining_time')
@endsection
