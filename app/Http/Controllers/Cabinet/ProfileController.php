<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Просмотр профиля
     */
    public function show()
    {
//        Auth::guard();
        $this->middleware('auth');
//        return 'profile show';
        /*if(!Auth::user() || !Auth::user()->profile)
        {
            return 'profile show';
        }*/
        return view('layouts.secondary', [
            'page' => 'auth.profile',
            'title' => 'Ваш профиль',
            'user' => Auth::user(),
            'profile' => Auth::user()->profile
        ]);
    }

    /**
     *  Редактирование профиля
    */
    public function edit()
    {
        $this->middleware('auth');
//        return $user = Auth::user();
        return view('auth.profile_edit', [
            'title' => 'Редактирование профиля',
            'user' => Auth::user(),
            'profile' => Auth::user()->profile
        ]);
    }

    /**
     *  Запись изменений в профиль
     * @var Request $request
     */
    public function update(Request $request)
    {
        $profile = Auth::user()->profile;
        $profile->fullname = $request->input('fullname');
        $profile->phone = $request->input('phone');
        $profile->birthdate = $request->input('birthdate');
        return $profile;
        if($request->action == 'apply') {
            return redirect()->route('profile.edit', [
                'role' => $role->slug,
            ]);
        }
        return redirect()->route('profile.show', [
            'role' => $role->slug,
        ]);
    }
}
