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
            <form action="{{ route('admin.post.update', $post->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group">
                <input type="text" class="form-control w-25" name="title" placeholder="Название поста" value="{{$post->title}}">
                @error("title")
                <div class="text-danger">Title обязательно и не более 63 символов</div>
                @enderror
              </div>
              <div class="form-group w-75">
                <textarea id="summernote" name="content" >
                  @if(old('content'))
                  {{old('content')}}
                  @else
                  {{$post->content}}
                  @endif
                </textarea>
                @error("content")
                <div class="text-danger">Content обязательно и не менее 10 символов</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" value="Change Post" class="btn btn-success">
              </div>
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