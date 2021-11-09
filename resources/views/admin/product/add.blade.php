@extends('layouts.admin')

@section('title')
<title>Add product</title>
@endsection

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/Product/add/add.css')}}" rel="stylesheet" />
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['name' => 'product', 'key' => 'Add'])
    {{-- <div class="col-md-12">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
      @endif

    </div> --}}
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label >Product Name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror

                </div>

                <div class="form-group">
                    <label >Product Unit Price</label>
                    <input type="text" value="{{old('Unit_price')}}" name="Unit_price" class="form-control @error('Unit_price') is-invalid @enderror">

                    @error('Unit_price')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                  </div>

                <div class="form-group">
                    <label >Product Count</label>
                    <input type="text" value="{{old('views_count')}}" name="views_count" class="form-control @error('views_count') is-invalid @enderror">

                    @error('views_count')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" name="feature_image_path" class="form-control-file">
                  </div>

                  <div class="form-group">
                    <label >Detailed photos</label>
                    <input type="file" multiple name="image_path[]" class="form-control-file" >
                  </div>

                <div class="form-group">
                    <label>Select catalog</label>
                    <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                      <option value="">Select catalog</option>
                      {!! $htmlOption !!}
                    </select>
                    @error('category_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label>Import content</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"  rows="3">{{old('description')}}</textarea>
                    @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
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

