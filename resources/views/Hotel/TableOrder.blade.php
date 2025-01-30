<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Food Ordering System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <style>
        /* Customize the navbar */
        .navbar {
            background-color: #343a40;
            padding: 1rem;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Category buttons */
        .category-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .category-btn {
            background-color: #0d6efd;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .category-btn:hover {
            background-color: #0b5ed7;
        }

        /* Menu cards */
        .menu-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, .1);
            text-align: center;
        }

        .menu-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .menu-card-body {
            padding: 1rem;
        }

        .menu-card-body h5 {
            margin-bottom: 0.5rem;
        }

        .menu-card-body p {
            font-size: 0.9rem;
            color: #666;
            height: 36px; /* just to limit text a bit */
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .menu-card-body button {
            background-color: #0d6efd;
            color: #fff;
            border: none;
            padding: 0.3rem 0.8rem;
            border-radius: 3px;
            cursor: pointer;
        }

        .menu-card-body button:hover {
            background-color: #0b5ed7;
        }

        /* Scrollable menus */
        .scrollable-menus {
            max-height: 500px;
            overflow-y: auto;
            margin-bottom: 2rem;
        }

        /* Selected Foods */
        .selected-foods {
            margin-top: 2rem;
        }

        .selected-foods h3 {
            margin-bottom: 1rem;
        }

        .selected-food-item {
            padding: 1rem;
            margin-bottom: 0.5rem;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        /* Footer area for total & checkout */
        .selected-foods-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid justify-content-center align-items-center">
        <a class="navbar-brand text-wrap text-white" href="#">
            Food Ordering System - {{ $hotel->hotel_name }}
        </a>
        <img src="{{ asset($hotel->hotel_image_path) }}" alt="Logo" height="50"/>
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
                <button
                    class="category-btn"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#{{ $sanitizedId }}"
                    aria-expanded="false"
                    aria-controls="{{ $sanitizedId }}"
                >
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Menus by Category -->
    <div id="categoryCollapseGroup">
        <div class="scrollable-menus">
            @foreach ($categories as $category)
                    <?php
                    // Generate a sanitized ID
                    $sanitizedId = preg_replace('/[^A-Za-z0-9]/', '_', $category->name);
                    ?>
                <div
                    class="collapse mt-2"
                    id="{{ $sanitizedId }}"
                    data-bs-parent="#categoryCollapseGroup"
                >
                    <div class="row g-3">
                        @foreach ($menusByCategory[$category->name] as $food)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="menu-card">
                                    <img
                                        src="{{ $food->menu_image_path ?? asset('assets/images/section/menu-slider-1.jpg') }}"
                                        alt="Menu Image"
                                    />
                                    <div class="menu-card-body">
                                        <h5>{{ $food->menu_name }}</h5>
                                        <p>{{ Str::limit($food->menu_description, 40) }}</p>
                                        <button onclick="viewMenu('{{ $food->id }}','{{ $food->menu_name }}')">
                                            View
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

    <!-- Selected Foods -->
    <div class="selected-foods">
        <h3>Selected Foods</h3>
        <div class="row" id="selectedFoodsContainer">
            <!-- Dynamically added items go here -->
        </div>
    </div>
</div>

<!-- Footer with total and checkout button -->
<div class="container mt-4">
    <div class="selected-foods-footer">
        <div class="total-price" id="totalPriceDisplay">Total: Rs 0.00</div>
        <button
            class="btn btn-primary btn-checkout"
            data-bs-toggle="modal"
            data-bs-target="#staticBackdrop"
        >
            Checkout
        </button>
    </div>
</div>

<!-- Modal for user details -->
<div
    class="modal fade"
    id="staticBackdrop"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Order Details</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input
                        type="text"
                        class="form-control"
                        id="mobile"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        required
                    />
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="makeOrder()"
                >
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- jQuery (for Ajax) -->
<script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"
></script>

<!-- Bootstrap Bundle JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
></script>

<script>
    let selectedItems = [];
    let total = 0;

    // Utility: Re-calculate the total price
    function calculateTotal() {
        total = selectedItems.reduce((acc, item) => {
            return acc + (item.price * item.quantity);
        }, 0);
    }

    // Update the UI for the selected items (cart)
    function updateUI() {
        const container = document.getElementById("selectedFoodsContainer");
        container.innerHTML = "";

        selectedItems.forEach((item, index) => {
            const itemElement = document.createElement("div");
            itemElement.classList = "col-12 selected-food-item";
            itemElement.innerHTML = `
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-2">
              <strong>${item.title}</strong>
              <br/>
              Type: ${item.typeName}
              <br/>
              Price (each): Rs ${item.price.toFixed(2)}
            </div>
            <div class="col-md-4 col-sm-6 mb-2 d-flex align-items-center">
              <button
                class="btn btn-secondary btn-sm me-2"
                onclick="changeQuantity(${index}, 'decrement')"
              >-</button>
              <span class="mx-2">${item.quantity}</span>
              <button
                class="btn btn-secondary btn-sm ms-2"
                onclick="changeQuantity(${index}, 'increment')"
              >+</button>
            </div>
            <div class="col-md-4 col-sm-12 d-flex align-items-center justify-content-end">
              <div class="me-3">
                <strong>Subtotal:</strong>
                Rs ${(item.price * item.quantity).toFixed(2)}
              </div>
              <button
                class="btn btn-danger btn-sm"
                onclick="removeItem(${index})"
              >
                Remove
              </button>
            </div>
          </div>
        `;
            container.appendChild(itemElement);
        });

        calculateTotal();
        document.getElementById("totalPriceDisplay").innerHTML = `Total: Rs ${total.toFixed(2)}`;
    }

    // Increase or decrease quantity
    function changeQuantity(index, action) {
        if (action === "increment") {
            selectedItems[index].quantity++;
        } else if (action === "decrement") {
            if (selectedItems[index].quantity > 1) {
                selectedItems[index].quantity--;
            }
        }
        updateUI();
    }

    // Remove an item from the cart
    function removeItem(index) {
        selectedItems.splice(index, 1);
        updateUI();
    }

    // Fetch the menu types and show a dialog for selecting type & quantity
    async function viewMenu(menuId, menuName) {
        try {
            const response = await fetch(`/get-menu-types/${menuId}`);
            const menuTypes = await response.json();

            if (!menuTypes || menuTypes.length === 0) {
                swal("No Menu Types Available", "This menu item has no specific types.", "info");
                return;
            }

            // Build custom HTML content for SweetAlert
            let contentDiv = document.createElement("div");

            // A select (or radio) for types
            let selectEl = document.createElement("select");
            selectEl.classList = "form-select mb-3";
            selectEl.id = "typeSelect";

            menuTypes.forEach((type, idx) => {
                let option = document.createElement("option");
                option.value = JSON.stringify({
                    typeName: type.type_name,
                    price: type.type_price,
                });
                option.innerText = `${type.type_name} - Rs ${type.type_price}`;
                selectEl.appendChild(option);
            });

            // An input for quantity
            let quantityInput = document.createElement("input");
            quantityInput.type = "number";
            quantityInput.min = "1";
            quantityInput.value = "1";
            quantityInput.classList = "form-control";
            quantityInput.id = "quantityInput";

            // Append elements to contentDiv
            contentDiv.appendChild(selectEl);
            contentDiv.appendChild(quantityInput);

            swal({
                title: `Select Type for "${menuName}"`,
                content: contentDiv,
                buttons: {
                    cancel: true,
                    confirm: {
                        text: "Add to Cart",
                        closeModal: false,
                    },
                },
            }).then((value) => {
                if (!value) {
                    // user clicked cancel
                    return;
                }
                let selectedOption = JSON.parse(selectEl.value);
                let quantityValue = parseInt(quantityInput.value);

                // Validate quantity
                if (quantityValue < 1) {
                    swal("Invalid Quantity", "Please enter a valid quantity (>= 1).", "error");
                    return;
                }

                // Check if already in cart (same menuId + same typeName)
                let existingIndex = selectedItems.findIndex(
                    (i) => i.id == menuId && i.typeName == selectedOption.typeName
                );
                if (existingIndex > -1) {
                    // Already in cart, just update quantity
                    selectedItems[existingIndex].quantity += quantityValue;
                } else {
                    // Add new item
                    selectedItems.push({
                        id: menuId,
                        title: menuName,
                        typeName: selectedOption.typeName,
                        price: parseFloat(selectedOption.price),
                        quantity: quantityValue,
                    });
                }

                updateUI();
                swal.close(); // close the dialog
                // Show a success alert that item was added
                swal("Added!", `${menuName} (${selectedOption.typeName}) added to cart!`, "success");
            });
        } catch (error) {
            console.error("Error loading menu types:", error);
            swal("Error", "Unable to load menu types.", "error");
        }
    }

    // Final order function
    function makeOrder() {
        // If you have a beep sound:
        var audio = new Audio("{{ asset('/assets/sounds/beep.mp3') }}");

        let name = $("#name").val().trim();
        let mobile = $("#mobile").val().trim();
        let email = $("#email").val().trim();

        if (!name || !mobile || !email) {
            swal("Error", "Please fill all the fields.", "error");
            return;
        }

        // If cart is empty, disallow
        if (selectedItems.length === 0) {
            swal("Empty Cart", "Please select at least one item before ordering.", "info");
            return;
        }

        let data = {
            total: total,
            hotelId: '{{ $hotel->id }}',
            mobile: mobile,
            tableId: '{{ $table->table_id }}', // ensure `$table` is defined in your controller
            email: email,
            name: name,
            selectedItems: selectedItems,
        };

        $.ajax({
            url: "/create-order-new",
            method: "POST",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                // If you want a beep sound upon success:
                audio.play();
                // redirect to order detail page
                window.location.href = "/order/" + response.orderID;
            },
            error: function (error) {
                console.log(error);
                swal("Error", "Unable to place the order.", "error");
            },
        });
    }
</script>
</body>
</html>
