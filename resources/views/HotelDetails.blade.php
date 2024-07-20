<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #B22222;
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: white;
        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: #FFD700;
        }

        h2 {
            color: #B22222;
        }

        .list-group-item {
            cursor: pointer;
            background-color: #FFD700;
            color: #B22222;
        }

        .list-group-item:hover {
            background-color: #B22222;
            color: white;
        }

        .card {
            border: 2px solid #B22222;
        }

        .card-title {
            color: #B22222;
        }

        .card-text {
            color: #333;
        }

        .btn-primary {
            background-color: #B22222;
            border: none;
        }

        .btn-primary:hover {
            background-color: #FFD700;
            color: #B22222;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset($hotel->hotel_image_path)}}" alt="Hotel Logo" width="50" height="50" class="mr-2">
                {{$hotel->hotel_name}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">{{$hotel->hotel_email}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2>Menu Categories</h2>
                <ul class="list-group" id="menuCategories">
                    @foreach($categories as $category)
                        <li class="list-group-item category" data-category="{{ $category->name }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8" id="menuItems">
                @foreach($categories as $category)
                    <div id="{{ $category->name }}Items" class="menu-items" style="display: none;">
                        <div class="row">
                            @foreach($menusByCategory[$category->name] as $menu)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-2">
                                <div class="card h-100 justify-content-center align-items-center">
                                    <img src="{{ $menu->menu_image_path ?? asset('assets/images/section/menu-slider-1.jpg') }}"
                                        class="img-fluid card-img-top rounded-start p-2"
                                        style="height: 100px;width: 250px" alt="...">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold flex-grow-1">{{ $menu->menu_name }}
                                        </h5>
                                        <p class="card-text flex-grow-1">
                                            {{ Str::limit($menu->menu_description, 50) }}.</p>
                                        <p class="card-text">Rs:- {{ $menu->menu_price }}.00</p>
                                        <button class="btn btn-primary mt-auto rounded-0"
                                            onclick="selectItem({{ $menu->id }}, '{{ $menu->menu_name }}', {{ $menu->menu_price }})">
                                            SELECT
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        // Function to show menu items based on selected category
        function showMenu(category) {
            // Hide all menu items
            document.querySelectorAll('.menu-items').forEach(function (element) {
                element.style.display = 'none';
            });
            // Show menu items for the selected category
            document.getElementById(category + 'Items').style.display = 'block';
        }

        // Add event listeners to menu categories
        document.querySelectorAll('.category').forEach(function (element) {
            element.addEventListener('click', function () {
                var category = this.getAttribute('data-category');
                showMenu(category);
            });
        });

        // Show menu items for the first category by default
        showMenu(document.querySelector('.category').getAttribute('data-category'));
    </script>
</body>

</html>
