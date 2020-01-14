<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Auth;
use DB;

use Illuminate\Http\Request;
use Redirect, Response;

class BookController extends Controller
{

    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        //$books = DB::table('books')->orderBy('id', 'asc')->paginate(5);
        Book::with('genres')->orderBy('id', 'asc')->paginate(5);
        //$genres = Genre::all();

        return view('books.index', compact('books', 'genres'));
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
        return view('books.create',compact('genres'));

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
            'desc' => 'required|string',
            'year' => 'required|integer',
            'min_price' => 'required|digits_between:1,1000',
            'max_price' => 'required|digits_between:1,1000',
            'buyout_price' => 'required|digits_between:1,1000',
            //'end_date' => 'required|date_format:m/d/y|after:today'
        ]);

        // echo "validate done";
        // print_var($request);
        // die();

        $books = new Book([
            'user_id' => Auth::id(),
            'img' => $request->get('img'),
            'title'=> $request->get('title'),
            'author'=>$request->get('author'),
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
        // $books = Book::where('user_id', Auth::users()->id);

        // return view('books.show', compact('books'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $books = Book::find($id);
        $genres = Genre::all();

        return view('books.edit', compact('books', 'genres'));
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
            'author'=> 'required|string',
            'genre_id'=> 'required|integer',
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
          $books->author=$request->get('author');
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

    // public function changeStatus(Request $request){
    //     $books = Book::find($request->book_id);
    //     $books->status = $request->status;
    //     $books->save();

    //     return response()->json(['success'=>'Status change successfully']);
    // }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchResults = Book::where([['title', 'like', "%{$query}%"], ['status', 'active']])->paginate(8);

        return view('search', compact('searchResults'));
    }
}
