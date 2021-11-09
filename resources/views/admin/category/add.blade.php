@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['name' => 'category', 'key' => 'Add'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      @if (session('alert_category'))
        <div class="alert alert-danger">
            {{ session('alert_category') }}
        </div>
    @endif
      <div class="row">
          <div class="col-md-6">
            <form action="{{route('categories.store')}}" method="POST">
              @csrf
                <div class="form-group">
                  <label >Name list</label>
                  <input required type="text" name="name" class="form-control" placeholder="Enter the list name">
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

