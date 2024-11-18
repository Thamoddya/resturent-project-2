<?php header('Access-Control-Allow-Origin: *'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>Order Status</title>
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

        .navbar {
            background: #ff5722;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
        }

        .header-section {
            background: #ff5722;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header-section h4,
        .header-section h6 {
            margin: 0;
        }

        .content-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .order-status-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-primary,
        .btn-success,
        .btn-danger {
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .btn-primary {
            background: #ff5722;
            border: none;
        }

        .btn-primary:hover {
            background: #e64a19;
        }

        .btn-success {
            background: #4caf50;
            border: none;
        }

        .btn-success:hover {
            background: #388e3c;
        }

        .btn-danger {
            background: #f44336;
            border: none;
        }

        .btn-danger:hover {
            background: #d32f2f;
        }

        .payment-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .payment-status h6 {
            margin: 0;
        }

        .modal-content {
            border-radius: 8px;
        }

        .modal-header {
            background: #ff5722;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        @media (max-width: 768px) {
            .header-section {
                text-align: center;
            }

            .payment-status {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .table {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Order Status</a>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Header Section -->
        <div class="header-section">
            <h4>Welcome, {{ $orderData->customer_name }}!</h4>
            <h6>Order ID: #{{ $orderData->order_id }}</h6>
        </div>

        <div class="row">
            <!-- Order Details Section -->
            <div class="col-12 col-md-5">
                <div class="content-card">
                    <h5 class="order-status-title">Order Status</h5>
                    <div>
                        <h6><strong>Order ID:</strong> #{{ $orderData->order_id }}</h6>
                        <h6><strong>Invoice ID:</strong> #2334344-34334-343434-3434</h6>
                        <h6><strong>Name:</strong> {{ $orderData->customer_name }}</h6>
                        <h6><strong>Email:</strong> {{ $orderData->customer_email }}</h6>
                        <h6><strong>Mobile:</strong> {{ $orderData->customer_mobile }}</h6>
                        <hr>
                        <h6><strong>Total:</strong> <span class="text-success">Rs. {{ $orderData->total_price }}</span>
                        </h6>
                        <h6><strong>Payment Status:</strong>
                            @if ($orderData->isPaid == 1)
                                <span class="text-success">Paid</span>
                            @elseif ($orderData->isPaid == 0)
                                <span class="text-danger">Not Paid</span>
                            @else
                                <span class="text-primary">To Cashier</span>
                            @endif
                        </h6>
                        <h6><strong>Payment Method:</strong>
                            @if ($orderData->order_type_id == null)
                                <span class="text-danger">Not Selected</span>
                                <p class="text-danger">*To confirm order, please select a payment method.</p>
                            @else
                                <span class="text-success">{{ $orderType->order_type }}</span>
                            @endif
                        </h6>
                    </div>

                    @if ($orderData->isPaid == 0 || $orderData->isPaid == 2)
                        <div class="payment-status">
                            <h6>Select Payment Method:</h6>
                            @if ($orderData->isPaid == 2)
                                <button disabled class="btn btn-success">Paid to Cashier</button>
                            @else
                                <a href="{{ route('payToCasher', $orderData->order_id) }}" class="btn btn-success">Pay
                                    to Cashier</a>
                            @endif
                        </div>
                    @else
                        <button class="btn btn-primary mt-3">Get E-Bill</button>
                    @endif
                </div>
            </div>

            <!-- Ordered Foods Section -->
            <div class="col-12 col-md-7">
                <div class="content-card">
                    <h5 class="order-status-title">Ordered Items</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderdFoods as $foods)
                                <tr>
                                    <td><img style="width: 60px" src="{{ $foods->menu->menu_image_path }}"
                                            alt="Food Image"></td>
                                    <td>{{ $foods->menu->menu_name }}</td>
                                    <td>{{ $foods->qty }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        var refreshInterval;

        function startAutoRefresh() {
            refreshInterval = setInterval(function() {
                location.reload();
            }, 30000);
        }

        function stopAutoRefresh() {
            clearInterval(refreshInterval);
        }
        window.onload = function() {
            startAutoRefresh();
        };

        function makePayment(id) {
            stopAutoRefresh();
            $.ajax({
                url: `{{ url('/getHash/') }}/${id}`,
                method: "get",
                data: {
                    'orderID': id
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("OrderID:" + orderId);
                    };

                    payhere.onDismissed = function onDismissed() {
                        console.log("Payment dismissed");
                    };

                    payhere.onError = function onError(error) {
                        console.log("Error:" + error);
                    };

                    var payment = {
                        "sandbox": true,
                        "merchant_id": data.merchant_id,
                        "return_url": "http://localhost:8000/cart",
                        "cancel_url": "http://localhost:8000/cart",
                        "notify_url": "http://sample.com/notify",
                        "order_id": data.order_id,
                        "items": data.items,
                        "amount": data.amount,
                        "currency": data.currency,
                        "hash": data.hash,
                        "first_name": data.first_name,
                        "last_name": data.last_name,
                        "email": data.email,
                        "phone": data.phone,
                        "address": data.address,
                        "city": data.city,
                        "country": data.country,
                        "delivery_address": data.address,
                        "delivery_city": data.city,
                        "delivery_country": data.country,
                        "itemData": data.itemData
                    };
                    console.log(payment);
                    payhere.startPayment(payment);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            })
        }
    </script>
</body>

</html>
