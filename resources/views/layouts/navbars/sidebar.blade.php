<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{asset('material')}}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a class="simple-text logo-normal">
    {{ Auth::user()->name }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ ($activePage == 'newBook' || $activePage == 'bookMgt') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#book" aria-expanded="true">
          <i><img style="width:25px" src="{{asset('material')}}/img/book.png"></i>
          <p>{{ __('Seller') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="book">
          <ul class="nav">



            <li class="nav-item{{ $activePage == 'newBook' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('books.create') }}">
                <span class="sidebar-mini"> NB </span>
                <span class="sidebar-normal">{{ __('Add New Book') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'bookMgt' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('books.index') }}">
                <span class="sidebar-mini"> BM </span>
                <span class="sidebar-normal">{{ __('Book Management') }} </span>
              </a>
            </li>



            <!-- <li class="nav-item{{ $activePage == 'authors' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('authors.index') }}">
                <span class="sidebar-mini"> MA </span>
                <span class="sidebar-normal">{{ __('My Author') }} </span>
              </a>
            </li> -->


          </ul>
        </div>
        </li>

        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management' || $activePage == 'genres') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="true">
          <i><img style="width:25px" src="{{asset('material')}}/img/book.png"></i>
          <p>{{ __('User') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="user">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.update') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Admin Profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'genres' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('genres.index') }}">
                <span class="sidebar-mini"> MG </span>
                <span class="sidebar-normal">{{ __('My Genre') }} </span>
              </a>
            </li>
          </ul>
        </div>
        </li>


    </ul>
  </div>
</div>
