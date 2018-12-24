<?php

namespace busplannersystem\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }
}
