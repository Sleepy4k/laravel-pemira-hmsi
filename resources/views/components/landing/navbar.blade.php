<nav>
    <div class="logo">
        <div class="logos-container">
            <div class="logo-item logo-1">
                <img src="{{ asset('images/si.png') }}" alt="HIMASI Logo" loading="lazy">
            </div>
            <div class="logo-item logo-2">
                <img src="{{ asset('images/pemira.png') }}" alt="HIMASI Logo" loading="lazy">
            </div>
        </div>
    </div>

    <ul class="nav-links">
        <li><a href="{{ route('landing') }}">Beranda</a></li>
        <li><a href="{{ route('timeline') }}">Timeline</a></li>
    </ul>

    <div class="nav-buttons">
        @if (auth('web')->check())
            <button class="btn-login" id="dashboard-button">Dashboard</button>
        @else
            <button class="btn-login" id="login-button">Masuk</button>
        @endif
        <button class="btn-vote">Mulai Voting</button>
    </div>
</nav>
