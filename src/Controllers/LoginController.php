<?php
namespace Sparkout\SparkoutLogin\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Sparkout\SparkoutLogin\Models\User;
use Sparkout\SparkoutLogin\Helpers\Helper;

class LoginController extends Controller {

    /**
     * @param Request $request
     *
     * @return Json
     */
    public function createAccount(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $request->password = Helper::encrypt($request->password);
        $user = User::create($request->all());
        return response()->json(['status' => true, 'user' => $user, 'message' => 'User account created successfully']);
    }

    public function makeLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->where('password', Helper::encrypt($request->password))->first();
        if ($user) {
            return response()->json(['status' => true, 'user' => $user, 'message' => 'User logged in successfully']);
        } else {
            return response()->json(['status' => true, 'user' => $user, 'message' => 'Invalid credentials']);
        }
    }

    public function getAllUsers(Request $request) {
        $users = User::all();
        return response()->json(['status' => true, 'users' => $users]);
    }
}
