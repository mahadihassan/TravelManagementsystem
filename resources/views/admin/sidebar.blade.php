<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="{{route('admin.dashboard')}}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree" data-scroll-to-active="true">
            <li class="treeview">
                @if (Auth::check() && Auth::user()->user_role == 2)
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i>Booking
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=""><a href="{{route('user/Booking-list')}}"><i class="ft-activity"></i>Booking List</a></li>
                        </ul>
                    </li>
                @else
                    <li class="treeview 
                        {{ Request::is('admin/Slider/create') || Request::is('admin/Slider') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-circle-o"></i>Slider
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/Slider/create') ? 'active' : '' }} ">
                                <a href="{{route('admin.Slider.create')}}"><i class="ft-activity"></i><span data-i18n="" class="menu-title">Slider Create</span></a>
                            </li>
                            <li class="{{ Request::is('admin/Slider') ? 'active' : '' }} ">
                                <a href="{{route('admin.Slider.index')}}"><i class="ft-activity"></i><span data-i18n="" class="menu-title">All Slider</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview {{ Request::is('admin/Booking') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-circle-o"></i>Booking
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/Booking') ? 'active' : '' }}">
                                <a href="{{route('admin.Booking.index')}}"><i class="ft-activity"></i><span data-i18n="" class="menu-title">Booking List</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview {{ Request::is('admin/TourPackageClass/create') || Request::is('admin/TourPackageClass') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-circle-o"></i>Tour Packages
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/TourPackageClass/create') ? 'active' : '' }}"><a href="{{route('admin.TourPackageClass.create')}}"><i class="ft-activity"></i>Tour Packages Create</a></li>
                            <li class="{{ Request::is('admin/TourPackageClass') ? 'active' : '' }}"><a href="{{route('admin.TourPackageClass.index')}}"><i class="ft-activity"></i>All Tour Packages</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ Request::is('admin/Category/create') || Request::is('admin/Category') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-circle-o"></i>Category
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/Category/create') ? 'active' : '' }}"><a href="{{route('admin.Category.create')}}"><i class="ft-activity"></i>Category Create</a></li>
                            <li class="{{ Request::is('admin/Category') ? 'active' : '' }}"><a href="{{route('admin.Category.index')}}"><i class="ft-activity"></i>All Category</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ Request::is('admin/user') || Request::is('admin/user-role') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-circle-o"></i>User Data
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/user') ? 'active' : '' }}"><a href="{{route('admin.user')}}"><i class="ft-activity"></i>All User</a></li>
                            <li class="{{ Request::is('admin/user-role') ? 'active' : '' }}"><a href="{{route('admin.user-role')}}"><i class="ft-activity"></i>User Type</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ Request::is('admin/Social') || Request::is('admin/contact/message') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-circle-o"></i>Social Media
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/Social') ? 'active' : '' }}"><a href="{{route('admin.Social.index')}}"><i class="ft-activity"></i>Media List</a></li>
                            <li class="{{ Request::is('admin/contact/message') ? 'active' : '' }}"><a href="{{route('admin.contact-message')}}"><i class="ft-activity"></i>Contact Message</a></li>
                        </ul>
                    </li>
                @endif
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
