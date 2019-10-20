@extends('layouts.app', ['activePage' => 'genres', 'titlePage' => __('genre')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Genres') }}</h4>
                <p class="card-category"> {{ __('Here you can manage genre') }}</p>
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
                    <a href="{{ route('genres.create') }}" class="btn btn-sm btn-primary">{{ __('Add Genre') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        <th>
                          {{ __('No') }}
                      </th>
                      <th>
                          {{ __('Genre') }}
                      </th>

                      <th class="text-center" colspan="3">
                        {{ __(' Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($genres as $genre)
                        <tr>

                          <td>
                            {{ $genre->id }}
                          </td>
                          <td>
                            {{ $genre->genre }}
                          </td>

                          <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('genres.edit', $genre) }}" data-original-title="" title=""><i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                            </a>
                          </td>
                          <td class="td-actions text-left">
                            <form action="{{ route('genres.destroy', $genre) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Book?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
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
