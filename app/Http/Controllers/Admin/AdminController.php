<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Admin After login
     */
    public function admin()
    {
        return view('admin.home');
    }


    /**
     * Admin Custome Logout Method
     */

    public function logout()
    {
        Auth::logout();

        $notification = array('message' => 'You are logged out !', 'alert-type' => 'info');

        return redirect()->route('admin.login')->with($notification);
    }
}
