<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    var $guard = 'admin';
    /**
     * Display a listing of the resource.
     */
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if(Auth::guard($this->guard)->attempt($credentials)){
            return view('admin.welcome');
        }else{
            return to_route('admin.login-page-admin')->with('failure','Your credentials does not match our records');
        }
    }

    public function welcome()
    {
        return view('admin.welcome');
    }

    public function logout()
    {
        Auth::guard($this->guard)->logout();
        return to_route('admin.login-page-admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
