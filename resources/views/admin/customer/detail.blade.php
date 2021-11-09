@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header',['name' => 'Đơn hàng','key' => 'Detail'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          {{-- <a href="" class="btn btn-success float-right m-2">Add</a> --}}
        </div>
        <div class="container">
            <p>Code orders: {{$order->id}}</p>
            <p>Customer name: {{$order->customer_name}}</p>
            <p>Email: {{$order->email}}</p>
            <p>Phone: {{$order->phone}}</p>
            <p>Address {{$order->address}}</p>

        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Code orders</th>
                <th scope="col">product code</th>
                <th scope="col">product name</th>
                <th scope="col">Size</th>
                <th scope="col">quantity</th>
                <th scope="col">price</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($list as $item)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->order_id}}</td>
                <td>{{$item->product_id}}</td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->price * $item->quantity}}</td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
       <div class="col-md-12">
         {{-- {{$categories->links()}} --}}
       </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

