<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .invoice {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-details div {
            flex: 1;
        }

        .item-list {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .item-list th, .item-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }

        .status.unpaid {
            background-color: #d81818;
            color: #fff;
            padding: 7px;
            border-radius: 5px;
        }

        .status.paid {
            background-color: rgb(46, 194, 113);
            color: #fff;
            padding: 7px;
            border-radius: 5px;
        }
    </style>
    <title>INVOICE</title>
</head>
<body>

    <div class="invoice">
        <div class="header">
            <h1>Invoice</h1>
        </div>

        <div class="invoice-details">
            <div>
                <h4>From:</h4>
                <p>Atlas Shop<br>
                Jl. Wonodri sendang raya no. 15 C, Pleburan<br>
                Semarang selatan<br>
                Phone: +81 27-180-1102</p>
            </div>

            <div>
                <h4>To:</h4>
                <p>{{ $order->user->name }}<br>
                {{ $order->user->address }}<br>
                Phone: {{ $order->user->nohp }}<br>
                Date Order: {{ Carbon\Carbon::parse($order->date)->format('d F Y') }}  
                </p>
            </div>
        </div>

        <table class="item-list">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($order_details as $order_detail)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $order_detail->product->name_product }}</td>
                    <td>{{ $order_detail->total }}</td>
                    <td>IDR. {{ number_format($order_detail->product->price) }}</td>
                    <td>IDR. {{ number_format($order_detail->total_price) }}</td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4">Add additional notes and payment information</td>
                  <td colspan="4">Ongkir (JNE) </span>{{ number_format($order->tax) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <p>Total: IDR. {{ number_format($order->total_price) }}</p>
        </div>
        
        @if ($order->status == 1)
            <div class="status paid">
                <p>Status: Paid</p>
            </div>
        @else
            <div class="status unpaid">
                <p>Status: Unpaid</p>
            </div>
        @endif
    </div>

</body>
</html>
