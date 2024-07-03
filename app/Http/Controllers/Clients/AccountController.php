<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function info() {
        $title = 'Thông tin người dùng';
        return view('clients.personal', compact('title'));
    }

    public function updateInfo(Request $req) {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. Auth::user()->id,
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => 'required'
        ], [
            'name.required' => 'Name là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email sai định dạng',
            'email.unique' => 'Email đã tồn tại', 
            'address.required' => 'Address là bắt buộc',
            'phone.required' => 'Phone là bắt buộc',
            'phone.regex' => 'Phone sai định dạng',
            'phone.min' => 'Phone phải có tối thiểu :min số',
            'gender.required' => 'Gender là bắt buộc'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'msg' => 'Cập nhật không thành công',
                'alert-type' => 'danger'
            ]);
        } else {
            $user = User::find(Auth::user()->id);
            $user->update([
                'name' => $req->name,
                'email' => $req->email,
                'address' => $req->address,
                'phone' => $req->phone,
                'gender' => $req->gender
            ]);
            return redirect()->back()->with([
                'msg' => 'Cập nhật thành công',
                'alert-type' => 'success'
            ]);
        }

    }

    public function historyOrder(Request $req) {
        $title = 'Lịch sử mua hàng';
        $user = User::findOrFail(Auth::user()->id);
        $orders = $user->orders()->with(['orderDetail.variant'])->orderBy('created_at', 'desc')->limit(3)->get();
        return view('clients.list-order', compact('title', 'orders'));
    }

    public function changePass() {
        $title = 'Đổi mật khẩu';
        return view('clients.password', compact('title'));
    }

    public function handleChangePass(Request $req) {
        $validator = Validator::make($req->all(), [
            'currentPass' => 'required',
            'newPass' => 'required|confirmed'
        ], [
            'currentPass.required' => 'Current pass là bắt buộc',
            'newPass.required' => 'New pass là bắt buộc',
            'newPass.confirmed' => 'Mật khẩu mới và xác nhận mật khẩu không khớp'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with([
                'msg' => 'Cập nhật không thành công',
                'alert-type' => 'danger'
            ]);
        }

        if(!Hash::check($req->currentPass, Auth::user()->password)) {
            return redirect()->back()->withErrors(['currentPass' => 'Mật khẩu hiện tại không đúng'])->with([
                'msg' => 'Cập nhật không thành công',
                'alert-type' => 'danger'
            ]);
        }

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($req->newPass);
        $user->save();
        return redirect()->back()->with([
            'msg' => 'Cập nhật thành công',
            'alert-type' => 'success'
        ]);
    }
    
}
