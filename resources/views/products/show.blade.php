@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show product
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h5>{{ $product->name }}</h5>
                    <p>{{ $product->details }}</p>
                    <h3>Ksh. {{ $product->price }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
