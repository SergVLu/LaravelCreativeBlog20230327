@extends ('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование Пользователя</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main')}}">Home</a></li>
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
            <form action="{{ route('admin.user.update', $user->id)}}" class="w-25" method="post">
              @csrf
              @method('put')
              <div class="form-group">
                <label for="email">Изменить почту</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email of user" value="{{$user->email}}">
                @error("email")
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name">Изменить Имя</label>
                <input type="text" class="form-control" name="name" placeholder="Пользователь" value="{{$user->name}}">
                @error("name")
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-75">
                <label>Выберите роль</label>
                <select class="form-control" name='role'>
                  @foreach($roles as $id => $role)
                    <option value="{{ $id }}" 
                    {{ $id == $user->role ? 'selected' : '' }}
                    >{{ $role }}</option>
                  @endforeach
                </select>
                @error("role")
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <input type="hidden" name="user_id" value="{{$user->id}}" >
              </div>
              <input type="submit" value="Изменить пользователя" class="btn btn-success">
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