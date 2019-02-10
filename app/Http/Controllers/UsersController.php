<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Former;
use Validator;
use App\UserHobby;
use App\Hobby;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hobbies = Hobby::all()->pluck('id','name');
        return view('index',compact('hobbies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
          'name' => 'required',
          'middlename' => 'required',
          'last_name' => 'required',
          'email' => 'required|email|unique:users,email',
          'city' => 'required',
          'state' => 'required',
          'country' => 'required',
          'dob' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter first name.',
          'last_name.required' => 'Please enter last name.',
          'email.required' => 'Please enter email.',
        ];
        
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
          Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->name=$request->get('name');
        $user->middlename=$request->get('middlename');
        $user->last_name=$request->get('last_name');
        $user->email=$request->get('email');
        $user->city=$request->get('city');
        $user->state=$request->get('state');
        $user->country=$request->get('country');
        $user->dob=$request->get('dob');
        $user->status=$request->get('status');
        $user->save();
        $hobby = [];
        $hobby = $request->get('hobby');
        foreach ($hobby as $key => $value) {
            $user_hobby = new UserHobby;
            $user_hobby->user_id = $user->id;
            $user_hobby->hobby_id = $value;
            $user_hobby->save();
        }
        return redirect()->route('users.show',$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //dd($user->hobbies[0]->name);
        return view('show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $hobbies = Hobby::all()->pluck('id','name');
        $user_hobby = [];
        foreach ($user->hobbies as $value) {
            array_push($user_hobby, $value->name);
        }
        Former::populate($user);
        return view('edit',compact('user','hobbies','user_hobby'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
          'name' => 'required',
          'middlename' => 'required',
          'last_name' => 'required',
          'email' => 'required|email',
          'city' => 'required',
          'state' => 'required',
          'country' => 'required',
          'dob' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter first name.',
          'last_name.required' => 'Please enter last name.',
          'email.required' => 'Please enter email.',
        ];
        
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
          Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->name=$request->get('name');
        $user->middlename=$request->get('middlename');
        $user->last_name=$request->get('last_name');
        $user->email=$request->get('email');
        $user->city=$request->get('city');
        $user->state=$request->get('state');
        $user->country=$request->get('country');
        $user->dob=$request->get('dob');
        $user->status=$request->get('status');
        $user->update();
        $userhobbys = UserHobby::where('user_id', '=', $id)->get();
        foreach ($userhobbys as $userhobby) {
            $userhobby->delete();
        }
        $hobby = [];
        $hobby = $request->get('hobby');
        foreach ($hobby as $key => $value) {
            $user_hobby = new UserHobby;
            $user_hobby->user_id = $user->id;
            $user_hobby->hobby_id = $value;
            $user_hobby->save();
        }
        return redirect()->route('users.show',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
