@extends('layouts.default')

@section('content')
    <div class="page page-home pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            Add new product
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="/products" method="post">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-xs-12 col-sm-3 col-lg-3 text-sm-right">Product Name</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-9">
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Product Name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-xs-12 col-sm-3 col-lg-3 text-sm-right">Price Per Item</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-9">
                                        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" placeholder="Price Per Item" value="{{ old('price') }}">
                                        @if($errors->has('price'))
                                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="quantity" class="col-xs-12 col-sm-3 col-lg-3 text-sm-right">Product Quantity</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-9">
                                        <input type="text" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" id="quantity" placeholder="Product Quantity" value="{{ old('quantity') }}">
                                        @if($errors->has('quantity'))
                                            <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <hr>

                                <div class="text-right">
                                    <button class="btn btn-primary">Create Product</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if($products->count() > 0)
                        <div class="products-container">
                            <h2 class="mb-3">Products</h2>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th class="text-right">Quantity in stock</th>
                                    <th class="text-right">Price per item</th>
                                    <th>Datetime submitted</th>
                                    <th class="text-right">Total value</th>
                                </tr>
                                </thead>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product['name'] }}</td>
                                        <td class="text-right">{{ $product['quantity'] }}</td>
                                        <td class="text-right">${{ money_format('%i', $product['price']) }}</td>
                                        <td>{{ $product['created_at'] }}</td>
                                        <td class="text-right">${{ money_format('%i', $product['quantity'] * $product['price']) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <th class="text-right">Total</th>
                                    <td class="text-right">${{ money_format('%i', $totalInventoryValue) }}</td>
                                </tr>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
