<?php
namespace Sparkout\SparkoutLogin\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Sparkout\SparkoutLogin\Models\User;

class LoginController extends Controller {


    public function test() {
        # code...
        echo "LoginController test";
        return response()->json(User::all());
    }

    /**
     * @param Request $request
     *
     * @return Json
     */
    public function createAccount(Request $request) {
        # code...
        $validator = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = User::create($request->all());
        return response()->json(['status' => true, 'user' => $user, 'message' => 'User account created successfully']);
    }

    public function makeLogin(Request $request) {
        $validator = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            return response()->json(['status' => true, 'user' => $user, 'message' => 'User logged in successfully']);
        } else {
            return response()->json(['status' => true, 'user' => $user, 'message' => 'Invalid credentials']);
        }
    }

    public function getAllUsers(Request $request) {
        # code...
        $users = User::all();
        return response()->json(['status' => true, 'users' => $users]);
    }
}
