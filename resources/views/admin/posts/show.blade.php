@extends ('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6  d-flex align-items-center">
            <h2 class="m-0 mr-3">Пост: {{ $post->title }} </h2>
            <a href="{{ route('admin.post.edit',$post->id)}} " class='text-warning'><i class="fas fa-pencil-alt"></i></a> 
            <form action="{{ route('admin.post.delete',$post->id)}}" method = 'post' >
              @csrf
              @method('delete')
              <button type="submit" class="text-danger border-0 bg-transparent"> <i class="far fa-trash-alt ml-3"></i></button>
            </form>
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
        <div class="row ">
          <div class="col-6">
            <div class="card">
            <!-- /.card-header -->
              <div class="card-body table-responsive p-0">  
                  <table class="table table-hover text-nowrap">
                    <tbody>
                      <tr>
                        <th><a href="{{ route('admin.post.index') }}">В Посты</a></th>
                        <td></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <th>ID</th>
                        <td>{{ $post->id}}</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <th>Название</th>
                        <td>{{ $post->title }}</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <th>Содержание</th>
                        <td>{{ $post->content }}</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <th>Дата создания</th>
                        <td>{{ $post->created_at }}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>          
          </div>
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