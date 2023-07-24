<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $userImage = Auth::user()->user_profile;
        return view('admin.editProfile', [
            'user' => $request->user(),
            'userImage'=>$userImage
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $id)
    {
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }
        $request->validate([
            'name'=>'required',
            'username'=>'required|alpha_num',
            'email'=>'required'
        ]);

        $user = User::find($id);
        $user->name= $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
        if($request->hasFile('image')){
            $fileName = $user->username.'.'.$request->file('image')->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('userImage',$fileName,'public');
            $user->user_profile = '/storage/'.$filePath;
            $user->save();
        }

        return redirect('/profile');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
