<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $searchTerm = request()->input('term', '');
        $perPage = request()->input('perPage', 25);

        $results = User::whereRaw("CONCAT(name, ' ',
    				 ' ', email) 
    				LIKE '%" . $searchTerm . "%'");


        $results = $results->paginate($perPage);

        return view('users.index', compact('results'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $inputs = $request->validate([
                'name' => 'required|string|max:150',
                'email' => 'required|string|email|max:150|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);


            $inputs['password'] = Hash::make($inputs['password']);
            $user = User::create($inputs);

            if($user){
                Session::flash('message', 'User '.$inputs['email'].' has been successfully created');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('users.index');
            }else{
                return redirect()->back()->withErrors('Fail to create user');
            }
            

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
 
        $inputs = $request->validate([
            'name' => 'required|string|max:150',
            'email' => ['required','string','email','max:150','unique:users,email,'.$user->id],
            'password' => 'nullable|string|min:8',
        ]);

        if(!empty($inputs['password'])) {
            $inputs['password'] = Hash::make($inputs['password']);
        }else{
            unset($inputs['password']);
        }

        $user->update($inputs);

        if($user) {
            Session::flash('message', 'User '.$inputs['email'].' has been successfully updated');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('users.index');
        }else{
            return redirect()->back()->withErrors('Fail to update user');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $email = $user->email;
        if (User::destroy($user->id)) {
            Session::flash('message', 'User '.$email.' has been successfully deleted');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->route('users.index');
    }

}
