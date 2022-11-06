<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid" style="position: relative">
        <a class="navbar-brand" href="{{route('home')}}" style="color: cornflowerblue">DailyDiary</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>

        </div>
    </div>
    @if(!Auth::check())
        <div style="position:relative;margin-right: 10px">
            <a href="{{route('login')}}" class="btn btn-outline-success" type="submit" style="right: initial;">Log in</a>
        </div>
        <div style="position:relative;margin-right: 10px">
            <a href="{{route('register_user')}}" class="btn btn-outline-success" type="submit" style="right: initial;">Register</a>
        </div>
    @else
        <div style="position:relative;margin-right: 10px">
            <a href="{{route('logout')}}" class="btn btn-outline-success" type="submit" style="right: initial;">Log out</a>
        </div>
    @endif
</nav>
