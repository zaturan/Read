@extends('layouts.app', ['activePage' => 'authors', 'titlePage' => __('author')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('authors.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add author') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('authors.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('author') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" id="input-author" type="text" placeholder="{{ __('author') }}" value="{{ old('author') }}" required="true" aria-required="true"/>
                      @if ($errors->has('author'))
                        <span id="author-error" class="error text-danger" for="input-author">{{ $errors->first('author') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add author') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
