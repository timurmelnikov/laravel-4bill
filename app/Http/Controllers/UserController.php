<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // FIXME Закрыть  при помощи политики
    /**
     * Delete user
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }

    // FIXME Закрыть  при помощи политики
    /**
     * Restore user
     *
     * @param int $id
     * @return void
     */
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->back();
    }
}
