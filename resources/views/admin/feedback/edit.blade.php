@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admins/feedback/add/add.css')}}">
@endsection

@section('js')
  <script src="{{asset('admins/feedback/add/add.js')}}">

  </script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['name' => 'Roles', 'key' => 'Add'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <?php
            $item = DB::table('news')->where('id',$id)->select('note','link')->get(); //get note & link
            // dd($item[0]->note);
        ?>
        <form action="{{ route('news.edit', ['id' => $id]) }}" method="POST" enctype="multipart/form-data" style="width: 100%">
          <div class="col-md-12">

              @csrf
                <div class="form-group">
                  <label >Note</label>
                  <input type="text" value="<?php echo $item[0]->note; ?>" name="note" class="form-control " placeholder="Display content">
                </div>
                <div class="form-group">
                    <label >Link</label>

                    <textarea name="link" class="form-control "  rows="4"><?php echo $item[0]->link; ?></textarea>
                  </div>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

