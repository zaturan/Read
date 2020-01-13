@extends('layouts.app',['activePage' => 'books', 'titlePage' => __('book')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('books.update', $books->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form">
            @csrf
            @method('PUT')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Book') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">

              @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                 </div>
                @endif

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
                  <label class="col-sm-2 col-form-label">{{ __('Author') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="author" id="input-author" type="text" placeholder="{{ __('Author') }}"
                      value="{{ $books->author}}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Genre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                    <select class="form-control" name="genre_id" type="text" id="input-genre">
                    <option>Please Select Genre</option>
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->genre}}</option>
                    @endforeach
                    </select>
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
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                      <select class="form-control" name="year" type="number">
                      @for ($year=1900; $year <= 2020; $year++): ?>
                        <option value="<?=$year;?>"><?=$year;?></option>
                      @endfor
                      @if ($errors->has('year'))
                        <span id="year-error" class="error text-danger" for="input-year">{{ $errors->first('y') }}</span>
                      @endif
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Min Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="min_price" id="input-price" type="number" placeholder="{{ __('Min Price') }}"
                      value="{{$books->min_price}}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Max Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="max_price" id="input-max_price" type="number" placeholder="{{ __('Max Price') }}"
                      value="{{$books->max_price}}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Buyout Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="buyout_price" id="input-buyout_price" type="number" placeholder="{{ __('Buyout Price') }}"
                      value="{{$books->buyout_price}}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="end_date" id="input-end_date" type="date" placeholder="{{ __('End Date') }}"
                      value="{{$books->end_date}}"/>
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
