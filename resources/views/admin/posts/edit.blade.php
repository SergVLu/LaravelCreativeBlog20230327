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
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
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
            <form action="{{ route('admin.post.update', $post->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="form-group w-40">
                <input type="text" class="form-control"  name="title" value="{{$post->title}}">
                @error("title")
                  <div class="text-danger">{{ $message }}</div>
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
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-75">
                <label for="exampleInputFile">Добавить картинку превью</label>
                <div class="row">
                  <img src="{{url('storage/'.$post->preview_image)}}" alt="preview_image" class="w-25 mb-2">
                </div>
                <div class="input-group ">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name='preview_image' value="{{url('storage/'.$post->preview_image) }}" >
                    <label class="custom-file-label" >Add preview image file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Выбрано для загрузки</span>
                  </div>
                  @error("preview_image")
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <label for="exampleInputFile">Добавить главное изображение</label>
                <div class="row">
                  <img src="{{url('storage/'.$post->main_image)}}" alt="main_image" class="w-50  mb-2">
                </div>
                <div class="input-group ">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name='main_image' value="{{url('storage/'.$post->main_image) }}">
                    <label class="custom-file-label" >Add main image file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Выбрано для загрузки</span>
                  </div>
                  @error("main_image")
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group w-75">
                <label>Выберите категорию</label>
                <select class="form-control" name='category_id'>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                    {{ $cat->id == $post->category_id ? 'selected' : '' }}
                    >{{ $cat->title }}</option>
                  @endforeach
                </select>
                @error("category_id")
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Тэги</label>
                  <select class="select2" name='tag_ids[]' multiple="multiple" data-placeholder="Выберите Тэги" style="width: 100%;">
                    @foreach($tags as $tag)
                      <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected':''}} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                  </select>
                  @error("tag_ids")
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group  mt-2">
                <input type="submit" value="Обновить Post" class="btn btn-success">
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