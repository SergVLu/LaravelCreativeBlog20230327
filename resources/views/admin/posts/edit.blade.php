@extends ('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование Поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row ">          
          <div class="col-12">
            <form action="{{ route('admin.post.update', $post->id)}}" class="w-25" method="post">
              @csrf
              @method('put')
              <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Название поста" value="{{$post->title}}">
                <input type="text-area" class="form-control" name="content" placeholder="Контент" value="{{$post->content}}">
                @error("title")
                <div class="text-danger">Title обязательно и не более 63 символов</div>
                @enderror
                @error("content")
                <div class="text-danger">Content обязательно и не менее 10 символов</div>
                @enderror
              </div>
              <input type="submit" value="Change Post" class="btn btn-success">
            </form>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection