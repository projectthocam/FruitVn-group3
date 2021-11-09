@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/index/index.css')}}">
@endsection

@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/slider/index/index.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header',['name' => 'Slider','key' => 'Add']);

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">slider name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($slider as $item)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <th> <img class="image_slider_150_100" src="{{$item->image_path}}" alt=""></th>
                <td>
                  <a href="{{route('slider.edit', ['id' => $item->id])}}" class="btn btn-default">Edit</a>
                  <a data-url="{{ route('slider.delete', ['id' => $item->id]) }}" class="btn btn-danger action_delete">Delete</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
       <div class="col-md-12">
         {{$slider->links()}}
       </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

