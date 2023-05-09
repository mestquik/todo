<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\todolar;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use function Symfony\Component\String\u;

class RegisterUsersController extends Controller
{
    //
    public function EditUser()
    {



//        $users = User::with('todolarr')->get();
        $users12 = User::with('todolarr')
            ->orderBy('status','asc')
            ->paginate(5);


        $users1 = todolar::get();
        $roles = Role::all();


        return view('Users', compact( 'users1', 'roles','users12'));
    }

    public function createUser()
    {

        $roles = Role::all();


        return view('createUser', compact('roles'));
    }

    public function createUserPost(Request $request)
    {
        $roles = Role::all();
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,

            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('StandartUser');
        $user->syncRoles($request->role);
        event(new Registered($user));


        return redirect()->route('createUser', compact('roles'))->with('success', 'Kullanıcı başarıyla oluşturuldu!');
    }


    public function GotoUpdateUsers($id)
    {
        $users = User::whereId($id)->get()->first();

        $roles = Role::all();
        return view('UpdateUsers', compact('users', 'roles'));
    }

    public function UpdateUser(Request $request, $id)
    {

        $user = User::whereId($id)->first();


        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $request->validate([
                'name' => 'required',
                'username' => 'required|max:45',
                'email' => 'required|email:rfc,dns',

            ]
            , [
                'name.required' => 'İsmi tanımlamak zorunludur',
                'username.required' => 'Kullanıcı adı Boş Geçilemez',
                'email.required' => 'Oncelik tanımlamak zorunludur',


            ]
        );

//
//
        $user->save();
        $user->syncRoles($request->role);

        return redirect()->route('updateUsers', $id)->with('success', 'Kullanıcı başarıyla güncellendi!');
    }


    public function DeleteUser($id)
    {
        $user = User::where('id',$id)->first();


        $user->update([
            'status'=>0,
        ]);

        return redirect()->route('users')->with('success','Kullanıcı başarıyla pasif hale getirildi.');

    }




}
