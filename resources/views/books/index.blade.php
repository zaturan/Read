@extends('layouts.app', ['activePage' => 'books', 'titlePage' => __('book')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Books') }}</h4>
                <p class="card-category"> {{ __('Here you can manage books') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary">{{ __('Add Book') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        <th>
                          {{ __('Image') }}
                      </th>
                      <th>
                          {{ __('Title') }}
                      </th>
                      <th>
                        {{ __('Description') }}
                      </th>
                      <th>
                        {{ __('Year') }}
                      </th>
                      <th>
                        {{ __('Price') }}
                      </th>
                      <th class="text-center" colspan="3">
                        {{ __(' Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($books as $book)
                        <tr>
                        <!-- <td>
                            <img src="{{asset('book/'. $book->img )}}" alt="image" width="50px" height="50px"/>
                          </td> -->
                          <td>
                          <img src="{{url('book/'.$book->img)}}" alt="image" width="50px" height="50px"/>
                          </td>
                          <td>
                            {{ $book->title }}
                          </td>
                          <td>
                            {{ $book->desc }}
                          </td>
                          <td>
                            {{ $book->year }}
                          </td>
                          <td>
                            {{ $book->price }}
                          </td>
                          <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('books.edit', $book) }}" data-original-title="" title=""><i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                            </a>
                          </td>
                          <td class="td-actions text-left">
                            <form action="{{ route('books.destroy', $book) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Book?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                            <!-- <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('books.destroy', $book) }}" data-original-title="" title=""><i class="material-icons">delete</i>
                            <div class="ripple-container"></div>
                            </a> -->
                          </td>




                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
