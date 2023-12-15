<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('users.profile');
    }
    public function show($id)
    {  
        $users = User::where('id', $id)->get();
        return view('users.update',[
            'users' => $users,
        ]);
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        //$user = $request->user();  Get the authenticated user

        // Validate the input data
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:6'],
            'birthdate' => ['required', 'date'],
            'email' => [
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id)
            ],
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

        $user->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'email' => $request->email,
            'avatar' => $user_image,
            'front_id' => $front,
            'back_id' => $back,
        ]);
        
        $user->save();
        

        return redirect()->route('profile');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
