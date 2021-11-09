@extends('layouts.admin')

@section('title')
<title>Add prodcut</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admins/Product/index/list.css')}}">
@endsection

@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/Product/index/list.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header',['name' => 'Product','key' => 'List'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Unit Price</th>
                  <th scope="col">View Price</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($products as $productItem)
              <tr>
                  <th scope="row">{{ $productItem->id  }}</th>
                  <td>{{ $productItem->name }}</td>
                  <td>{{ number_format($productItem->Unit_price) }}</td>
                  <td>{{ number_format($productItem->views_count) }}</td>
                  <td>
                      <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}" alt="">
                  </td>
                  <td>{{ optional($productItem->Typeproducts)->name }}</td>
                  <td>
                      <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                         class="btn btn-default">Edit</a>
                      <a href=""
                         data-url="{{ route('product.delete', ['id' => $productItem->id]) }}"
                         class="btn btn-danger action_delete">Delete</a>

                  </td>
              </tr>
          @endforeach


            </tbody>
          </table>
        </div>
       <div class="col-md-12">
         {{$products->links()}}
       </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

