 <!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar" style="width:250px">
    <!-- Menu -->
    <div class="menu" style="background-color: #676C56">
        <ul class="list">
            <li id="overview" class="active">
                <a href="{{ URL('/admin') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Overview</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">person</i>
                    <span>Members</span>
                </a>
            </li>
            <li {{{ (Request::is('admin/partner*') ? 'class=active' : '') }}}>
                <a  class="menu-toggle waves-effect waves-block toggled">
                    <i class="material-icons">people</i>
                    <span>Partners</span>
                </a>
                <ul class="ml-menu" style="display: block;">
                    <li {{{ (Request::is('admin/partner/index*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/admin/partner/index') }}" class=" waves-effect waves-block">
                            <span>Partner List</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('admin/partner/activity*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/admin/partner/activity') }}" class=" waves-effect waves-block">
                            <span>Registration - Activity (5)</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('admin/partner/accomodation*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/admin/partner/accomodation') }}" class=" waves-effect waves-block">
                            <span>Registration - Accomodation (0)</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('admin/partner/carrental*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/admin/partner/carrental') }}" class=" waves-effect waves-block">
                            <span>Registration - Car Rental (0)</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            
            <li {{{ (Request::is('admin/product*') ? 'class=active' : '') }}}>
                <a  class="menu-toggle waves-effect waves-block toggled">
                    <i class="material-icons">people</i>
                    <span>Products</span>
                </a>
                <ul class="ml-menu" style="display: block;">
                    <li {{{ (Request::is('admin/product/index*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/admin/product/index') }}" class=" waves-effect waves-block">
                            <span>Activity - All Product</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            
            <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">person</i>
                    <span>Transaction & Bookings</span>
                </a>
            </li>

            {{-- <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">money</i>
                    <span>Refunds</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">person</i>
                    <span>Partner Settlement</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">person</i>
                    <span>Promotions</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">person</i>
                    <span>Help Center</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">person</i>
                    <span>User Management</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/admin/members') }}">
                    <i class="material-icons">person</i>
                    <span>Reporting</span>
                </a>
            </li> --}}
            <li {{{ (Request::is('admin/master*') ? 'class=active' : '') }}}>
                <a  class="menu-toggle waves-effect waves-block toggled">
                    <i class="material-icons">library_books</i>
                    <span>Master Data</span>
                </a>
                <ul class="ml-menu" style="display: block;">
                    <li {{{ (Request::is('admin/master/place/*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/admin/master/place/index') }}" class=" waves-effect waves-block">
                            <span>Place Management</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('admin/master/place-type/*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/admin/master/place-type/index') }}" class=" waves-effect waves-block">
                            <span>Place Type Management</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('admin/master/calender*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('admin/master/calender') }}" class=" waves-effect waves-block">
                            <span>Calender Management</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('bookings/byactivityschedule*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/bookings/byactivityschedule') }}" class=" waves-effect waves-block">
                            <span>Activity Type Management</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('bookings/byactivityschedule*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/bookings/byactivityschedule') }}" class=" waves-effect waves-block">
                            <span>Pigijo Company Setting</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="{{ URL('/admin/logout') }}">
                    <i class="material-icons">exit_to_app</i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- #END# Left Sidebar -->