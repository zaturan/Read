@extends('layouts.app',['activePage' => 'authors', 'titlePage' => __('author')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('authors.update', $authors->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form">
            @csrf
            @method('PATCH')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Author') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Author') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="author" id="input-title" type="text" placeholder="{{ __('author') }}" value="{{ $authors->author}}"/>
                    </div>
                  </div>
                </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update Author') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
