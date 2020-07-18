        <div class="ecaps-sidemenu-area">
            <!-- Desktop Logo -->
            <div class="ecaps-logo">
                <a href="{{url('admin')}}"><img class="desktop-logo" src="{{asset('backend_assets/img/core-img/logo.png')}}" alt="Desktop Logo"> <img class="small-logo" src="{{asset('backend_assets/img/core-img/small-logo.png')}}" alt="Mobile Logo"></a>
            </div>

            <!-- Side Nav -->
            <div class="ecaps-sidenav" id="ecapsSideNav">
                <!-- Side Menu Area -->
                <div class="side-menu-area">
                    <!-- Sidebar Menu -->
                    <nav>
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{url('admin')}}"><i class='bx bx-home-heart'></i><span>Dashboard</span></a></li>
                            <li class="{{ (request()->is('admin/vehicle')) ? 'active' : '' }}"><a href="{{url('/admin/vehicle')}}"><i class='bx bx-car'></i><span>Vehicle</span></a></li>
                            <li class="{{ (request()->is('admin/package')) ? 'active' : '' }}"><a href="{{url('/admin/package')}}"><i class='bx bx-car'></i><span>Packages</span></a></li>
                            <li class="treeview">
                                <a href="javascript:void(0)"><i class='bx bx-briefcase-alt-2'></i> <span>Project</span> <i class="fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="project-list.html">Project List</a></li>
                                    <li><a href="project-details.html">Project Details</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="javascript:void(0)"><i class="bx bx-envelope"></i> <span>Email</span> <i class="fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="mail-inbox.html">Inbox</a></li>
                                    <li><a href="mail-view.html">Mail View</a></li>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
