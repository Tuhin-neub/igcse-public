<!--Navbar Start-->
<nav class="container-fluid fixed-top navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('welcome')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('chapter')}}">Chapter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('lecture_page')}}">Lecture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
            </ul>
            <div class="access-section">
                <span><a href="{{route('login')}}" class="login btn btn-sm btn-outline-secondary">Login</a></span>
                <span><a href="{{route('registration_form')}}">Sign Up</a></span>
            </div>
        </div>
    </div>
</nav>
<!--Navbar End-->