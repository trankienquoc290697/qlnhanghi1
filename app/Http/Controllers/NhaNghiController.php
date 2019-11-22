<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaNghi;
use App\DiaDiem;
use App\Users;
use Illuminate\Support\Facades\Auth;
class NhaNghiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanghi = NhaNghi::all();
        $diadiem = DiaDiem::all();
          return view('nhanghi.index',['nhanghi'=>$nhanghi,'diadiem'=>$diadiem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $nhanghi = NhaNghi::all();
        $diadiem = DiaDiem::all();
    

        return view('nhanghi.create',['nhanghi'=>$nhanghi,'diadiem'=>$diadiem]);
        
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
                'tennhanghi' => 'required|unique:NhaNghi,tennhanghi|min:3|max:100',
                'diachi' => 'required|unique:NhaNghi,diachi|min:3|max:100',
                'sophong' => 'required',
                'ghichu' => 'required',
                'diadiem_id' => 'required',
           


            ],
            [
                'tennhanghi.required'=>'ban chưa nhập tên nhà nghỉ',
                'tennhanghi.unique'=>'Tên nhà nghỉ đã tồn tại',
                'tennhanghi.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'tennhanghi.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'diachi.required'=>'ban chưa nhập địa chỉ',
                'diachi.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'diachi.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',


                'ghichu.required'=>'ban chưa nhập ghi chú',
                'ghichu.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'ghichu.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $nhanghi= new NhaNghi;
     
        $nhanghi->tennhanghi= $request->tennhanghi;
        $nhanghi->diachi= $request->diachi;
        $nhanghi->sophong= $request->sophong;
        $nhanghi->giomocua= $request->giomocua;
        $nhanghi->ghichu= $request->ghichu;
        $nhanghi->diadiem_id= $request->diadiem_id;
       
        $nhanghi-> save();
        return redirect()->route('nhanghi.create')->with('thongbao','Thêm thành công');
    
        
    
           
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
         $nhanghi = NhaNghi::findOrFail($id);
           $diadiem = DiaDiem::All();
        return view('nhanghi.edit',compact('nhanghi','diadiem'));
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
        $nhanghi= NhaNghi::findOrFail($id);
        $this ->validate ($request,
           [
                'tennhanghi' => 'required|unique:NhaNghi,tennhanghi|min:3|max:100',
                'diachi' => 'required|unique:NhaNghi,diachi|min:3|max:100',
                'sophong' => 'required',
                'ghichu' => 'required',
                'diadiem_id' => 'required',
           


            ],
            [
                'tennhanghi.required'=>'ban chưa nhập tên nhà nghỉ',
                'tennhanghi.unique'=>'Tên nhà nghỉ đã tồn tại',
                'tennhanghi.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'tennhanghi.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'diachi.required'=>'ban chưa nhập địa chỉ',
                'diachi.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'diachi.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',


                'ghichu.required'=>'ban chưa nhập ghi chú',
                'ghichu.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'ghichu.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $nhanghi= NhaNghi::FindOrFail($id);
     
        $nhanghi->tennhanghi= $request->tennhanghi;
        $nhanghi->diachi= $request->diachi;
        $nhanghi->sophong= $request->sophong;
        $nhanghi->giomocua= $request->giomocua;
        $nhanghi->ghichu= $request->ghichu;
        $nhanghi->diadiem_id= $request->diadiem_id;
       
        $nhanghi-> save();
        return redirect()->route('nhanghi.edit',$id)->with('thongbao','sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanghi = NhaNghi::find($id);
        $nhanghi->delete();
        return redirect()->route('nhanghi.index')->with('thongbao','Xóa thành công');
    }
}
