@extends('layouts.admin')

@section('title')
    <title>Roles</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('admins/slider/index/index.css')}}">
@endsection
@section('Js')
    <script src="{{asset('admins\Roles\Roles.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name' => 'Product','key' => 'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col" class="col-md-1">STT</th>
                                <th scope="col" class="col-md-2">Name</th>
                                <th scope="col" class="col-md-9">Description of the role</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($role as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->display_name}}</td>
                                    <td>
                                            <a href="{{route('roles.edit', ['id'=>$item->id])}}"
                                               class="btn btn-success" role="button"><i class="far fa-edit fa-2x"></i></a>
                                    </td>
                                    <td>
                                            <a href="{{route('roles.delete',['id'=>$item->id])}}"
                                               class="btn btn-danger" id="RolesDelete" role="button" onclick="return confirm('Are you sure delete this roles ?')"><i class="far fa-trash-alt fa-2x"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$role->links()}}
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <!-- /.content -->
    </div>
@endsection


