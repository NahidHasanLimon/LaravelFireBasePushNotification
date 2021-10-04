<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
  
    public function saveDeviceToken(Request $request)
    {
        // auth()->user()->update(['device_token'=>$request->token]);
        $token = $request->token;
        $user = User::find(1);
        $user->update(['device_token'=>$request->token]);
        return $user;
        return response()->json(['Token stored.']);
        
    }
  
    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $DeviceToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        // $FcmKey = 'FIREBASE FCM KEY';
        $FcmKey = 'AAAAR8V3I0Q:APA91bFnvmJyxbHWpvBPEC2KDrGw3gMuIFM7_U4M7y9vLCA8UgkyKPtsmwYvY15uI2OQzsMhIYNw1AVWmQBTO3xSNUny4XPdyKZsBjnCHBsDH-hzqdKQw2a_yZgLeNSdxHS4Bb-6BI9a';
  
        $data = [
            "registration_ids" => $DeviceToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];

        $RESPONSE = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $FcmKey,
            'Content-Type: application/json',
        ];
    
        // CURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $RESPONSE);

        $output = curl_exec($ch);
        if ($output === FALSE) {
            die('Curl error: ' . curl_error($ch));
        }        
        curl_close($ch);
        dd($output);        
    }
}