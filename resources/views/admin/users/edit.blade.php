@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/user/add/add.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/user/add/add.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['name' => 'User', 'key' => 'Edit'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{route('users.update',['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" value="{{$user->name}}"  name="name" class="form-control " placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label >Email</label>
                    <input type="text" value="{{$user->email}}"  name="email" class="form-control " placeholder="Enter Email">
                  </div>

                  <div class="form-group">
                    <label >Password</label>
                    <input type="password"  name="password" class="form-control " placeholder="Enter Password">
                  </div>

                  {{-- <div class="form-group">
                    <label >Chọn vai trò</label>
                    <select name="role_id[]" class="form-control select2_init" multiple>
                        <option value="">admin</option>
                        @foreach ($roles as $item )

                            <option {{$roleOfUser->contains('id', $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                  </div> --}}




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

