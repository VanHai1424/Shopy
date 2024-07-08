<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List User';
        $users = User::where('role', 1)->get();
        return view('admins.user.list', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add User';
        return view('admins.user.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required'
        ], [
            'name.required' => 'Name là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Password là bắt buộc',
            'phone.required' => 'Phone là bắt buộc',
            'phone.regex' => 'Phone sai định dạng',
            'phone.min' => 'Phone phải có tối thiểu :min số',
            'address.required' => 'Address là bắt buộc'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address,
            'gender' => $req->gender,
            'role' => $req->role,
            'password' => Hash::make($req->password)
        ]);

        return redirect()->route('user.index')->with([
            'msg' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Update User';
        $user = User::find($id);
        return view('admins.user.update', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $user = User::find($id);

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required'
        ], [
            'name.required' => 'Name là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Password là bắt buộc',
            'phone.regex' => 'Phone sai định dạng',
            'phone.min' => 'Phone phải có tối thiểu :min số',
            'address.required' => 'Address là bắt buộc'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password ? Hash::make($req->password) : $user->password,
            'phone' => $req->phone,
            'address' => $req->address,
            'gender' => $req->gender,
            'role' => $req->role
        ]);

        return redirect()->route('user.index')->with([
            'msg' => 'Cập nhật thành công',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with([
            'msg' => 'Xóa thành công',
            'alert-type' => 'success'
        ]);
    }
}
