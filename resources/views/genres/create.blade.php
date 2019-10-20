@extends('layouts.app', ['activePage' => 'genres', 'titlePage' => __('genre')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('genres.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Genre') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('books.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Genre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('genre') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('genre') ? ' is-invalid' : '' }}" name="genre" id="input-genre" type="text" placeholder="{{ __('Genre') }}" value="{{ old('genre') }}" required="true" aria-required="true"/>
                      @if ($errors->has('genre'))
                        <span id="genre-error" class="error text-danger" for="input-genre">{{ $errors->first('genre') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Genre') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
