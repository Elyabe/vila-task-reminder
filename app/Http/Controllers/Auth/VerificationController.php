<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDoctrine\ORM\Facades\EntityManager;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['verify', 'resend']);
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        if (!$request->hasValidSignature()) {
            throw new ApiException('Invalid or Expired URL provided.', 401);
        }

        $user = EntityManager::find('App\User', $request->route('id'));

        if (!$user->hasVerifiedEmail()) {
            $user->setEmailVerifiedAt(new DateTime());
        }

        try {
            EntityManager::persist($user);
            EntityManager::flush();

            event(new Verified($request->user()));

            return response()->json([
                'message' => 'Email verified.',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'message' => 'Email could not be verified.',
        ], 500);
    }

    public function resend(Request $request)
    {
        if ($request->user('api')->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email already verified.',
            ]);
        }

        $request->user('api')->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Notification has been resent',
        ]);
    }
}
