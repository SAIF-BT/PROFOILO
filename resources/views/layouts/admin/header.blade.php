<header>
    <nav>
        <ul>
            <span style="padding: 2rem;font-size:1.5rem;"> Saif </span>
        </ul>
        <ul class="header-profile">
            @if (Auth::user())
                <li class="avatar-item">
                    @if (Auth::user()->image)
                        <img src="{{ asset('images/' . Auth::user()->image) }}" alt="" class="avatar-img">
                    @else
                    <img src="{{ asset('template/assets/img/avatar.jpg') }}" alt="" class="avatar-img">

                    @endif
                </li>
                <li>
                    @if (Auth::user()->email)
                        <span>{{ Auth::user()->email }}</span>
                    @else
                        <span>No Email</span>
                    @endif
                </li>
            @endif
        </ul>
    </nav>
    <span class="header-profile-nav">
        <span> <i class="fa fa-sort-up"></i></span>
        <ul>
            
            <hr class="hr">
            <li>
                    <form action="{{ route('logout') }}" method="post" style="cursor: pointer">
                        @csrf
                        <span onclick="event.preventDefault();this.closest('form').submit()">
                            Logout

                        </span>
                    </form>
            </li>
        </ul>
    </span>
</header>
