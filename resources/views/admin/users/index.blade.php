@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
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
        @include('partials.content-header',['name' => 'User','key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12">
                      <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Adddđ</a>
                    </div> --}}
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $item)
                                <?php
                                if($item->role == NULL ){


                                ?>
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>

                                        <a data-url="{{route('users.delete',['id' => $item->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$users->links()}}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

