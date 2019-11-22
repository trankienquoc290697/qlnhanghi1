@extends('layout1.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>{{$phong->tenphong}}</small>
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


            <form id="needs-validation" novalidate action="{{ route('phong.update',$phong->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                @method('put')
                <div class="form-group">
                    <div class="form-group">
                        <label>Nhà nghỉ ID</label>
                        <select name="nhanghi_id" class="form-control" required>
                            @foreach($nhanghi as $nn)
                            <option value="{{$nn->id}}">{{$nn->id}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên phòng</label>
                        <select class="form-control" name='tenphong'>
                           <option selected>Phòng đơn</option>
                           <option>Phòng đôi</option>
                           <option>Phòng 3 người</option>
                           <option>Phòng 4 người</option>
                       </select>
                   </div>

                   <div class="form-group">
                    <label>Chiều dài</label>
                    <input class="form-control" name="chieudai" />
                </div>

                <div>
                    <label>Chiều rộng</label>
                    <input class="form-control" name="chieurong" />
                </div>

                <div class="form-group"><br>
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" id="exampleInputFile">
                    <p class="help-block">Chọn ảnh sản phẩm</p>
                </div>
                <div class="form-group"><br>
                    <label>Trạng thái</label>
                    <select class="form-control" name='trangthai'>
                       <option selected>Phòng trống</option>
                       <option>Đã thành toán</option>
                       <option>Phòng đầy</option>  
                   </select>
               </div>
               <div class="form-group"><br>
                <label>Đơn giá</label>
                <input class="form-control" name="dongia">
            </div>

            

            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
        </div>

        <form>

        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


@endsection