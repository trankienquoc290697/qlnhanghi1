<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\NhaNghi;
use App\DiaDiem;
use Illuminate\Support\Facades\Input;
class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phong = Phong::all();
        $nhanghi = NhaNghi::all();
        return view('phong.index',['phong'=>$phong,'nhanghi'=>$nhanghi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phong = Phong::all();
        $nhanghi = NhaNghi::all();
        return view('phong.create',['phong'=>$phong,'nhanghi'=>$nhanghi]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this ->validate ($request,
        [
            'tenphong' => 'required',
            'chieudai' => 'required',
            'chieurong' => 'required',
            'nhanghi_id' => 'required',
            'dongia' =>'required',


        ],
        [
            'trangthai.required'=>'ban chưa nhập trạng thái',
            'trangthai.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
            'trangthai.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

        ]);
       $phong= new Phong;
       $phong->nhanghi_id= $request->nhanghi_id; 
       $phong->tenphong= $request->tenphong;
       $phong->chieudai= $request->chieudai;
       $phong->chieurong= $request->chieurong;
       
       
       if ($request->hasFile('hinhanh')) {
        $this->validate($request, [
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('hinhanh');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $phong->hinhanh = $name;
    }
    $phong->trangthai= $request->trangthai;
    $phong->dongia=$request->dongia;
    $phong-> save();

    return redirect()->route('phong.create')->with('thongbao','Thêm thành công');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $phong = Phong::findOrFail($id);
       $nhanghi = NhaNghi::All();
       $diadiem = DiaDiem::All();
       return view('phong.edit',compact('phong','nhanghi','diadiem'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 

     $phong= Phong::FindOrFail($id);
     $this ->validate ($request,
       [
        'tenphong' => 'required',
        'chieudai' => 'required',
        'chieurong' => 'required',
        'hinhanh' => 'required',
        'nhanghi_id' => 'required',
        'dongia' =>'required',


    ],
    [
        'trangthai.required'=>'ban chưa nhập trạng thái',
        'trangthai.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
        'trangthai.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

    ]);
     $phong= Phong::FindOrFail($id);
     $phong->nhanghi_id= $request->nhanghi_id; 
     $phong->tenphong= $request->tenphong;
     $phong->chieudai= $request->chieudai;
     $phong->chieurong= $request->chieurong;
     
     
     if ($request->hasFile('hinhanh')) {
        $this->validate($request, [
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('hinhanh');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $phong->hinhanh = $name;
    }
    $phong->trangthai= $request->trangthai;
    $phong->dongia=$request->dongia;
    $phong-> save();

    return redirect()->route('phong.edit',$id)->with('thongbao','sửa thành công');


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phong = Phong::find($id);
        $phong->delete();
        return redirect()->route('phong.index')->with('thongbao','Xóa thành công');
    }
}
