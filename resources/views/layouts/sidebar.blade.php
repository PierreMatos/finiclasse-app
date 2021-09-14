<aside class="main-sidebar sidebar-white-primary elevation-4">
    <!-- <a href="{{ route('home') }}" class="brand-link">
        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a> -->
    <!-- <li class="dropdown notifications-menu">

        <li class="nav-item dropdown user-menu"> -->
                    <a href="#" class="brand-link nav-link bg-black dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                            class="brand-image  img-circle elevation-2" alt="User Image"> -->
                            <i class="brand-image mt-2 elevation-2 fas fa-user-circle"></i>
                        <span class="brand-text d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg">
                        <!-- Menu Footer-->
                        <li class="user-footer" style="text-align: center; display: grid;">
                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            <a href="#" class="btn btn-default btn-flat"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                <!-- </li>
            </li> -->
    <div class="sidebar bg-white">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
