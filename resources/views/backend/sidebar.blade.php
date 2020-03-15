<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

            <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}g" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Blog
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('blog_categories.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('blogs.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Blog
                            </p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{route('contents.index')}}" class="nav-link">
                    <i class="nav-icon far fa-file"></i>
                    <p>
                        Content
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('content-banners.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Content-Banner
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('teams.index')}}" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Executive Committee
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('life-members.index')}}" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Life Members
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('events.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-minus"></i>
                    <p>
                        Events
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('gallerys.index')}}" class="nav-link">
                    <i class="nav-icon far fa-images"></i>
                    <p>
                        Gallery
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('projects.index')}}" class="nav-link">
                    <i class="nav-icon far fa-file-archive"></i>
                    <p>
                        Project
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('settings.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Setting
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
