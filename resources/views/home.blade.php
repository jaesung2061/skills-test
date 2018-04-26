@extends('layouts.default')

@section('content')
    <div class="page page-home pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            Add new product
                        </div>
                        <div class="card-body">
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
                                    <label for="price" class="col-xs-12 col-sm-3 col-lg-3 text-sm-right">Product Price</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-9">
                                        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" placeholder="Product Price" value="{{ old('price') }}">
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


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
