@extends('layout1.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tiện nghi
                            <small>{{$tiennghi ->tentiennghi}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                       @if(count($errors)>0)
                        <div class=" alert alert-danger">
                            @foreach ($errors->all() as $err)
                            {{$err}}<br>
                             @endforeach

                        </div>
                            @endif

                            @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                        </div>
                        @endif


                        
                    <form action="{{ route('tiennghi.update',$tiennghi->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            @method('put')
                           <div class="form-group">
                                <label>Phòng ID</label>
                                 <select name="maphong_id" class="form-control" required>
                                @foreach($phong as $p)
                                <option value="{{$p->id}}">{{$p->id}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group">
                                <label>Tên Tiện nghi</label>
                                <input class="form-control" name="tentiennghi" placeholder="Nhập tên tiện nghi" />
                            </div>
                            
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


@endsection