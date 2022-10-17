@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    Order name
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h5>{{ $order->name }}</h5>
                </div>
            </div>
            
            <a class="btn btn-sm btn-success" href="{{ route('orders.addProduct',$order->id)}}">Add product</a> 

            <div class="card">
                <div class="card-header">
                    Products
                </div>
                
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderProducts as $orderProduct)
                                <tr>
                                    <th scope="row">{{ $orderProduct->id }}</th>
                                    <td>{{ $orderProduct->name }}</td>
                                    <td>{{ $orderProduct->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
