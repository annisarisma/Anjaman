<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh; position: fixed;">
            <!-- Logo Website -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="text-decoration: none;" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="sidebar-card-illustration mb-2" src="{{ asset('images/Anjaman_Logo.png') }}" style="width: 50px" alt="...">
                </div>
                <div class="sidebar-brand-text mx-3 text-white">Anjaman Admin</div>
            </a>
            <!-- End of Logo Website -->
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="text-white nav-link {{ ($title == "Admin | Dashboard") ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span class="mx-2">Dashboard</span></a>
                    </a>
                </li>
                <li>
                    <a href="/admin/transaksi" class="text-white nav-link {{ ($title == "Admin | Transaksi") ? 'active' : '' }}">
                        <i class="fas fa-fw fa-money-bill-alt"></i>
                        <span class="mx-2">Transaction</span></a>
                    </a>
                </li>
                <li>
                    <a href="/admin/manage_market" class="nav-link text-white {{ ($title == "Admin | Manage Market") ? 'active' : '' }}">
                        <i class="fas fa-fw fa-shopping-bag"></i>
                        <span class="mx-2">Manage Market</span></a>
                    </a>
                </li>
                <li>
                    <a href="/admin/feedback" class="nav-link text-white {{ ($title == "Admin | Feedback") ? 'active' : '' }}">
                        <i class="fas fa-fw fa-bullhorn"></i>
                        <span class="mx-2">User's Feedback</span></a>
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('storage/images/' . Auth::user()->profile_picture) }}" onerror="this.src='{{asset('/images/' . Auth::user()->profile_picture)}}'" width="32" height="32" class="rounded-circle me-2" style="object-fit: cover;">
                    <strong>{{ Auth::user()->username }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="/">Back To Main Web</a></li>
                    <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><form action="/user/logout" method="post" class="d-flex">
                            @csrf
                            <button type="submit" class="btn" style="color:crimson">
                            Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="b-example-divider"></div> -->
        <!-- End of Sidebar -->