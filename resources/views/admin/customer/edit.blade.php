@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['name' => 'Đơn hàng', 'key' => 'Edit'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{route('donhang.update',['id' => $list->id])}}" method="POST">
              @csrf
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" name="name" value="{{$list->customer_name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label >phone</label>
                    <input type="text" name="phone" value="{{$list->phone}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label >email</label>
                    <input type="text" name="email" value="{{$list->email}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label >address</label>
                    <input type="text" name="address" value="{{$list->address}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label >total</label>
                    <input type="text" name="total" value="{{$list->total}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        @if ($list->status == "Processing")
                        <option selected value="Processing">Processing</option>
                        <option value="cancelled">cancelled</option>
                        <option value="Completed">Completed</option>
                        @elseif ($list->status == "cancelled")
                        <option  value="Processing">Processing</option>
                        <option selected value="cancelled">cancelled</option>
                        <option value="Completed">Completed</option>
                        @elseif ($list->status == "Completed")
                        <option  value="Processing">Processing</option>
                        <option  value="cancelled">cancelled</option>
                        <option selected value="Completed">Completed</option>
                        @endif
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

