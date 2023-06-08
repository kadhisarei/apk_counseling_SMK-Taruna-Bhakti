<nav class="navbar">
    <div class="logo-nav">
        <h1>C<span>O</span>UNSELING</h1>
    </div>
    <div class="menu-nav">
        <ul>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li><a href="#">Tentang</a></li>
            {{-- <li><a href="{{ url('/student') }}">Konseling</a></li> --}}
            <li><a href="#">Login</a></li>
            <li>
            <button class="notif-button" onclick="notifOpen()">
                <i class="fa fa-bell"></i>
            </button>
            <div class="notif-popup" id="notif">
                <div>
                    <h3>Pesan Baru</h3>
                    <p class="message">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo minima dicta aspernatur, repellat minus ipsum, molestias, deleniti ratione ipsam non expedita. Autem labore asperiores expedita sequi, cupiditate omnis ipsam nam!</p>
                </div>
                
                <button onclick="notifClose()">
                    TUTUP
                </button>
            </div>
            </li>
        </ul>
    </div>
</nav>