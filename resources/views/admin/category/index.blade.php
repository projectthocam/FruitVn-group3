@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header',['name' => 'Category','key' => 'List']);

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name list</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($categories as $item)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>
                  <a href="{{route('categories.edit',['id' => $item->id])}}" class="btn btn-default">Edit</a>
                  <a  data-url="{{route('categories.delete',['id' => $item->id])}}" class="btn btn-danger action_delete">Delete</
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
       <div class="col-md-12">
         {{$categories->links()}}
       </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

