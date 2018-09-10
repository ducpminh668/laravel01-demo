<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
// use App\Message;

class MessageController extends Controller
{
    public function submit(Request $request){
        $messages = [
		    'required' => 'Trường :attribute bắt buộc nhập.',
		    'email'    => 'Trường :attribute phải có định dạng email'
		];
		$validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email'
        ], $messages);
        if ($validator->fails()) {
            return redirect('contact')
                    ->withErrors($validator)
                    ->withInput();
        } else {
        	// Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database

        	return redirect('register')
        			->with('message', 'Đăng ký thành công.');
        }
    }
}
