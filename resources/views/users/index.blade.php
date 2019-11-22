@extends('layout1.index')
@section('content')


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users
                    <small>Danh sách</small>
                    <form action="{{ route('users.create') }}" method="GET" style="">
                        @csrf
                        <button class="btn btn-success">Thêm Users</button>
                    </form>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Giới tính</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $u -> id }}</td>
                        <td>{{ $u -> name }}</td>
                        <td>{{ $u -> email }}</td>
                        <td>{{ $u -> password }}</td>
                        <td> <div class="d-none d-lg-block">
                            @if($u->role == 0)
                            {{"Block"}}
                            @elseif($u->role == 1)
                            {{"User"}}
                            @else
                            {{"Admin"}}
                            @endif
                        </div></td>
                        <td><div class="d-none d-lg-block">
                            @if($u->sex == 1)
                            {{"Nữ"}}
                            @else
                            {{"Nam"}}
                            @endif
                        </div></td>
                        <td>{{ $u -> phone }}</td>
                        <td>{{ $u -> address }}</td>
                        
                         <td class="center">
                            <form action="{{ route('users.destroy',$u->id) }}" method="POST">
                            @csrf
                            @method('delete') 
                             <button class="btn-fab btn-fab-sm btn-danger shadow text-white icon-trash">Xóa</button>       
                            </form>&nbsp;
                        </td>

                         <td class="center">
                            <form action="{{ route('users.edit',$u->id) }}" method="GET">
                            @csrf
                            <button class="btn-fab btn-fab-sm btn-primary shadow text-white icon-pencil">Sửa</button> 
                            </form>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection