@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['name' => 'category', 'key' => 'Edit'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{route('categories.update',['id' => $typeproducts->id])}}" method="POST">
              @csrf
                <div class="form-group">
                      <label >Name list</label>
                  <input type="text" name="name" value="{{$typeproducts->name}}" class="form-control" placeholder="Enter name list">
                </div>

                <div class="form-group">
                    <label>Choose a parent list</label>
                    <select class="form-control" name="parent_id">
                      <option value="0">Choose a parent list</option>
                      {!! $htmlOption !!}
                    </select>
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

