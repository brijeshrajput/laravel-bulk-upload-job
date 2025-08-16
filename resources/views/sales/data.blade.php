@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h1 class="text-center">Sales Data</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Order Date</th>
                            <th scope="col">Region</th>
                            <th scope="col">Country</th>
                            <th scope="col">Item Type</th>
                            <th scope="col">Sales Channel</th>
                            <th scope="col">Order Priority</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Units Sold</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Unit Cost</th>
                            <th scope="col">Total Revenue</th>
                            <th scope="col">Total Cost</th>
                            <th scope="col">Total Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->order_date }}</td>
                                <td>{{ $sale->region }}</td>
                                <td>{{ $sale->country }}</td>
                                <td>{{ $sale->item_type }}</td>
                                <td>{{ $sale->sales_channel }}</td>
                                <td>{{ $sale->order_priority }}</td>
                                <td>{{ $sale->order_id }}</td>
                                <td>{{ $sale->units_sold }}</td>
                                <td>{{ $sale->unit_price }}</td>
                                <td>{{ $sale->unit_cost }}</td>
                                <td>{{ $sale->total_revenue }}</td>
                                <td>{{ $sale->total_cost }}</td>
                                <td>{{ $sale->total_profit }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            <div class="col-md-12 mt-4">
            {{ $sales->links() }}
            </div>
        </div>
    </div>
@endsection
