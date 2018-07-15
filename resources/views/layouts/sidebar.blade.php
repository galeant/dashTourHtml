<aside id="leftsidebar" class="sidebar" style="width:250px">
    <!-- Menu -->
    <div class="menu" style="background-color: #676C56">
        <ul class="list">
            @if(session('overviewfullaccess')==1)
            <li {{{ (Request::is('overview*') ? 'class=active' : '') }}}>
                <a href="{{ URL('/') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Overview</span>
                </a>
            </li>
            @endif
            @if(session('productsfullaccess')==1||session('productsview')==1||session('productsupdate')==1||session('productsadd')==1)
            <li {{{ (Request::is('products*') ? 'class=active' : '') }}}>
                <a href="{{ URL('/products') }}">
                    <i class="material-icons">card_travel</i>
                    <span>Products</span>
                </a>
            </li>
            @endif
            @if(session('bookingsfullaccess')==1)
            <li {{{ (Request::is('bookings*') ? 'class=active' : '') }}}>
                {{-- <a href="{{ URL('/bookings') }}">
                    <i class="material-icons">library_books</i>
                    <span>Bookings</span>
                </a> --}}
                <a  class="menu-toggle waves-effect waves-block toggled">
                    <i class="material-icons">library_books</i>
                    <span>Bookings</span>
                </a>
                <ul class="ml-menu" style="display: block;">
                    <li {{{ (Request::is('bookings/bytransactiondate*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/bookings/bytransactiondate') }}" class=" waves-effect waves-block">
                            <span>by Transaction Date</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('bookings/byactivityschedule*') ? 'class=active' : '') }}}>
                        <a href="{{ URL('/bookings/byactivityschedule') }}" class=" waves-effect waves-block">
                            <span>by Activity Schedule</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            @endif
            @if(session('campaignfullaccess')==1||session('campaignview')==1||session('campaignupdate')==1||session('campaignadd')==1)
            <li {{{ (Request::is('campaign*') ? 'class=active' : '') }}}>
                <a href="{{ URL('/campaign') }}">
                    <i class="material-icons">star</i>
                    <span>Campaign</span>
                </a>
            </li>
            @endif
            @if(session('reportsfullaccess')==1)
            <li {{{ (Request::is('reports*') ? 'class=active' : '') }}}>
                <a href="{{ URL('/reports') }}">
                    <i class="material-icons">trending_up</i>
                    <span>Reports</span>
                </a>
            </li>
            @endif
            @if(session('usersfullaccess')==1||session('usersview')==1||session('usersupdate')==1||session('usersadd')==1)
            <li {{{ (Request::is('users*') ? 'class=active' : '') }}}>
                <a href="{{ URL('/users') }}">
                    <i class="material-icons">contacts</i>
                    <span>Users</span>
                </a>
            </li>
            @endif
            <li class="header" style='height:1px;padding:0 0 0 0'></li>
            <li  {{{ (Request::is('setting*') ? 'class=active' : '') }}}>
                <a href="{{ URL('/setting') }}">
                    <i class="material-icons">settings</i>
                    <span>ACCOUNT SETTING</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/logout') }}">
                    <i class="material-icons">exit_to_app</i>
                    <span>LOGOUT</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <!-- <div class="legal">
        <div class="copyright">
            &copy; 2018 <a href="">IT Support - PIGIJO.COM</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div> -->
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->