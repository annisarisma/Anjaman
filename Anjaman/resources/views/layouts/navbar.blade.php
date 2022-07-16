@auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src={{ URL::asset("images/Anjaman_Logo.png") }} alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menu -->
            <ul class="navbar-nav ml-auto mr-auto">
            <li class="nav-item mx-md-2">
                <a class="nav-link {{ ($title == "Home | Main") ? 'active' : '' }}"  href="/">
                    Home
                </a>
            </li>
            <li class="nav-item mx-md-2">
                <a class="nav-link {{ ($title == "Home | Market") ? 'active' : '' }}"  href="/user/market">
                    Market
                </a>
            </li>
            <li class="nav-item mx-md-2">
            <a class="nav-link {{ ($title == "Home | Cart") ? 'active' : '' }}"  href="/user/cart">
                    Cart
                </a>
            </li>
            <li class="nav-item mx-md-2">
                <a class="nav-link {{ ($title == "User | Our Team") ? 'active' : '' }}" href="/user/ourteam">
                Our Team
                </a>
            </li>
            @if (auth()->user()->role=="admin")                   
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                Admin Manager
                </a>
            </li>
                @endif
            </ul>
            
        </div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-auto">
            <li>
                <a class="nav-link {{ ($title == "Home | Profile") ? 'active' : '' }}"" style=" border-radius: 10px;" href="/user/profile">
                <img src="{{ asset('storage/images/' . Auth::user()->profile_picture) }}" onerror="this.src='{{asset('/images/' . Auth::user()->profile_picture)}}'" width="32" height="32" class="rounded-circle me-2" style="object-fit: cover;">
                {{ Auth::user()->username }}
                </a>
            </li>
            <li>
            <form action="/user/logout" method="post" class="d-flex">
                @csrf
                <button type="submit" class="btn btn-login" style=" border-radius: 10px; margin-top:4px">
                Logout
                </button>
            </form>
            </li>
            </ul>
        </div>

    </nav>
@else
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src={{ URL::asset("images/Anjaman_Logo.png") }} alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menu -->
            <ul class="navbar-nav ml-auto mr-auto">
            <li class="nav-item mx-md-2">
                <a class="nav-link {{ ($title == "Home | Main") ? 'active' : '' }}"  href="/">
                    Home
                </a>
            </li>
            <li class="nav-item mx-md-2">
                <a class="nav-link {{ ($title == "Home | Market") ? 'active' : '' }}"  href="/user/market">
                    Market
                </a>
            </li>
            </ul>
            
        </div>
            <form class="d-flex">
                <a class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" style=" border-radius: 10px;" href="/user/login">
                Masuk
                </a>
            </form>
        </div>
    </nav>
    @endauth