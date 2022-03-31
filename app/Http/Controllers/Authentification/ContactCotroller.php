<?php

namespace App\Http\Controllers\Authentification;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;


class ContactCotroller extends Controller
{

    public function send(Request $request){

        $user = User::where('email' , $request->email)->first();
        if($user){
            $mail_message = ' votre nouveu mot de passe est ';
            $pass = Str::random(5);
            $mail_message .= $pass ;
            $mail_data =[
                'recipient'=> 'benbrahimali23@gmail.com',
                'fromEmail' =>$user->email ,
                'fromName' => $user->name,
                'subject' => 'nouveau mot de passe',
                'body' => $mail_message,
            ];
            Mail::send('email-template' ,$mail_data , function($message) use ($mail_data){
                $message->from($mail_data['fromEmail'], $mail_data['fromName'] );
                $message->to($mail_data['recipient'], 'ReSchool')
                ->subject($mail_data['subject']);
            });
            $user['password'] = Hash::make($pass);
            $user->save();
            return response([$user],200);
        }

        return response([],404);

    }


}
