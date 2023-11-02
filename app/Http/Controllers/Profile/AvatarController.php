<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    //
    /**
     * Update the user's profile information.
     */
    public function update(UpdateAvatarRequest $request)
    {
        dd($request->all());
        // return response()->redirectTo(route('profile.edit'));
        // return back()->with('message', 'Avatar is changed.');
        return redirect(route('profile.edit'));

    }    
}
