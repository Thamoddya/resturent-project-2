<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System Hotel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .buttonDownload {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            list-style: none;
            border-collapse: collapse;
            border-spacing: 0;
            box-sizing: border-box;
            font: inherit;
            -webkit-appearance: button;
            font-family: inherit;
            vertical-align: middle;
            background-image: none;
            display: inline-block;
            margin-bottom: 0;
            text-align: center;
            touch-action: manipulation;
            cursor: pointer;
            border: 1px solid transparent;
            white-space: nowrap;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1), 0 1px 2px rgba(0, 0, 0, .18);
            font-weight: 600;
            text-transform: uppercase;
            outline: 0 !important;
            transition: box-shadow .28s cubic-bezier(.4, 0, .2, 1);
            border-radius: 2px;
            border-width: 0 !important;
            overflow: hidden;
            position: relative;
            user-select: none;
            font-size: 11px;
            padding: 13px 38px;
            margin-top: 0;
            margin-left: 0;
            margin-right: 5px;
            line-height: 1.44;
            color: #FFF;
            background-color: #1BBC9B;
            border-color: #1BBC9B;
            text-decoration: none;
        }

        body {
            background-image: url("{{ asset('assets/images/bgImage.svg') }}");
            background-size: cover;
            background-repeat: repeat;
            background-attachment: fixed;
            backface-visibility: initial;
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
        }

        .card img {
            height: 150px;
            object-fit: cover;
        }

        .category-buttons {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px;
            background: #333333;
        }

        .category-buttons button {
            margin-right: 5px;
            flex: 0 0 auto;
        }

        .selected-foods {
            min-height: 150px;
            background-color: #e9ecef;
        }
    </style>
</head>


<body style="overflow-x: hidden">
    <nav class="navbar" style="background: #333333">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">
                FOOD ORDERING SYSTEM - {{ $hotel->hotel_name }}
            </a>
        </div>
    </nav>

    @if ($table->isReserved == 1)
        <div class="alert alert-danger m-3" role="alert">
            This table is already reserved. Please select another table.
        </div>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.reload();
            }, 10000);
        </script>
        {{ exit() }}
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3 category-buttons d-flex flex-row">
                @foreach ($categories as $category)
                    <button class="buttonDownload category-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#{{ $category->name }}" aria-expanded="false"
                        aria-controls="{{ $category->name }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="row">
            @foreach ($categories as $category)
                <div class="collapse" id="{{ $category->name }}" style="background-color: transparent">
                    <div class="card card-body" style="background-color: transparent">
                        <div class="row">
                            @foreach ($menusByCategory[$category->name] as $food)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-2">
                                    <div class="card h-100 justify-content-center align-items-center">
                                        <img src="{{ $food->menu_image_path ?? asset('assets/images/section/menu-slider-1.jpg') }}"
                                            class="img-fluid card-img-top rounded-start p-2"
                                            style="height: 150px;width: 250px" alt="...">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title fw-bold flex-grow-1">{{ $food->menu_name }}</h5>
                                            <p class="card-text flex-grow-1">
                                                {{ Str::limit($food->menu_description, 50) }}.
                                            </p>
                                            <button class="btn btn-primary rounded-0"
                                                onclick="viewMenu('{{ $food->id }}')">VIEW</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-12 mt-3">
            <div class="row">
                <div class="col-12 bg-secondary">
                    <h3 class="text-center mt-2">Selected Foods</h3>
                </div>
                <div class="col-12 mt-2">
                    <div class="row selected-foods"></div>
                </div>
                <div class="col-12">
                    <div class="row d-flex">
                        <div class="col-8 total-price bg-secondary bg-opacity-50"></div>
                        <button class="col-4 btn btn-success rounded-0 d-flex justify-content-center align-items-center"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            CheckOut
                        </button>

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Order Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form fields for user details name,mobile,email -->
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="makeOrder();">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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


        window.removeItem = function(id) {
            const selectedItemIndex = selectedItems.findIndex(item => item.id === id);
            if (selectedItemIndex !== -1) {
                selectedItems.splice(selectedItemIndex, 1);
            }
            updateUI();
        };

        window.selectMenuType = function(id, title, typeName, typePrice) {
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
            let data = {
                total: total,
                hotelId: '{{ $hotel->id }}',
                mobile: $('#mobile').val(),
                tableId: '{{ $table->table_id }}',
                email: $('#email').val(),
                name: $('#name').val(),
                selectedItems: selectedItems
            };
            console.log(data);


            $.ajax({
                url: "/create-order-new",
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = '/order/' + response.orderID;
                },
                error: function(error) {
                    console.log(error);
                    swal("Error", "Unable to place the order.", "error");
                }
            });
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</body>

</html>
