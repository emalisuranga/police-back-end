<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {
       //register Officer

        // insert to DB
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        try{
            $user = User::create($input);
            $accessToken = $user->createToken('ApplicationName')->accessToken;
            $response = [
                'success' => true,
                'message' => 'User registration successful',
                'accessToken' => $accessToken,
            ];
            return response()->json($response, 200);


        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode){
                $response = [
                    'success' => false,
                    'message' => 'Duplicate entry email',
                ];
                return response()->json($response, 404);
            }
        }
    }

                
// return response

    /**
     * User Login
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'rank' => $request->rank])) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            $user = Auth::user();
            // return response
            $response = [
                'success' => true,
                'message' => 'User login successful',
                'token' => $token,
                'user_data' => $user
            ];
            return response()->json($response, 200);
        } else {
            // return response
            $response = [
                'success' => false,
                'message' => 'Unauthorised 11',
            ];
            return response()->json($response, 404);
        }
    }

    //get 
    public function getOfficer(){
        $user = DB::table('users')
            ->where('rank','=', 'OFFICER')
            ->get(['id','first_name','last_name']);

            $response = [
                'success' => true,
                'message' => 'successful',
                'user_data' => $user
            ];
            return response()->json($response, 200);
    }
}
