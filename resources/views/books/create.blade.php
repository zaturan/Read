@extends('layouts.app', ['activePage' => 'add-book', 'titlePage' => __('Add New Book')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('books.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')


            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Book') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('books.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

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
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Author') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" id="input-author" type="text" placeholder="{{ __('Author') }}" value="{{ old('author') }}" required="true" aria-required="true"/>
                      @if ($errors->has('author'))
                        <span id="author-error" class="error text-danger" for="input-author">{{ $errors->first('author') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Genre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                    <select class="form-control" name="genre_id" type="text">
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
                    <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" id="input-desc" type="text" placeholder="{{ __('Description') }}" value="{{ old('desc') }}" required />
                      @if ($errors->has('desc'))
                        <span id="desc-error" class="error text-danger" for="input-desc">{{ $errors->first('desc') }}</span>
                      @endif
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
                  <div>
                    <div class="form-group{{ $errors->has('min_price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="min_price" id="input-price" type="number" placeholder="{{ __(' Min Price') }}" value="{{ old('min_price') }}" required />
                      @if ($errors->has('min_price'))
                        <span id="price-error" class="error text-danger" for="input-min_price">{{ $errors->first('price') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Max Price') }}</label>
                  <div>
                    <div class="form-group{{ $errors->has('max_price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('max_price') ? ' is-invalid' : '' }}" name="max_price" id="input-max_price" type="number" placeholder="{{ __(' Max Price') }}" value="{{ old('min_price') }}" required />
                      @if ($errors->has('min_price'))
                        <span id="price-error" class="error text-danger" for="input-min_price">{{ $errors->first('min_price') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Buyout Price') }}</label>
                  <div>
                    <div class="form-group{{ $errors->has('buyout_price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('buyout_price') ? ' is-invalid' : '' }}" name="buyout_price" id="input-buyout_price" type="number" placeholder="{{ __(' Buyout Price') }}" value="{{ old('buyout_price') }}" required />
                      @if ($errors->has('buyout_price'))
                        <span id="price-error" class="error text-danger" for="input-buyout_price">{{ $errors->first('buyout_price') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="end_date" id="input-end_date" type="date" placeholder="{{ __('m/d/y') }}" value="{{ old('end_date') }}" required />
                      @if ($errors->has('end_date'))
                        <span id="end_date-error" class="error text-danger" for="end_date-year">{{ $errors->first('y') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Book') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
