<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Message;

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
          $message = new Message;
          $message->name = $request->input('name');
          $message->email = $request->input('email');
          $message->message = $request->input('message');

          $message->save();

        	return redirect('/')
        			->with('success', 'Đăng ký thành công.');
        }
    }

    public function getMessages()
    {
      $messages = Message::all();
      return view('messages')->with('messages', $messages);
    }
}
