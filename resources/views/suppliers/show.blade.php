@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show supplier
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h5>Name: {{ $supplier->name }}</h5>
                    <p>Address: {{ $supplier->address }}</p>
                    <p>Phone number: {{ $supplier->phone_number }}</p>
                    <p>Email: {{ $supplier->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
