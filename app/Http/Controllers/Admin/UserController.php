<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $roles;

    public function __construct(){
        $this->roles = Role::get();
    }
    public function index(Request $request)
    {
        $users = User::with('roles' )->orderBy('id','DESC')->get();
        //dd($users);
        return view('admin.users.index', [ 'users' => $users ]);
    }

    public function create()
    {
        return view('admin.users.create',['roles' => $this->roles ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'password' => 'required|max:32|min:8|confirmed',
            'email' => 'required|max:50',
            'address' => 'nullable|max:100',
            'phone' => 'nullable|max:50',
            'image' => 'nullable|mimes:jpeg,jpg,png,bmp,svg,gif',
            'roles' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/user';
            $photo_name = $destination.'/'.md5(time()).'.'.$extension;
            $photo->move($destination,$photo_name);
            $user->image = $photo_name;
        }
        //dd($user);
        $user->save();
        $user->roles()->attach($request->input('roles'));
        return redirect()->route('admin.users.index')->with('success','New Admin Created Successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',['user' => $user,'roles'=>$this->roles]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'nullable|max:100',
            'password' => 'nullable|max:32|min:8|confirmed',
            'email' => 'nullable|max:50',
            'address' => 'nullable|max:100',
            'phone' => 'nullable|max:50',
            'image' => 'nullable|mimes:jpeg,jpg,png,bmp,svg,gif',
            'roles' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/user';
            $photo_name = $destination.'/'.md5(time()).'.'.$extension;
            if(isset($user->image) && app('files')->exists($user->image)){
                app('files')->delete($user->image);
            }
            $photo->move($destination,$photo_name);
            $user->image = $photo_name;
        }
        $user->save();
        $user->roles()->sync($request->input('roles'));
        return redirect()->route('admin.users.index')->withSuccess('Admin Updated Successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->roles()->detach();
        if(isset($user->image) && app('files')->exists($user->image)){
            app('files')->delete($user->image);
        }
        if ($user->delete()) {
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
        }

    }
}
