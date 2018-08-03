<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.banner.index') !!}">All Banner</a></li>
                    <li><a href="{!! route('admin.banner.create') !!}">Add Banner</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-user"></i> Administrator <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.users.index') !!}">All Users</a></li>
                    <li><a href="{!! route('admin.users.create') !!}">Add User </a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-list"></i> Category <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.category.index') !!}">All Category </a></li>
                    <li><a href="{!! route('admin.category.create') !!}">Add Category</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-shopping-basket"></i> Product <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.product.index') !!}">All Product </a></li>
                    <li><a href="{!! route('admin.product.create') !!}">Add Product</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-shopping-cart"></i> Order <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="">Order list</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{!! asset('assets/images/img.jpg') !!}" alt="">{{ auth()->user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li>
                            <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout').submit();">
                                <span>Logout</span>
                                <span class="badge bg-red pull-right"><i class="fa fa-unlock-alt"></i></span>
                            </a>
                            <form id="logout" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green"></span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
