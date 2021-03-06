<?php

namespace App\Http\Controllers;
use App\Http\Requests\AdditionalUserRequest;
use App\Http\Requests\UserRequsts;
use App\Photo;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

//        $roles = Role::lists('name','id')->toArray()->all();
          $roles =Role::get()->pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(UserRequsts $request)
    {

        Session::flash('added_user','user has been added');


        if(trim($request->password) == ''){

            $input = $request->except('password');
        }else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

            $input['password'] = bcrypt($request->password);
        }

        User::create($input);


        return redirect('/admin/users');

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
        $user = User::findorfail($id);

        $roles =Role::get()->pluck('name','id')->all();



        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(AdditionalUserRequest $request, $id)
    {

        Session::flash('updated_user','user has been udated');

        $user = User::findorfail($id);

        if(trim($request->password) == ''){

            $input = $request->except('password');
        }else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }

        if($file = $request->file('photo_id')){


            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;


        }

           $user->update($input);

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $user = User::findorfail($id);
        unlink(public_path(). $user->photo->file);
        $user->delete();


        Session::flash('deleted_user','user has been deleted');

        return redirect('/admin/users');
    }
}
