@extends('layouts.app',['activePage' => 'genres', 'titlePage' => __('genre')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('genres.update', $genres->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form">
            @csrf
            @method('PATCH')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Genre') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Genre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="genre" id="input-title" type="text" placeholder="{{ __('Genre') }}" value="{{ $genres->genre}}"/>
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
