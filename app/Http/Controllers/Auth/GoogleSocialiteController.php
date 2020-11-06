<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Laravel\Socialite\One\MissingVerifierException;

class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return Application|RedirectResponse|Redirector|void
     */
    public function handleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                $customer = Customer::whereUserId($finduser->id)->first();
                session(['customer_id' => $customer->id]);
                return $finduser->hasRole('Admin') ? redirect('/dashboard') : redirect('/homepage');

            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'avatar' => $user->getAvatar(),
                    'social_id' => $user->getId(),
                    'social_type' => 'google',
                    'password' => Hash::make('my-google')
                ]);
                $newUser->assignRole('Customer');
                $newCustomer = Customer::create([
                    'nama' => $user->getName(),
                    'no_hp' => '-',
                    'user_id' => $newUser->id
                ]);
                session(['customer_id' => $newCustomer->id]);
                $newUser->markEmailAsVerified();
                Auth::login($newUser);
                return $newUser->hasRole('Customer') ? redirect('/homepage') : redirect('/dashboard');
            }

        } catch (Exception $e) {
            return response('Terjadi kesalahan saat mengkoneksikan ke Socialite. Silahkan ulangi lagi.' . $e->getMessage());
        }
    }
}
