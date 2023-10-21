<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use PDO;

class UserController extends Controller
{
    public function index($isactive = 1) {
        
        if(View::exists('user.index')) {

            $data['data_datatablefile'] =  DB::table('users')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(5);

            return view('user.index', $data);
        } else {
            return abort(404);
        }
    }

    public function create() {
        if(View::exists('user.index')) {
            return view('user.create');
        } else {
            return abort(404);
        }
    }

    public function store(Request $request) {
        try {
            $validated = $request->validate([
                "name" => ['required','min:4'],
                "password" => 'required|min:3',
                "email" => ['required', 'email', Rule::unique('users', 'email')],
            ]);
    
            $validated['password'] = bcrypt($validated['password']);
            
            if($request->hasFile('user_image')) {
                $request->validate([
                    "user_image" => 'mimes:jpeg,png,bmp,tiff||max:4096'
                ]);
    
                $fileExtension = $request->file('user_image');
    
                $filename = pathinfo($fileExtension, PATHINFO_FILENAME);
    
                $extension = $request->file("user_image")->getClientOriginalExtension();
    
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    
                $request->file('user_image')->storeAs('public/user/image', $fileNameToStore);
    
                $validated['user_image'] = $fileNameToStore;
            }
    
            $data = User::create($validated);

            return redirect('/users')->with('message', 'Data has been saved.');
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }

    public function edit($id) {
        
        if(View::exists('user.edit')) {
            
            $data['data_recordfile'] = User::findOrFail($id);
            
            $data['data_recordfile']['user_image'] = $this->fetchUserImage($data['data_recordfile']['user_image']);

            return view('user.edit', $data);
        }

    }

    public function update(Request $request, User $user) {

        $validated = $request->validate([
            "name" => ['required','min:4'],
            "email" => 'required|unique:users,email,'.$user->id,
            // "email" => ['required', 'email',Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        return redirect('/users')->with('message', 'User successfully updated.');
    
        if($request->hasFile('user_image')) {
            $request->validate([
                "user_image" => 'mimes:jpeg,png,bmp,tiff||max:4096'
            ]);

            $fileExtension = $request->file('user_image');

            $filename = pathinfo($fileExtension, PATHINFO_FILENAME);

            $extension = $request->file("user_image")->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('user_image')->storeAs('public/user/image', $fileNameToStore);

            $validated['user_image'] = $fileNameToStore;
        }

        $user->update($validated);
    
        return redirect('/users')->with('message', 'User successfully updated.');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/users')->with('message', "User has been deleted.");

    }

    public function fetchUserImage($fileName) {
        $defaultProfile = "";

        $url = $fileName ? asset("storage/user/image/".$fileName) : $defaultProfile;
        return  $url;
    }

}
