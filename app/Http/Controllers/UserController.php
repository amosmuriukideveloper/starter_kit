<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=  User::with('roles')->get();
        return view('auth.users.index', ['users' => $users]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all()->pluck('name');
        return view('auth.users.create',['roles' => $roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required',
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
       return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $userRoles = $user->getRoleNames();
        $roles = Role::all()->pluck('name');
        return view('auth.users.edit', ['user' => $user, 'userRoles' => $userRoles, 'roles' => $roles]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);
 
 
        $input = $request->all();
        
 
        $user = User::find($id);
        if (!empty($input['password'])) {
            $input['password']= Hash::make($request->password);
        }
        else {
            $input=Arr::except($input, ['password']);
        }
        // $request->whenFilled('password', function ($value) {
        //     $input['password']= Hash::make($request->password);
        // }, function () {
        //     $input=Arr::except($input, ['password']);
        // });
        
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));
        
        return redirect('users')-> with('success', 'You have successfuly updated the user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
