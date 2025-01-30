<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Hide Scrollbars but Allow Scrolling */
        .scrollable-category::-webkit-scrollbar,
        .scrollable-menus::-webkit-scrollbar {
            display: none;
            /* Hide scrollbars for WebKit browsers */
        }

        .scrollable-category,
        .scrollable-menus {
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
            scrollbar-width: none;
            /* Firefox */
            overflow-y: auto;
            /* Ensure content is scrollable */
        }

        /* Smooth Scrolling */
        .scrollable-category,
        .scrollable-menus {
            scroll-behavior: smooth;
            /* Enables smooth scrolling */
        }

        /* Other styles remain the same */
        .category-buttons {
            overflow-x: auto;
            display: flex;
            padding: 10px;
            white-space: nowrap;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .menu-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background: #fff;
        }

        .menu-card:hover {
            transform: scale(1.03);
        }

        .navbar {
            background: #ff5722;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            white-space: normal;
            /* Allow text wrapping */
            word-wrap: break-word;
            /* Ensure long words break */
            overflow-wrap: break-word;
            /* Modern equivalent for word wrapping */
        }

        .navbar-brand {
            padding: 5px 10px;
            /* Adjust padding for better alignment */
            line-height: 1.2;
            /* Adjust line height for readability */
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 14px;
                /* Reduce font size for smaller screens */
            }
        }

        .category-section {
            position: relative;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .category-dropdown {
            display: none;
        }

        .category-buttons {
            overflow-x: auto;
            display: flex;
            padding: 10px;
            white-space: nowrap;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .category-buttons button {
            flex-shrink: 0;
            margin-right: 10px;
            padding: 8px 15px;
            background: #ff5722;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
        }

        .category-buttons button:hover {
            background: #e64a19;
        }

        .menu-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .menu-card-body {
            padding: 10px;
            text-align: center;
        }

        .menu-card-body h5 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .menu-card-body p {
            font-size: 12px;
            margin-bottom: 10px;
            color: #666;
        }

        .menu-card-body button {
            padding: 8px 15px;
            font-size: 13px;
            color: #fff;
            background: #ff5722;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu-card-body button:hover {
            background: #e64a19;
        }

        .selected-foods {
            margin-top: 20px;
            padding: 15px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
            /* Ensure proper layout */
        }

        .selected-foods .row {
            max-height: 150px;
            /* Set a height for the list of items */
            overflow-y: auto;
            /* Enable scrolling for overflowing content */
            margin-bottom: 10px;
        }

        .selected-foods .row::-webkit-scrollbar {
            display: none;
            /* Hide scrollbar for modern browsers */
        }

        .selected-foods .row {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .total-price {
            font-size: 18px;
            font-weight: bold;
        }

        /* Sticky footer for checkout and total */
        .selected-foods-footer {
            position: sticky;
            bottom: 0;
            background: #fff;
            padding-top: 10px;
            box-shadow: 0px -4px 8px rgba(0, 0, 0, 0.1);
            justify-content: center;
            display: flex;
            align-items: center;
            border-radius: 10px;
            padding-bottom: 10px;
        }

        .selected-foods h3 {
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-checkout {
            padding: 8px 15px;
            font-size: 14px;
            color: #fff;
            background: #ff5722;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Scrollable categories and menus */
        .scrollable-category {
            max-height: 200px;
            overflow-y: auto;
        }

        .scrollable-menus {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 5px;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .category-buttons {
                flex-wrap: wrap;
                gap: 10px;
            }

            .menu-card img {
                height: 100px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid justify-content-center align-items-center">
            <a class="navbar-brand text-wrap text-white" href="#">Food Ordering System -
                {{ $hotel->hotel_name }}</a>
            <img src="{{ asset($hotel->hotel_image_path) }}" alt="Logo" height="50">
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Categories -->
        <div class="category-section">
            <div class="category-buttons">
                @foreach ($categories as $category)
                                <?php
                                                                    // Generate a sanitized ID
                    $sanitizedId = preg_replace('/[^A-Za-z0-9]/', '_', $category->name);
                                                                ?>
                                <button class="category-btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $sanitizedId }}" aria-expanded="false" aria-controls="{{ $sanitizedId }}">
                                    {{ $category->name }}
                                </button>
                @endforeach
            </div>
        </div>

        <!-- Menus -->
        <div id="categoryCollapseGroup">
            <div class="scrollable-menus">
                @foreach ($categories as $category)
                                <?php
                                                                    // Generate a sanitized ID
                    $sanitizedId = preg_replace('/[^A-Za-z0-9]/', '_', $category->name);
                                                                ?>
                                <div class="collapse mt-2" id="{{ $sanitizedId }}" data-bs-parent="#categoryCollapseGroup">
                                    <div class="row g-3">
                                        @foreach ($menusByCategory[$category->name] as $food)
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                                <div class="menu-card">
                                                    <img src="{{ $food->menu_image_path ?? asset('assets/images/section/menu-slider-1.jpg') }}"
                                                        alt="Menu Image">
                                                    <div class="menu-card-body">
                                                        <h5>{{ $food->menu_name }}</h5>
                                                        <p>{{ Str::limit($food->menu_description, 40) }}</p>
                                                        <button onclick="viewMenu('{{ $food->id }}')">View</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                @endforeach
            </div>
        </div>

        <!-- Selected Foods -->
        <div class="selected-foods">
            <h3>Selected Foods</h3>
            <div class="row"></div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="selected-foods-footer">
            <div class="total-price"></div>
            <button class="btn btn-primary btn-checkout" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">Checkout</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="makeOrder()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        let selectedItems = [];
        let total;

        function updateUI() {
            const selectedFoodsElement = document.querySelector('.selected-foods');
            selectedFoodsElement.innerHTML = '';

            selectedItems.forEach((item) => {
                total = selectedItems.reduce((acc, item) => acc + (item.type * item.quantity), 0);
                const itemElement = document.createElement('div');
                itemElement.classList = "col-12 p-2 mb-2 rounded rounded-2 bg-opacity-25 bg-secondary";
                itemElement.innerHTML =
                    `<div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h6 class="m-3">${item.title} (${item.type}) - Rs ${item.type * item.quantity} | Quantity: ${item.quantity}</h6>
                            <button class="btn btn-danger btn-sm m-3" onclick="removeItem(${item.id})">Remove</button>
                        </div>
                    </div>`;
                selectedFoodsElement.appendChild(itemElement);
            });

            console.log(`Total price calculated: Rs ${total}`);

            const totalElement = document.querySelector('.total-price');
            totalElement.innerHTML = `<h6 class="text-start m-3">Total: <span class="fw-bold">Rs ${total}.00</span></h6>`;
        }


        window.removeItem = function (id) {
            const selectedItemIndex = selectedItems.findIndex(item => item.id === id);
            if (selectedItemIndex !== -1) {
                selectedItems.splice(selectedItemIndex, 1);
            }
            updateUI();
        };

        window.selectMenuType = function (id, title, typeName, typePrice) {
            const selectedItemIndex = selectedItems.findIndex(item => item.id === id && item.type === typeName);

            if (selectedItemIndex === -1) {
                selectedItems.push({
                    id: id,
                    title: title,
                    type: typeName,
                    price: parseFloat(typePrice), // Use typePrice as the price
                    quantity: 1
                });
            } else {
                selectedItems[selectedItemIndex].quantity++;
            }

            updateUI();

            swal({
                title: "Item Added",
                text: `Added ${title} (${typeName}) to the cart`,
                icon: "success",
                button: "OK"
            });
        };

        function viewMenu(id) {
            fetch(`/get-menu-types/${id}`)
                .then(response => response.json())
                .then(menuTypes => {
                    console.log(menuTypes);
                    if (menuTypes.length === 0) {
                        swal("No Menu Types Available", "This menu item has no specific types.", "info");
                        return;
                    }

                    let typeOptions = '';
                    menuTypes.forEach(type => {
                        typeOptions +=
                            `<button class="btn btn-primary mt-2" onclick="selectMenuType(${id}, '${type.type_name}', ${type.type_price})">${type.type_name} - Rs ${type.type_price}.00</button><br>`;
                    });

                    swal({
                        title: 'Select a Menu Type',
                        content: {
                            element: 'div',
                            attributes: {
                                innerHTML: typeOptions
                            }
                        },
                        button: {
                            text: "Close",
                            visible: true,
                            closeModal: true
                        }
                    });
                })
                .catch(error => {
                    console.error("Error loading menu types:", error);
                    swal("Error", "Unable to load menu types.", "error");
                });
        }

        const makeOrder = () => {
            var audio = new Audio("{{ asset('/assets/sounds/beep.mp3') }}");

            let data = {
                total: total,
                hotelId: '{{ $hotel->id }}',
                mobile: $('#mobile').val(),
                tableId: '{{ $table->table_id }}',
                email: $('#email').val(),
                name: $('#name').val(),
                selectedItems: selectedItems
            };

            // validate the data
            if (!data.name || !data.mobile || !data.email) {
                swal("Error", "Please fill all the fields.", "error");
                return;
            }

            console.log(data);


            $.ajax({
                url: "/create-order-new",
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                    audio.play();
                    window.location.href = '/order/' + response.orderID;
                },
                error: function (error) {
                    console.log(error);
                    swal("Error", "Unable to place the order.", "error");
                }
            });
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

</html>
