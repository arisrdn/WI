<?php

namespace App\Http\Controllers;

use App\Repositories\Konfig\ModuleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    /**
     * @var ModuleInterface
     */
    private $module;

    public function __construct(ModuleInterface $module)
    {

        $this->module = $module;
    }

    public function index()
    {
        return view ('login');
    }
    public function authenticate(Request $request)
    {
        $email=$request->username;
        $password=$request->password;
//        dd($request->username);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
//            dd(Auth::user());
            // Authentication passed...
            $roleId=Auth::user()->jabatan_id ;
            Session(['modules' => $this->module->getModule($roleId)]);
            return redirect()->intended('dashboard');
        }
        elseif(Auth::attempt(['username' => $email, 'password' => $password])) {
            // Authentication passed...
            $roleId=Auth::user()->jabatan_id ;
            Session(['modules' => $this->module->getModule($roleId)]);

//            dd( Session::all());

            return redirect()->intended('/');
        }
        else {
//            dd('3');
            return back()->withErrors(['email atau password salah']);
        }
    }
    public function logout()
    {
        Auth::logout();
        Session()->flush();
        return redirect(route('login'));

    }
}
