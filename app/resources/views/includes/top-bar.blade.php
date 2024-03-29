<div id="top-bar" class="container">
    <div class="row">
        <div class="span6">
            <strong>Address:</strong> Street num. 123123 SK, MKD |
            <strong>Phone:</strong> 07113123
        </div>
        <div class="span6">
            <div class="account pull-right">
                <ul class="user-menu">
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <strong>Welcome, </strong> {{ Auth::user()->name }}
                            </li>
                            <li style="padding: 0px">
                                <form action="{{ url('/logout') }}" method="POST" style="margin: 0">
                                    @csrf
                                    <button type="submit" class="btn-link" style="color: #eb4800">Logout</button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                    <li><a href="/cart"><i class="fas fa-shopping-cart" style="font-size: 1.1rem"></i> ({{\App\Support\Storage\CartStorage::count()}})</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
