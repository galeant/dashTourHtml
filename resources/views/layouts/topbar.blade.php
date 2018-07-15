<!-- Top Bar -->
<nav class="navbar" style="background-color: #ffff">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" style="padding:0 0 0 25px" href="{{ URL('/') }}"><img style="height: 40px;" src="{{ asset('images/logo.png') }}"></a>
            <h3 style="float: left;margin: 8px 0px 0 150px">{{Session::get('verif')->company->companyName}}</h3>
        </div>
        
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="padding-top: 13px">
                 <li>
                     <p style="margin:5px 0 0 0">Welcome, {{Session::get('verif')->fullName}}</p>
                     <p style="margin-top: 0px">{{date('D/d/M/Y')}}</p>
                 </li>
                 <li style="margin-left: 10px"><img  style="border-radius: 50px" src="{{ asset('images/user.png') }}"></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->