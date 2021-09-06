@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">{{$category->name}}</div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>Id</td>
                        <td>name</td>
                        <td>Barcode</td>
                        <td>Stock</td>
                        <td>Unit</td>
                        <td>Category</td>
                        <td>Picture</td>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($category->product as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->barcode}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->unit}}</td>
                        <td>{{$product->category->name}}</td>
                        <td><img src="{{ Storage::url($product->picture) }}" height="50"></td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="3"></td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
