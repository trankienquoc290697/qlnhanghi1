<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\DiaDiem;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
          $diadiem = DiaDiem::all();
        return view('users.index',['users'=>$users,'diadiem'=>$diadiem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Users::all();
          $diadiem = DiaDiem::all();
        return view('users.create',['users'=>$users,'diadiem'=>$diadiem]);
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
                'name' => 'required',
                'email' => 'required|unique:Users,email|min:3|max:100',
                'role' => 'required',
                'address' => 'required|unique:Users,address|min:3|max:500',



            ],
            [
                'name.required'=>'ban chưa nhập tên',
                'name.unique'=>'Tên đã tồn tại',
                'name.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'name.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'email.required'=>'ban chưa nhập email',
                'email.unique'=>'Email đã tồn tại',
                'email.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'email.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'password.required'=>'ban chưa nhập password',
                'password.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'password.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'role.required'=>'ban chưa nhập vai trò',
              
             
                'address.required'=>'ban chưa nhập địa chỉ',
                'address.unique'=>'Địa chỉ đã tồn tại',
                'address.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'address.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $users= new Users;
        $users->name= $request->name;
        $users->email= $request->email;
        $users->password= $request->password;
        $users->role= $request->role;
        $users->sex= $request->sex;
        $users->phone= $request->phone;
        $users->address= $request->address;
        $users-> save();

        return redirect()->route('users.create')->with('thongbao','Thêm thành công');

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
         $users = Users::findOrFail($id);
        return view('users.edit',compact('users'));
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
       $users= Users::FindOrFail($id);
         $this ->validate ($request,
            [
                'name' => 'required',
                'email' => 'required|unique:Users,email|min:3|max:100',
                'role' => 'required',
                'address' => 'required|unique:Users,address|min:3|max:500',



            ],
            [
                'name.required'=>'ban chưa nhập tên',
                'name.unique'=>'Tên đã tồn tại',
                'name.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'name.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'email.required'=>'ban chưa nhập email',
                'email.unique'=>'Email đã tồn tại',
                'email.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'email.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'password.required'=>'ban chưa nhập password',
                'password.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'password.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'role.required'=>'ban chưa nhập vai trò',
              
             
                'address.required'=>'ban chưa nhập địa chỉ',
                'address.unique'=>'Địa chỉ đã tồn tại',
                'address.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'address.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $users=Users::FindOrFail($id);
        $users->name= $request->name;
        $users->email= $request->email;
        $users->password= $request->password;
        $users->role= $request->role;
        $users->sex= $request->sex;
        $users->phone= $request->phone;
        $users->address= $request->address;
        $users-> save();

        return redirect()->route('users.edit',$id)->with('thongbao','sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

 public function blockRole($id)
    {
        $users=Users::findOrFail($id);
        if($users->role == 2)
            return redirect()->route('account.index')->with('thongbaoloi','Không thể thay đổi quyền của Admin!');
        else{
        $users->role = 0;
        $users->save();
        return redirect()->route('account.index')->with('thongbao','Block tài khoản thành công!');}
    }

    public function userRole($id)
    {   
        $users=Users::findOrFail($id);
        if($users->role == 2)
            return redirect()->route('account.index')->with('thongbaoloi','Không thể thay đổi quyền của Admin!');
        else{
        $users->role = 1;
        $users->save();
        return redirect()->route('account.index')->with('thongbao','Quyền của tài khoản đã được phục hồi thành User!');}
    }



    public function destroy($id)
    {
          $users = Users::find($id);
        $users->delete();
        return redirect()->route('users.index')->with('thongbao','Xóa thành công');
    }
}
