<nav class="navbar navbar-default">
    <div class="container-fluid col-sm-10 col-sm-offset-1">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </button>
            <a class="navbar-brand" href="/">Music Tracker</a>
        </div>
        <div class="collapse navbar-collapse" id="topNavBar">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="/leaked">Leaked</a>
                </li>
                <li class="">
                    <a href="/articles">Articles</a>
                </li>
                <li class="">
                    <a href="/albums">Albums</a>
                </li>
                <li class="">
                    <a href="">Coming soon</a>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search" method="get" action="#">
                <div class="form-group">
                    <input type="text" class="form-control" name="q" value="">
                </div>
                <button type="submit" class="btn btn-link glyphicon glyphicon-search"></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Posts</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>

            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li class=""><a href="">Register</a></li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in" ></span>&nbspLogin</a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">Another action</a></li>--}}
                    {{--<li><a href="#">Something else here</a></li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#">Separated link</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </div>
    </div>
</nav>