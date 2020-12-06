<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\Abilities;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Delete user
     *
     * @param int $id
     * @return void
     */
    public function block($id)
    {
        $this->authorize(Abilities::DELETE, User::class);

        $user = User::findOrFail($id);
        $user->blocked_at = Carbon::now();
        $user->save();

        return redirect()->back();
    }

    /**
     * Restore user
     *
     * @param int $id
     * @return void
     */
    public function unblock($id)
    {
        $this->authorize(Abilities::RESTORE, User::class);

        $user = User::findOrFail($id);
        $user->blocked_at = null;
        $user->save();

        return redirect()->back();
    }
}
