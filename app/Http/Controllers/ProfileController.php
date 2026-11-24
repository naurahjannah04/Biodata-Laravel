<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __invoke(): View
    {
        return view('profile.show', ['profile' => Profile::current()]);
    }
}
