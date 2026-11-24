<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('admin.profile-edit', ['profile' => Profile::current()]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $profile = Profile::current();
        $profile->fill($request->validated());
        $profile->save();

        return to_route('admin.profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }
}
