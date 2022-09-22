<div class="col-md-4 col-lg-4">
    <div class="left-section">
        <div class="col-12 profile-image">
            <img class="img-fluid" src="{{ Auth::user()->avatar ? asset('storage/'.Auth::user()->avatar) : asset('all/website/images/profile.png') }}" alt="Profile Icon">
        </div>
        <div class="col-12 dashboard-item"><a href="student_dashboard.html">Dashboard</a></div>
        <div class="col-12 dashboard-item"><a href="{{ route('user.profile') }}">Profile</a></div>
        <div class="col-12 dashboard-item"><a href="#">Course Information</a></div>
        <div class="col-12 dashboard-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>