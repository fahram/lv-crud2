@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">Category<span class="float-right"><a href="/product/create" class="btn-sm btn-primary">Tambah Data</a></span></div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Barcode</td>
                        <td>Stock</td>
                        <td>Unit</td>
                        <td>Category</td>
                        <td>Picture</td>
                        <td width="177">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <!-- @php $path = Storage::url($product->picture); @endphp -->
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->barcode}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->unit}}</td>
                        <td>{{$product->category->name}}</td>
                        <td><img src="{{ Storage::url($product->picture) }}" height="50"></td>
                        <td>
                          <a href="/product/{{$product->id}}" class="btn btn-sm btn-success">Show</a>
                          <a href="/product/{{$product->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                          {{ Form::open(array('url' => 'product/'.$product->id, 'class' => 'float-right')) }}
                          {{ Form::hidden('_method', 'DELETE') }}
                          {{ Form::submit('Delete', array('class' => 'btn btn-sm btn-danger btn-submit')) }}
                          {{ Form::close() }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
  $('.btn-submit').on('click', function(e) {
    e.preventDefault();
    var form = $(this).parent('form');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '@#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
        form.submit();
      }
    })
  });
</script>
@endpush
