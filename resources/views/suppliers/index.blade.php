@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All suppliers
                </div>
                <a class="btn btn-sm btn-success" href="{{ route('suppliers.create')}}">Add supplier</a> 

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
                            <th scope="col">Address</th>
                            <th scope="col">phone number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date added</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <th scope="row">{{ $supplier->id }}</th>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ $supplier->phone_number }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->created_at }}</td>
                                    <td>
                                        <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="post">
                                            <a class="btn btn-info" href="{{ route('suppliers.show',$supplier->id)}}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('suppliers.edit',$supplier->id)}}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
