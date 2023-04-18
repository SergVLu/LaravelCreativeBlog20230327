@extends ('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Создание Поста</h1>
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
            <form action="{{ route('admin.post.store')}}" method="post" enctype='multipart/form-data' >
              @csrf
              <div class="form-group w-25">
                <input type="text" class="form-control"  name="title" placeholder="Enter Title" value="{{old('title')}}">
                @error("title")
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-75">
                <textarea id="summernote" name="content" >
                  @if(old('content'))
                    {{old('content')}}
                  @else
                    Enter content
                  @endif
                </textarea>
                @error("content")
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-75">
                <label for="exampleInputFile">Добавить картинку превью</label>
                <div class="input-group ">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name='preview_image' value="{{old('preview_image')}}">
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
                <div class="input-group ">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name='main_image' value="{{old('main_image')}}" >
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
                    {{ $cat->id == old('category_id') ? 'selected' : '' }}
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
                  <select class="select2" name='tag_ids[]' multiple="multiple" data-placeholder="Select  Tags" style="width: 100%;">
                    @foreach($tags as $tag)
                      <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected':''}} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                  </select>
                @error("tag_ids")
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group  mt-2">
                <input type="submit" value="Сохранить Post" class="btn btn-success">
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