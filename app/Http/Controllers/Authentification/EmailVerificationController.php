<?php
namespace App\Http\Controllers\API\Authentification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends BaseController
{

    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already Verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'verification-link-sent'];
    }

    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Email already verified'
            ];
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return [
            'message'=>'Email has been verified'
        ];
    }
}
