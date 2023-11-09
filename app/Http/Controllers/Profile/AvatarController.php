<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    //
    /**
     * Update the user's profile information.
     */
    public function update(UpdateAvatarRequest $request)
    {
        // dd($request->all());
        // return response()->redirectTo(route('profile.edit'));
        // return back()->with('message', 'Avatar is changed.');

        // store avatar image file
        // $path = $request->file('avatar')->store('avatars', 'public');
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

        // delete oldAvatar image file
        if($oldAvatar = $request->user()->avatar)
        {
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar' => $path]);

        return redirect(route('profile.edit'))->with('message', 'Avatar is updated.');

    }    
}
