<aside class="main-sidebar main-sidebar-custom sidebar-light-primary border">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{asset('kp_depan')}}/public/assets/img/gallery/logo-icon.png" alt="Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text" style="color: #007bff">Referensi Virtual ITS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-sidebar flex-column nav-flat nav-child-indent nav-custom" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link {{request()->is('dashboard') ? 'active' : ''}} ">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item {{(request()->is('thesis/request') || request()->is('thesis/finished')) ? 'menu-open' : ''}}">
                <a href="#" class="nav-link {{(request()->is('thesis/request') || request()->is('thesis/finished')) ? 'active' : ''}}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    E-Thesis Delivery
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/thesis/request" class="nav-link {{request()->is('thesis/request') ? 'active' : ''}}">
                    <p>Permintaan Baru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/thesis/finished" class="nav-link {{request()->is('thesis/finished') ? 'active' : ''}}">
                    <p>Permintaan Selesai</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item {{(request()->is('resource/request') || request()->is('resource/finished')) ? 'menu-open' : ''}}">
                <a href="#" class="nav-link {{(request()->is('resource/request') || request()->is('resource/finished')) ? 'active' : ''}}">
                <i class="nav-icon fas fa-lightbulb"></i>
                <p>
                    E-Resource Delivery
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"> 
                        <a href="/resource/request" class="nav-link {{request()->is('resource/request') ? 'active' : ''}}">
                        <p>Permintaan Baru</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/resource/finished" class="nav-link {{request()->is('resource/finished') ? 'active' : ''}}">
                        <p>Permintaan Selesai</p>
                        </a>
                    </li>
                    </ul>
            </li>
            <li class="nav-item {{(request()->is('ask/request') || request()->is('ask/finished')) ? 'menu-open' : ''}}">
                <a href="#" class="nav-link  {{(request()->is('ask/request') || request()->is('ask/finished')) ? 'active' : ''}}">
                <i class="nav-icon fas fa-comment"></i>
                <p>
                    Ask a Librarian
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/ask/request" class="nav-link {{request()->is('ask/request') ? 'active' : ''}}">
                        <p>Pertanyaan Baru</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ask/finished" class="nav-link {{request()->is('ask/finished') ? 'active' : ''}}">
                        <p>Pertanyaan Terjawab</p>
                        </a>
                    </li>
                </ul>
            </li>
            @if($user->level == 'admin')
            <li class="nav-item">
                <a href="/admin-list" class="nav-link {{request()->is('admin-list') ? 'active' : ''}}">
                <i class="nav-icon fas fa-users"></i>
                <p>Daftar Pustakawan</p>
                </a>
            </li>
            @endif
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>