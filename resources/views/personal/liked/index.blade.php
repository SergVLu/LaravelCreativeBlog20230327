@extends ('personal.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Понравившиеся посты</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="/">Home</a></li>-->
              <li class="breadcrumb-item active">Понравившиеся посты</li>
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
        <div class="row">
          <div class="col-10">
            <div class="card">
            <!-- /.card-header -->
              <div class="card-body table-responsive p-0">  
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th colspan='2' class='text-center'>Действие</th>
                        <th>Заголовок</th>
                        <th>Содержание</th>
                        <th>Создан</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($posts as $post)
                      <tr>
                        <td><?=$post['id']?></td>
                        <td>
                          <a href="{{ route('admin.post.show',$post->id)}}"><i class="far fa-eye fa-lg"></i></a> 
                        </td> 
                        
                        <td>
                          <form action="{{ route('personal.liked.delete',$post->id)}}" method = 'post' >
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-danger border-0 bg-transparent"><i class="far fa-trash-alt"></i></button>
                          </form>
                        </td> 
                        <td>{{ substr($post->title, 0, 10) }}</td>
                        <td>{{ substr($post->content, 0, 15) }} >>></td>
                        <td>{{ $post->created_at }}</td>
                      </tr>
                      @endforeach 
                    </tbody>
                  </table>
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