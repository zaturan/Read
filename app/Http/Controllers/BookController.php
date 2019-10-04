<?php


namespace App\Http\Controllers;

use App\Book;

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

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'img'=>'required',
            'title'=>'required|string',
            'desc' => 'required|string',
            'year' => 'required|integer',
            'price' => 'required|string'

          ]);



            $books = new Book([
                'img' => $request->get('img'),
                'title'=> $request->get('title'),
                'desc'=> $request->get('desc'),
                'year'=> $request->get('year'),
                'price'=> $request->get('price')

            ]);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/book/');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $books->img = $name;
              }

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

        return view('books.edit', compact('books'));
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
            'desc' => 'required|string',
            'year' => 'required|integer',
            'price'=> 'required|string'

          ]);

          $books = Book::find($id);
          $books->img = $request->get('img');
          $books->title = $request->get('title');
          $books->desc = $request->get('desc');

          $books->year  = $request->get('year');
          $books->price = $request->get('price');

          $books->save();

          return redirect('/books')/*->with('success', 'Book has been updated')*/;
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

        return redirect('/books')/*->with('success', 'Book has been deleted Successfully')*/;
    }
}
