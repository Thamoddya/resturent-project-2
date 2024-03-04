<?php header('Access-Control-Allow-Origin: *'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://kit.fontawesome.com/3840ac106f.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-secondary bg-opacity-50 ">
                <div class="row  m-3">
                    <div class="col-12">
                        <h4>Welcome , {{ $orderData->customer_name }} ! </h4>
                    </div>
                    <div class="col-12">
                        <h6 class="text-primary">#{{ $orderData->order_id }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 ">
                <div class="row bg-secondary bg-opacity-25">
                    <div class="col-12 mt-2">
                        <h6 class="text-center">ORDER STATUS</h6>
                        <hr>
                    </div>
                    <div class="col-12 m-2">
                        <h6 class="fw-bold">ORDER ID :- #<span class="">{{ $orderData->order_id }}</span></h6>
                        <h6 class="fw-bold">INVOICE ID :- <span class="text-primary "> #2334344-34334-343434-3434</span>
                        </h6>
                        <h6 class="fw-bold">NAME :- {{ $orderData->customer_name }}</h6>
                        <h6 class="fw-bold">EMAIL :- {{ $orderData->customer_email }}</h6>
                        <h6 class="fw-bold">MOBILE :- {{ $orderData->customer_mobile }}</h6>
                        <hr>
                    </div>
                    <div class="col-12">
                        <h6>TOTAL :- <span class="text-success">Rs. {{ $orderData->getOrderTotal() }}</span></h6>
                        <h6>PAYMENT STATUS :-
                            @if ($orderData->isPaid == 1)
                                <span class="text-success">PAID</span>
                            @else
                                <span class="text-danger">NOT PAID</span>
                            @endif

                        </h6>
                        <h6>PAYMENT METHOD :-
                            @if ($orderData->order_type_id == null)
                                <span class="text-danger">NOT SELECTED</span>
                                <p class="text-danger">*To Confirm Order , Please Make sure to select payment method.
                                </p>
                            @else
                                <span class="text-success">{{ $orderType->order_type }}</span>
                            @endif
                        </h6>
                    </div>
                    @if ($orderData->isPaid == 0)
                        <div class="col-12 mt-3 mb-3">
                            <h6>Select Payment Method</h6>
                            <button class="btn btn-primary rounded-0"
                                onclick="makePayment('{{ $orderData->order_id }}');">PAY ONLINE
                            </button>
                            <button class="btn btn-success rounded-0">PAY TO CATCHER</button>
                            {{--                        <button class="btn btn-outline-success rounded-0" data-bs-toggle="modal" --}}
                            {{--                                data-bs-target="#exampleModal">ADD MORE --}}
                            {{--                        </button> --}}
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">More Foods</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            @foreach ($orderdFoods as $food)
                                                <div class="col-6 col-md-3 p-2">
                                                    <!-- Add a unique identifier to each item for tracking -->
                                                    <div class="row" id="food_{{ $food->id }}">
                                                        <div class="col-12">
                                                            @if ($food->menu_image_path == null)
                                                                <img src="{{ asset('assets/images/section/menu-slider-1.jpg') }}"
                                                                    class="img-fluid card-img rounded-start"
                                                                    alt="...">
                                                            @else
                                                                <img src="{{ $food->menu_image_path }}"
                                                                    class="img-fluid card-img rounded-start"
                                                                    alt="...">
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-body">
                                                                <h5 class="card-title fw-bold">{{ $food->menu_name }}
                                                                </h5>
                                                                <p class="card-text">{{ $food->food_description }}.</p>
                                                                <p class="card-text">Rs:- {{ $food->menu_price }}.00 x
                                                                    {{ $food->qty }}</p>
                                                                <!-- Add a button to select the item -->
                                                                <button class="btn btn-primary rounded-0"
                                                                    onclick="selectItem({{ $food->id }}, '{{ $food->food_title }}', {{ $food->price }})">
                                                                    SELECT
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12 mt-3 mb-3">
                            <h6>Payment Details</h6>
                            <button class="btn btn-outline-primary rounded-0">GET E-BILL</button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-7 ">
                <div class="row p-1">
                    <div class="col-12">
                        <div class="row bg-secondary bg-opacity-25">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col"></th>
                                        <th scope="col">Price (RS)</th>
                                        <th></th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    {{-- @dd($orderdFoods) --}}
                                    @foreach ($orderdFoods as $foods)
                                        <tr class="align-middle">
                                            <th><img style="width: 60px " src="{{ $foods->menu->menu_image_path }}">
                                            </th>
                                            <td>{{ $foods->menu->menu_name }}</td>
                                            <td>{{ $foods->qty }} </td>
                                            <td>x</td>
                                            <td>{{ $foods->menu->menu_price }}.00</td>
                                            <td> = </td>
                                            <td>Rs.{{ $foods->menu->menu_price * $foods->qty }}.00</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                        // $.ajax({
                        //     url: `{{ url('/confirm-payment/') }}/${orderID}`,
                        //     method: "get",
                        //     data: {
                        //         'orderID': orderID
                        //     },
                        //     dataType: "json",
                        //     success: function(data) {
                        //         if (data.message === 'success') {
                        //             window.location.reload();
                        //             startAutoRefresh();
                        //         } else {
                        //             alert('Error Occurred , Contact Administrator');
                        //         }
                        //     }
                        // });
                        alert('Payment is successful. Order ID :' + orderId);
                    };
                    payhere.onDismissed = function onDismissed() {
                        startAutoRefresh();
                        console.log("Payment dismissed");
                    };
                    payhere.onError = function onError(error) {
                        startAutoRefresh();
                        console.log("Error:" + error);
                    };
                    var payment = {
                        "sandbox": true,
                        "merchant_id": "{{ config('app.payhere.merchant_id') }}",
                        "return_url": undefined,
                        "cancel_url": undefined,
                        "notify_url": "http://sample.com/notify",
                        "order_id": data.order_id,
                        "items": `${data.items}`,
                        "amount": `${data.amount}`,
                        "currency": `${data.currency}`,
                        "hash": `${data.hash}`,
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
                    };
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
