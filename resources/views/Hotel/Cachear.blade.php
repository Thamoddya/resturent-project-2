<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $user->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
    </style>

</head>

<body>

    <nav class="navbar" style="background: #333333">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">
                SYSTEM EMPLOYEE :- {{ $user->name }}
            </a>

            <a class="navbar-brand text-white" href="{{ route('employee.orders') }}">
                <button class="btn btn-secondary">Go TO ORDERS</button>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{ route('auth.logout') }}">Sign Out</a>
                    </li>
                </ul>
            </a>
        </div>
    </nav>

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

        <div class="row">
            <div class="col-12 col-md-7 mt-3">
                <div class="row">
                    <div class="col-12">
                    </div>
                    @foreach ($hotelMenus as $hotelMenu)
                        <div class="col-6 col-md-3 p-2 border border-1">
                            <div class="row" id="food_{{ $hotelMenu->id }}">
                                <div class="col-12">
                                    {{-- <img src="{{ asset($hotelMenu->menu_image_path) }}"
                                        class="img-fluid card-img rounded-start" style="width: 100px;height: 100px;"
                                        alt="..."> --}}
                                </div>
                                <div class="col-12">
                                    <div class="card-body d-flex flex-column ">
                                        <h6 class="card-title fw-bold text-justify">{{ $hotelMenu->menu_name }}</h6>
                                        <p class="card-text">Rs:- {{ $hotelMenu->menu_price }}</p>
                                        <button class="btn btn-primary rounded-0 end-0 justify-end"
                                            onclick="viewMenu('{{ $hotelMenu->id }}')">
                                            SELECT
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-5 mb-4">
                <div class="row">
                    <div class="col-12 bg-secondary">
                        <h3 class="text-center mt-2">Selected Foods</h3>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row selected-foods"></div>
                    </div>
                    <div class="col-12 ">
                        <div class="row d-flex">
                            <div class="col-8 total-price bg-secondary bg-opacity-50"></div>
                            <button
                                class=" col-4 btn btn-success rounded-0 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                CheckOut
                            </button>

                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Order Details</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Name</label>
                                                        <input type="text" id="name" class="form-control"
                                                            placeholder="Jemmy Thomas">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Table</label>
                                                        <select id="table" class="form-select"
                                                            aria-label="Default select example">

                                                            @foreach ($tables as $table)
                                                                <option value="{{ $table->id }}">
                                                                    {{ $table->table_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Email</label>
                                                        <input type="text" id="email" class="form-control"
                                                            placeholder="name@example.com">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Mobile
                                                            (Optional)</label>
                                                        <input type="text" id="mobile" class="form-control"
                                                            placeholder="072 000 0000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="makeOrder();">Confirm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 bg-secondary">
                        <h3 class="text-center mt-2">Tables</h3>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            @foreach ($allTables as $allTable)
                                <div
                                    class="col-12 mt-2 d-flex align-items-center gap-3 flex-row border border-top-0 border-left-0 border-right-0 p-2">
                                    <h5>{{ $allTable->table_name }}</h5>
                                    <div style="flex-grow: 1"></div>
                                    @if ($allTable->isReserved == 1)
                                        <a href="{{ route('Open.Table', $allTable->id) }}">
                                            <button
                                                class="float-end end-0 justify-content-end btn btn-primary rounded-0">OPEN
                                                TABLE
                                            </button>
                                        </a>
                                    @else
                                        <button
                                            class="float-end end-0 justify-content-end btn btn-success rounded-0">TABLE
                                            OPENED
                                        </button>
                                    @endif

                                </div>
                            @endforeach
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
                const itemElement = document.createElement('div');
                itemElement.classList = "col-12 p-2 mb-2 rounded rounded-2 bg-opacity-25 bg-secondary";
                itemElement.innerHTML = `
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h6 class="m-3">${item.title} (${item.type}) - Rs ${item.price * item.quantity} | Quantity: ${item.quantity}</h6>
                        <button class="btn btn-danger btn-sm m-3" onclick="removeItem(${item.id})">Remove</button>
                    </div>
                </div>`;
                selectedFoodsElement.appendChild(itemElement);
            });

            total = selectedItems.reduce((total, item) => total + (item.price * item.quantity), 0);
            const totalElement = document.querySelector('.total-price');
            totalElement.innerHTML = `<h6 class="text-start m-3">Total: <span class="fw-bold">Rs ${total}</span></h6>`;
        }

        window.removeItem = function(id) {
            const selectedItemIndex = selectedItems.findIndex(item => item.id === id);
            if (selectedItemIndex !== -1) {
                selectedItems.splice(selectedItemIndex, 1);
            }
            updateUI();
        };

        window.selectItem = function(id, title, price) {
            viewMenu(id);
        };

        window.selectMenuType = function(id, title, typeName, typePrice) {
            const selectedItemIndex = selectedItems.findIndex(item => item.id === id && item.type === typeName);

            if (selectedItemIndex === -1) {
                selectedItems.push({
                    id: id,
                    title: title,
                    type: typeName,
                    price: parseFloat(typePrice),
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
                    if (menuTypes.length === 0) {
                        swal("No Menu Types Available", "This menu item has no specific types.", "info");
                        return;
                    }

                    let typeOptions = '';
                    menuTypes.forEach(type => {
                        typeOptions +=
                            `<button class="btn btn-primary mt-2" onclick="selectMenuType(${id}, '${type.type_name}', '${type.type_name}', ${type.type_price})">${type.type_name} - Rs ${type.type_price}.00</button><br>`;
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
                'total': total,
                'mobile': $('#mobile').val(),
                'tableId': $("#table").val(),
                'email': $('#email').val(),
                'name': $('#name').val(),
                'selectedItems': selectedItems
            };

            console.log(data);

            $.ajax({
                url: "/process/create-order",
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('Order Created Successfully');
                },
                error: function(error) {
                    console.log(error);
                    swal("Error", "Unable to place the order.", "error");
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</body>

</html>
