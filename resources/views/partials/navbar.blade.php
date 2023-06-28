<div class="container-fluid">
    <nav class="row navbar navbar-expand-lg">
        <a href="/" class="navbar-brand ml-3 pt-3">
            <img src="{{ asset("img/logo.png") }}" alt="Logo Web">
        </a>

        <button class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navb"
            aria-controls="navb" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-3">
                    <a href="/" class="nav-link {{ Request::url() == "http://127.0.0.1:8000" ? 'active' : '' }}">
                        Home
                    </a>
                </li>
                <li class="nav-item mx-md-3">
                    <a href="/guide" class="nav-link {{ Request::url() == "http://127.0.0.1:8000/guide" ? 'active' : '' }}">
                        How to Use
                    </a>
                </li>
                <li class="nav-item mx-md-3">
                    <a href="/report" class="nav-link {{ Request::url() == "http://127.0.0.1:8000/report" ? 'active' : '' }}">
                        Report Bug
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>