<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Author;
use Auth;

use Illuminate\Http\Request;

class BookController extends Controller
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
       // $genres = Genre::all();

        return view('books.index')->with('books', $books);

        //return view('books.index', ['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genres = Genre::all();
        $authors = Author::all();

        return view('books.create',compact('genres', 'authors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //print_r($request);
        $request->validate([
            'img'=>'required',
            'title'=>'required|string',
            // 'aut_id'=> 'required|integer',
            // 'genre_id'=> 'required|integer',
            'desc' => 'required|string',
            'year' => 'required|integer',
            'min_price' => 'required|digits_between:1,1000',
            'max_price' => 'required|digits_between:1,1000',
            'buyout_price' => 'required|digits_between:1,1000',
            'end_date' => 'required|date_format:m/d/y|after:today'
        ]);

        // echo "validate done";
        // print_var($request);
        // die();

        $books = new Book([
            'user_id' => Auth::id(),
            'img' => $request->get('img'),
            'title'=> $request->get('title'),
            'aut_id'=>$request->get('aut_id'),
            'genre_id'=>$request->get('genre_id'),
            'desc'=> $request->get('desc'),
            'year'=> $request->get('year'),
            'min_price'=> $request->get('min_price'),
            'max_price'=> $request->get('max_price'),
            'buyout_price'=> $request->get('buyout_price'),
            'end_date'=> $request->get('end_date')
        ]);

        // echo "book done";
        // die();


        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/book/');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $books->img = $name;
            }

            // echo "image done";
            // die();

           // $imageName = time().'.'.$request->img->getClientOriginalExtension();
           // $request->img->move(public_path('book/'), $imageName);


            $books->save();

            return redirect('/books')->with('success', 'Book has been added');


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
        $books = Book::find($id);
        $authors=Author::find($id);

        return view('books.edit', compact('books', 'authors'));
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
        $image_name = $request->hidden_image;
        $img = $request->file('img');

        $request->validate([
            'img'=>'required',
            'title'=> 'required|string',
            //'aut_id'=> 'required|integer',
            //'genre_id'=> 'required|integer',
            'desc' => 'required|string',
            'year' => 'required|integer',
            'min_price' => 'required|digits_between:1,8',
            'max_price' => 'required|digits_between:1,8',
            'buyout_price' => 'required|digits_between:1,8',
            //'end_date' => 'required|date_format:d/m/y|after:today|max:8'

          ]);

          $books = Book::find($id);
          $books->img = $request->get('img');
          $books->title = $request->get('title');
          $books->aut_id=$request->get('aut_id');
          $books->genre_id=$request->get('genre_id');
          $books->desc = $request->get('desc');
          $books->year  = $request->get('year');
          $books->min_price  = $request->get('min_price');
          $books->max_price = $request->get('max_price');
          $books->buyout_price=$request->get('buyout_price');
          $books->end_date=$request->get('end_date');


          if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('img/');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $books->img = $name;
          }


          $books->save();

          return redirect('/books');
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
        $books = Book::find($id);
        $books->delete();

        return redirect('/books');
    }
}
