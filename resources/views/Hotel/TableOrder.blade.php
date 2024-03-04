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
                {{-- <img src="{{ $dataUri }}" alt="Logo" width="100" height="100"
                    class="d-inline-block align-text-center text-white"> --}}
                FOOD ORDERING SYSTEM - {{ $hotel->hotel_name }}
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-7 mt-3">
                <div class="row">

                    @foreach ($menus as $food)
                        <div class="col-6 col-md-3 p-2">
                            <!-- Add a unique identifier to each item for tracking -->
                            <div class="row" id="food_{{ $food->id }}">
                                <div class="col-12">
                                    @if ($food->menu_image_path == null)
                                        <img src="{{ asset('assets/images/section/menu-slider-1.jpg') }}"
                                            class="img-fluid card-img rounded-start" alt="...">
                                    @else
                                        <img src="{{ $food->menu_image_path }}" class="img-fluid card-img rounded-start"
                                            alt="...">
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $food->menu_name }}</h5>
                                        <p class="card-text">{{ $food->menu_description }}.</p>
                                        <p class="card-text">Rs:- {{ $food->menu_price }}.00</p>
                                        <!-- Add a button to select the item -->
                                        <button class="btn btn-primary rounded-0"
                                            onclick="selectItem({{ $food->id }}, '{{ $food->menu_name }}', {{ $food->menu_price }})">
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
                    <div class="col-12  mt-2">
                        <div class="row selected-foods">
                        </div>
                    </div>
                    <div class="col-12 ">
                        <div class="row d-flex">
                            <div class="col-8 total-price bg-secondary bg-opacity-50">
                            </div>
                            <button
                                class=" col-4 btn btn-success rounded-0 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                CheckOut
                            </button>

                            <!-- Modal -->
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
                                                            class="form-label">Email</label>
                                                        <input type="text" id="email" class="form-control"
                                                            placeholder="name@example.com">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Mobile
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
            </div>
        </div>
    </div>

    <script>
        let selectedItems = [];
        let total;

        document.addEventListener('DOMContentLoaded', function() {
            // JavaScript code for dynamic updates


            // Function to update the UI with selected items and total price
            function updateUI() {
                // Reference to the element where selected items will be displayed
                const selectedFoodsElement = document.querySelector('.selected-foods');

                // Clear the existing content
                selectedFoodsElement.innerHTML = '';
                selectedItems.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.classList = "col-12 p-2 mb-2 rounded rounded-2 bg-opacity-25 bg-secondary";
                    itemElement.innerHTML = `
                <div class="row">
                    <div class="col-12  d-flex  align-items-center justify-content-center">
                       <h6 class="m-3">${item.title}  | Quantity: ${item.quantity}  </h6>  <button class="btn btn-danger btn-sm m-3" onclick="removeItem(${item.id})"> Remove</button>
                     </div>
                </div>`;
                    selectedFoodsElement.appendChild(itemElement);
                });
                // Display the total price
                total = calculateTotalPrice();
                const totalElement = document.querySelector('.total-price');
                totalElement.innerHTML =
                    `<h6 class="text-start m-3">Total: <span class="fw-bold">Rs:- ${calculateTotalPrice()}.00</span></h6>`;
            }

            function calculateTotalPrice() {
                return selectedItems.reduce((total, item) => total + (item.price * item.quantity), 0);
            }

            window.removeItem = function(id) {
                const selectedItemIndex = selectedItems.findIndex(item => item.id === id);
                if (selectedItemIndex !== -1) {
                    selectedItems.splice(selectedItemIndex, 1);
                }
                updateUI();
            };
            window.selectItem = function(id, title, price) {
                const selectedItemIndex = selectedItems.findIndex(item => item.id === id);

                if (selectedItemIndex === -1) {
                    selectedItems.push({
                        id,
                        title,
                        price,
                        quantity: 1
                    });
                } else {
                    selectedItems[selectedItemIndex].quantity++;
                }

                updateUI();
            };
        });

        const makeOrder = () => {
            let data = {
                'total': total,
                'hotelId': '{{ $hotel->id }}',
                'mobile': $('#mobile').val(),
                'tableId': '{{ $table->table_id }}',
                'email': $('#email').val(),
                'name': $('#name').val(),
                'selectedItems': selectedItems
            };

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
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</body>

</html>