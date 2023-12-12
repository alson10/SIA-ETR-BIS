<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $number = $this->generateUniqueUserCode();
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:6'],
            'birthdate' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user_image = '';

        if ($request->hasFile('avatar')) {
            $user_image = $request->getSchemeAndHttpHost() . '/storage/user_image/' . time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/user_image/'), $user_image);
        }
        $front = '';

        if ($request->hasFile('front_id')) {
            $front = $request->getSchemeAndHttpHost() . '/storage/valid_id/' . time() . '.' . $request->front_id->extension();
            $request->front_id->move(public_path('storage/valid_id/'), $front);
        }

        $back = '';

        if ($request->hasFile('back_id')) {
            $back = $request->getSchemeAndHttpHost() . '/storage/valid_id/' . time() . '.' . $request->back_id->extension();
            $request->back_id->move(public_path('storage/valid_id/'), $back);
        }
        if ($this->userCodeExists($number)) {
            $number = mt_rand(1000000000, 999999999);
        }

        // $path = substr($request->file('file')->storePublicly('public/users_avatar'), 20);
        $user = User::create([
            'name' => $request->firstname . " " . $request->lastname,
            'user_code' => $number,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename == null ? "" : $request->middlename,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'email' => $request->email,
            'avatar' => $user_image,
            'front_id' => $front,
            'back_id' => $back,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if (Auth::user()->type == 0) {
            return redirect('/');
        } else {
            return redirect()->route('/admin');
        }
    }

    public function userCodeExists($number)
    {
        return User::whereUserCode($number)->exists();
    }

    public function generateUniqueUserCode(): int
    {
        do {
            $number = mt_rand(1000000000, 999999999);
        } while ($this->userCodeExists($number));

        return $number;
    }
}
