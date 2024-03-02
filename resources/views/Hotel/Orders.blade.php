<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=false, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Orders - Home</title>
    @include('Components.HeaderImports')

</head>

<body class="MainBG ">

    <nav class="navbar navbar-expand-lg " style="background-color: #FFF">
        <div class="container-fluid">
            <a class="navbar-brand " href="#">{{ $user->name }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
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
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>



    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <p class="text-success">{{ session('success') }} </p>
                @endif

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </div>
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center mt-5">Hotel Orders</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover table-bordered mt-5">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Order Time</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Customer Data</th>
                                        <th scope="col">Order Total</th>
                                        <th scope="col">Orderd Menus</th>
                                        @can('process_payment')
                                            <th scope="col">Complete Payment</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($orders) --}}
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->order_id }}</th>
                                            <td>{{ $order->created_at->format('H:i:s') }}</td>
                                            <td>
                                                @if ($order->isPaid == 1)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-danger">Not Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>{{ $order->customer_name }}</li>
                                                    <li>{{ $order->customer_mobile }}</li>
                                                    <li>{{ $order->customer_email }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                {{-- @dd($order->getOrderTotal()) --}}
                                                Rs.{{ $order->getOrderTotal() }}
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach ($order->orderdMenus as $orderedMenu)
                                                        <li>{{ $orderedMenu->qty }} x
                                                            {{ $orderedMenu->menu->menu_name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>

                                            @can('process_payment')
                                                <td>
                                                    @if ($order->isPaid == 0)
                                                        <a href="{{ route('Process.Payment', $order->id) }}"
                                                            class="btn btn-success">Complete Payment</a>
                                                    @else
                                                        <span class="badge bg-success">Paid</span>
                                                    @endif
                                                </td>
                                            @endcan
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



    @include('Components.FooterImports')
</body>

</html>
