@extends('layouts.admin')

@section('title')
<title>Edit product</title>
@endsection



@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/Product/add/add.css')}}" rel="stylesheet" />
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['name' => 'product', 'key' => 'Edit'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{route('product.update',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label >Product name</label>
                  <input type="text" name="name" value="{{$product->name}}"  class="form-control" placeholder="Enter the product name">
                </div>

                <div class="form-group">
                    <label >Product Unit Price</label>
                    <input type="text"  name="Unit_price" value="{{$product->Unit_price}}" class="form-control">
                  </div>

                <div class="form-group">
                    <label >Product View Price</label>
                    <input type="text"  name="views_count" value="{{$product->views_count}}" class="form-control">
                </div>

                  <div class="form-group">
                    <label >Avatar</label>
                    <input type="file" name="feature_image_path" class="form-control-file">

                    <div class="col-md-4 feature_image_container">
                      <div class="row">
                          <img class="feature_image" src="{{ $product->feature_img_path }}" alt="">
                      </div>
                  </div>

                  </div>

                  <div class="form-group">
                    <label>Detailed photos</label>
                    <input type="file"
                           multiple
                           class="form-control-file"
                           name="image_path[]"
                    >
                    <div class="col-md-12 container_image_detail">
                        <div class="row">
                            @foreach($product->images() as $producImageItem)
                                <div class="col-md-3">
                                    <img class="image_detail_product"
                                         src="{{ $producImageItem->img_path }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2_init" name="category_id">
                      <option value="">select catalog</option>
                      {!! $htmlOption !!}
                  </select>
              </div>

                  <div class="form-group">
                    <label>Import content</label>
                    <textarea class="form-control" name="description"  rows="3">{{$product->description}}</textarea>
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/Product/add/add.js')}}"></script>
@endsection

