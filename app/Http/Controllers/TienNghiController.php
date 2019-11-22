<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TienNghi;
use App\Phong;

use Illuminate\Support\Facades\Auth;

class TienNghiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiennghi = TienNghi::all();
        $phong = Phong::all();
        return view('tiennghi.index',['tiennghi'=>$tiennghi,'phong'=>$phong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiennghi = TienNghi::all();
        $phong = Phong::all();
        return view('tiennghi.create',['tiennghi'=>$tiennghi,'phong'=>$phong]);
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
                'tentiennghi' => 'required',
                'maphong_id' => 'required',
                    ],
            [
                'tentiennghi.required'=>'ban chưa nhập tên tiện nghi',
                'tentiennghi.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'tentiennghi.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

            ]);
        $tiennghi= new TienNghi;
        $tiennghi->maphong_id= $request->maphong_id;
        $tiennghi->tentiennghi= $request->tentiennghi;
        $tiennghi-> save();

        return redirect()->route('tiennghi.create')->with('thongbao','Thêm thành công');


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
       $tiennghi= TienNghi::findOrFail($id);
        $phong = Phong::All();
        return view('tiennghi.edit',compact('tiennghi','phong'));
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
          $tiennghi= TienNghi::findOrFail($id);
        $this ->validate ($request,
         [
                'tentiennghi' => 'required',
                'maphong_id' => 'required',
                    ],
            [
                'tentiennghi.required'=>'ban chưa nhập tên tiện nghi',
                'tentiennghi.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'tentiennghi.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

            ]);
        $tiennghi= TienNghi::FindOrFail($id);
        $tiennghi->maphong_id= $request->maphong_id;
        $tiennghi->tentiennghi= $request->tentiennghi;
        $tiennghi-> save();

        return redirect()->route('tiennghi.edit',$id)->with('thongbao','sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiennghi = TienNghi::find($id);
        $tiennghi->delete();
        return redirect()->route('tiennghi.index')->with('thongbao','Xóa thành công');
    }
}
