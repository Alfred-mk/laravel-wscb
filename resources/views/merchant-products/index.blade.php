@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All products
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-hover table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date added</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>Ksh. {{ $product->price }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('merchant.products.show',$product->id)}}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('products.show',$product->id)}}">Order</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
