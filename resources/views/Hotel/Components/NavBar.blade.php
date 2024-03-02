<nav class="navbar navbar-expand-lg " style="background-color: #FFF">
    <div class="container-fluid">
        <a class="navbar-brand " href="#">{{$user->name}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="{{ route('HotelAdmin.Home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="{{ route('HotelAdmin.users') }}">Employee Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="{{ route('HotelAdmin.Menus') }}">Hotel Menus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="#">Main management</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
