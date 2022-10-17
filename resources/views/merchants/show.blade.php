@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show merchant
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h5>Name: {{ $merchant->name }}</h5>
                    <p>{{ $merchant->details }}</p>
                    <h3>Ksh. {{ $merchant->price }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
