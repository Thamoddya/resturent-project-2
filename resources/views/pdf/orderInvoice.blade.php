<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Small Receipt Invoice</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .invoice-box {
            max-width: 300px;
            /* Small receipt width */
            margin: auto;
            padding: 10px;
            border: 1px dashed #000;
            text-align: center;
        }

        .invoice-box h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .invoice-box p {
            margin: 0;
            padding: 0;
        }

        .divider {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table td {
            text-align: left;
            padding: 2px 0;
        }

        .totals td {
            font-weight: bold;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .thank-you {
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <!-- Logo and Address -->
        <h1>
            {{$hotel->hotel_name}}
        </h1>
        <p>
            {{$hotel->hotel_address}}
        </p>
        <p>
            {{$hotel->hotel_mobile}}
        </p>

        <div class="divider"></div>

        <!-- Invoice Info -->
        <p>Receipt #: {{ $invoiceID }}</p>

        <div class="divider"></div>

        <!-- Items -->
        <table>
            <thead>
                <tr>
                    <td>Item</td>
                    <td class="right">Price</td>
                    <td class="center">Qty</td>
                    <td class="right">Amount</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderdMenus as $index => $orderedMenu)
                                <tr>
                                    <td>{{ $index + 1 }}. {{ $orderedMenu->menu->menu_name }}</td>
                                    <td class="right">
                                        @php
                                            $menuType = \App\Models\MenuType::where('type_name', $orderedMenu->menu_name)->first();
                                        @endphp
                                        {{ number_format($menuType->type_price, 2) }}
                                    </td>
                                    <td class="center">{{ $orderedMenu->qty }}</td>
                                    <td class="right">{{ number_format($orderedMenu->qty * $orderedMenu->menu->price, 2) }}</td>
                                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="divider"></div>

        <!-- Additional Charges -->
        <table>
            <!-- <tr>
                <td>Service Charge (10%)</td>
                <td class="right">{{ number_format($order->total_price * 0.1, 2) }}</td>
            </tr>
            <tr>
                <td>Corkage Fee</td>
                <td class="right">200.00</td>
            </tr> -->
            <tr class="totals">
                <td>Net Amount</td>
                <td class="right">{{ number_format($order->total_price) }}</td>
            </tr>
        </table>

        <div class="divider"></div>

        <!-- Footer -->
        <table>
            <tr>
                <td>Total Products: {{ $order->orderdMenus->count() }}</td>
                <td class="right">Total Qty: {{ $order->orderdMenus->sum('qty') }}</td>
            </tr>
            <tr>
                <td>Date: {{ date('d/m/Y') }}</td>
                <td class="right">Time: {{ date('h:i A') }}</td>
            </tr>
        </table>

        <div class="divider"></div>

        <p class="thank-you">### THANK YOU COME AGAIN ###</p>
    </div>
</body>

</html>