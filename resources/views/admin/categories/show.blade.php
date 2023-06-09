@extends ('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6  d-flex align-items-center">
            <h2 class="m-0 mr-3">Просмотр Категории: {{ $category->title }} </h2>
            <a href="{{ route('admin.category.edit',$category->id)}} " class='text-warning'><i class="fas fa-pencil-alt"></i></a> 
            <form action="{{ route('admin.category.delete',$category->id)}}" method = 'post' >
              @csrf
              @method('delete')
              <button type="submit" class="text-danger border-0 bg-transparent"> <i class="far fa-trash-alt ml-3"></i></button>
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.category.index')}}">Категории</a></li>
              <li class="breadcrumb-item active">Просмотр Категории</li>
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
                        <th><a href="{{ route('admin.category.index') }}">В Категории</a></th>
                        <td></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <th>ID</th>
                        <td>{{ $category->id}}</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <th>Название</th>
                        <td>{{ $category->title }}</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <th>Дата создания</th>
                        <td>{{ $category->created_at }}</td>
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