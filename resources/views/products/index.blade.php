@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Products</h2>
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('products.create') }}">Create New Product</a>
                    @endcan
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                            @can('product-edit')
                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('product-delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->links() !!}
    </div>
@endsection
