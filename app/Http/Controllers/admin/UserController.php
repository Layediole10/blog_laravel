<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $users = User::orderBy('last_name', 'asc')->paginate(5);
        return view('admin.user.userList', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //registration form
        
        return view('admin.user.userForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',

        ]);

        $validated['password'] = Hash::make(request('password'));
        $validated['activate'] = $request->activate?true:false;
        $validated['role'] = $request->role?'admin':'user';
        $validated['date_of_birth'] = $request->dateOfBirth;

        if ($request->file('photo')) {
            
            $file = $request->file('photo');
            $fileName = 'user-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('imgUser', $fileName, 'public');
            $validated['photo'] = $path;
        }
    //    dd($validated);

        $userRegister = User::create($validated);

        if ($userRegister) {
            return  redirect()->route('login')->with(["alertSuccess"=>"registration completed successfully, you can login!"]);
        
         }else{
             return back()->with("errorRegister","registration failed")->withInput();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userShow = User::findOrFail($id);
        return view('admin.user.showUser', ['userShow'=>$userShow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userEdit = User::findOrFail($id);
        return view('admin.user.editUser', ['userEdit'=>$userEdit]);
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

        $userUpdate = User::findOrFail($id);
        $updated = $request->validate([
            
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',

        ]);

        $updated['password'] = Hash::make(request('password'));
        $updated['activate'] = $request->activate?true:false;
        $updated['role'] = $request->role?'admin':'user';
        $updated['date_of_birth'] = $request->dateOfBirth;

        if ($request->file('photo')) {
            
            $file = $request->file('photo');
            $fileName = 'user-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('imgUser', $fileName, 'public');
            $updated['photo'] = $path;
        }
    //    dd($updated);
        
        $userUpdate->update($updated);

        if ($userUpdate) {
            return  redirect()->route('users.index')->with('alertUpdate','The user number '. $userUpdate->id. ' updated successfully!');
        
         }else{
             return back()->with("errorRegister","registration failed")->withInput();
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $userDelete = User::findOrFail($id);
       $userDelete->delete();
       return back()->with('alertDelete', 'The user '.$userDelete->first_name.' '.$userDelete->first_name.' deleted successfully!');
    }

    public function search()
    {
        $input = request('q');
        $userSearch = User::where('first_name', 'like', "%$input%")->orwhere('last_name', 'like', "%$input%")->paginate(5);
        return view('admin.user.searchUser', ['userSearch'=>$userSearch]);
    }

    public function activate($id)
    {
        $userActivate = User::findOrFail($id);
        $userActivate->activate = !$userActivate->activate;
        $message = "";
        if ($userActivate['activate']) {
            $userActivate['activate'] = true;
            $message = "The account of user number $userActivate->id activated successfully";
        } else {
            $userActivate['activate'] = false;
            $message = "The account of user number $userActivate->id desabled successfully";
        }
        
        if($userActivate->update()){
            return  redirect()->route('users.index')->with(["state"=>$message]);
        }else{
            return back()->with("error","Failed to activate the count of the user");
        }
    }
}
