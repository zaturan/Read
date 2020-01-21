<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBid;

use App\Bid;
use App\Book;
use App\Author;
use App\Genre;
use Auth;
use DB;

class BiddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        Book::with('genres')->orderBy('id', 'asc')->paginate(5);
        $currentbid = Bid::orderBy('book_id', 'desc')->first()->price;

        return view('biddings.index', compact('books', 'genres', 'currentbid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $books)
    {
        $bids = new Bid(
            [
            'user_id' => Auth::id(),
            'book_id' => $request->get('book_id'),
            'price'=> $request->get('price'),
            ]);

        $bids-> save();

        return redirect('/biddings');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $books = Book::find($id);
        // $genres = Genre::find($id);

        return view('biddings.show',compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
