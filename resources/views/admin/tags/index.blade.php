@extends ('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0">Теги</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item active">Теги</li>
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
          <div class="col-1 mb-2">
            <a href="{{ route('admin.tag.create') }}" class="btn btn-primary mb-2">Добавить</a>
              <!-- /.card-body -->
          </div>
        </div>
        <div class="row ">
          <div class="col-10">
            <div class="card">
            <!-- /.card-header -->
              <div class="card-body table-responsive p-0">  
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date-create</th>
                        <th colspan='3' class='text-center'>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tags as $tag)
                      <tr>
                        <td><?=$tag['id']?></td>
                        <td>{{ $tag->title }}</td>
                        <td>{{ $tag->created_at }}</td>
                        <td>
                          <a href="{{ route('admin.tag.show',$tag->id)}}"><i class="far fa-eye fa-lg"></i></a> 
                        </td> 
                        <td>
                          <a href="{{ route('admin.tag.edit',$tag->id)}}" class='text-warning'><i class="fas fa-pencil-alt"></i></a> 
                        </td> 
                        <td>
                          <form action="{{ route('admin.tag.delete',$tag->id)}}" method = 'post' >
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-danger border-0 bg-transparent"><i class="far fa-trash-alt"></i></button>
                          </form>
                        </td> 
                      </tr>
                      @endforeach 
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