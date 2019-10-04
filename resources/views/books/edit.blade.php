@extends('layouts.app',['activePage' => 'books', 'titlePage' => __('book')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('books.update', $books->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form">
            @csrf
            @method('PATCH')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Book') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Choose the file') }}</label>
                  <div class="col-sm-7">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="img">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                        <img src="{{ URL::to('/') }}/book/{{ $books->img }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="img" value="{{ $books->img }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ $books->title}}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="desc" id="input-desc" type="desc" placeholder="{{ __('Description') }}"
                      value="{{ $books->desc }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Year') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="year" id="input-desc" type="year" placeholder="{{ __('Year') }}" value="{{ $books->year }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="price" id="input-price" type="price" placeholder="{{ __('Price') }}"
                      value="{{$books->price}}"/>
                    </div>
                  </div>
                </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update Book') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
