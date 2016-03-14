<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! link_to_route('home', 'Larabook', [], ['class' => 'navbar-brand']) !!}
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar() }}" alt="{{ $currentUser->username }}"/>

                            {{ $currentUser->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li>{!! link_to_route('logout_path', 'Log Out') !!}</li>
                        </ul>
                    </li>
                @else
                    <li>{!! link_to_route('register_path', 'Register') !!}</li>
                    <li>{!! link_to_route('login_path', 'Log In') !!}</li>
                @endif
            </ul>
        </div>
    </div>
</nav>
