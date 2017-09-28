<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasPermissionTo('manage-assigned-users')) {
            $users = User::all();
            $roles = Role::all()->reverse();
        } elseif ($user->hasPermissionTo('manage-users')) {
            // get non-administrative users associated with the users outlet
            $users = $user->outlets()->get()->flatMap(function ($outlet) {
                return $outlet->users()->get();
            })->reject(function ($user) {
                return $user->hasRole('admin');
            });
            $roles = Role::all()->reverse()->reject(function ($role) use ($user) {
                return $role->id <= Role::findByName($user->getRoleNames()->first())->id;
            });
        } else {
            // not allowed
        }

        return view('admin.users.index')
            ->with('users', $users)
            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'is_active' => 'integer',
        ]);

        $role = Role::findOrFail($request->input('role'));

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt(str_random(32)),
            'is_active' => 1,
        ])->syncRoles($role);

        $this->sendResetLinkEmail($request);
        $request->session()->flash('status', 'User added successfully!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_active' => 'integer',
        ]);

        $role = Role::findOrFail($request->input('role'));
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'is_active' => $request->input('is_active')
        ]);
        $user->syncRoles($role);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return [
            'action' => route('admin.users.index')
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function outlets(Request $request, User $user)
    {
        $ids = collect($request->input('outlets'))->map(function ($outlet) {
            return $outlet['id'];
        });
        $user->outlets()->sync($ids);
    }
}
