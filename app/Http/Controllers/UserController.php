<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(5);
        return view('users/index', compact('users'));
    }


    public function show(User $user): View
    {
        return view('users/show', compact('user'));
    }

    public function create()
    {
        return view('users/form');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $request->validated();

        $request->merge([
            'password' => Hash::make($request->all()['password']),
        ]);

        User::create($request->post());
        return redirect()->route('users.index');
    }

    public function edit(User $user): View
    {
        return view('users/form', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $request->validated();

        $user->update($request->only(['name','email']));
        return redirect()->route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function trash(): View
    {
        $users = User::onlyTrashed()->paginate(5);
        return view('users/trash', compact('users'));
    }

    public function forceDelete(int $userId): RedirectResponse
    {
        User::onlyTrashed()->where('id', $userId)->forceDelete();
        return redirect()->route('users.trash');
    }

    public function restore(int $userId): RedirectResponse
    {
        User::onlyTrashed()->where('id', $userId)->restore();
        return redirect()->route('users.trash');
    }
}
