<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\My_User;
use App\Exceptions\NotFoundException;
use App\Exceptions\AlreadyExistException;

class MyUserController extends Controller
{
    public function login(Request $req){
        $user = MyUser::get();
        if($user->login != $req->login || $user->password != $req->password){
            throw new NotFoundException("User Not Found");
        }
        else{
            return $user;
        }
    }

    public function register(Request $req){
        $user = new MyUser();
        $users = MyUser::get();
        $user->fullName = $req->input('full_name');
        $user->login = $req->input('login');
        $user->password = $req->input('password');
        if($user->login == $users->login){
            throw new AlreadyExistException("Login already exists");
        }
        
        $user->save();
        return $user;
    }

    public function create(Request $req){
        $user = new My_User();
        $user->fullName = $req->input('full_name');
        $user->login = $req->input('login');
        $user->password = $req->input('password');
        $user->save();
        return $user;
    }

    public function list(Request $req){
        $users = My_User::get();
        
        return $users;
    }

    public function item($id)
    {
        $user = My_User::find($id);
        if($user->id == $id)
        {
            return response()->json([$user], 200);
        }
        else
        {
            throw new NotFoundException("User Not Found");
        }
    }

    public function update(Request $req, $id){
        $user = My_User::find($id);
        if ($id == $user->id)
        {
            $user->fullName = $req->input('full_name');
            $user->login = $req->input('login');
            $user->password = $req->input('password');
        }
        else
        {
            throw new NotFoundException("User Not Found");
        }
       
        $user->save();
        return $user;
    }

    public function delete($id){
        $user = My_User::find($id);
        if ($user->id == $id){
            $user->delete();
            return response()->json([], 204);
        }
        else
        {
            throw new NotFoundException("User Not Found");
            
        }
        
        $user->save();
        return $user;
    }

}
