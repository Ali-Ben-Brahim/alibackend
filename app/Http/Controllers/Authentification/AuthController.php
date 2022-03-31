<?php

namespace App\Http\Controllers\Authentification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends BaseController{
    public function login(Request $request){
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(!Auth::attempt($attrs)){
            return response([
                'message' => 'Invalid credentials',
            ],403);
        }
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ],200);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ]);



        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $input['remember_token'] =$user->createToken('secret')->plainTextToken;

        $success['token'] =  $user->createToken('secret')->plainTextToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        $success['password'] =  $user->password;
        $success['created_at'] =  $user->created_at->format('d/m/Y');

        return $this->handleResponse($success, 'User successfully registered!');
    }
    public function logout(){
    user()->currentAccessToken()->delete();
    return response([
    'message' =>'You have successfully logged out and the token was successfully deleted',
    ],200);
}

/*
	 * Get authenticated user details
	*/
	public function getAuthenticatedUser(Request $request)
    {
		return $request->user();
	}

    public function index()
    {
        $client = User::all();
        return response([
            'user' => $client
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user){
            return response([
                'message' => 'undefenied user',
            ],404);
        }
        $user->update( $request ->all());



        return response([
            'user' => $user,
        ]);
    }

    public function qrlogin(Request $request,$email)
    {
        $test = User::where('email',$email)->first();
        if(!$test){
            return response([
                    'message' => 'invalid qr'
            ] , 403);
        }
        return response([
            'user' => $test,
        ],200);
    }
    public function updatePassword (Request $request , $id){

        $user =User::find($id);

        $password = $user->password;
        if($user){
            if (Hash::check($request->oldPassword, $password)){

                $user['password'] = Hash::make($request->newPassword);
                $user->save();
                return response([
                    'message'=>'password updated'
                ],200);
            }
        }
        return response([
            'message' => 'incorrect password'
        ],403);

    }

}
