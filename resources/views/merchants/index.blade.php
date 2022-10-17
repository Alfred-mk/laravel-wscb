@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All merchants
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
                            <th scope="col">Email</th>
                            <th scope="col">Date added</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($merchants as $merchant)
                                <tr>
                                    <th scope="row">{{ $merchant->id }}</th>
                                    <td>{{ $merchant->name }}</td>
                                    <td>{{ $merchant->email }}</td>
                                    <td>{{ $merchant->created_at }}</td>
                                    <td>
                                        <form action="{{ route('merchants.destroy',$merchant->id) }}" method="post">
                                            <a class="btn btn-info" href="{{ route('merchants.show',$merchant->id)}}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('merchants.edit',$merchant->id)}}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $merchants->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
