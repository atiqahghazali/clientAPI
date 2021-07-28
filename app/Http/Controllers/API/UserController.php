<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // tarik api
    $url = 'http://127.0.0.1:8000/api/users';
    $response = Http::get($url,[
        'search' => $request->search
    ]);
    $users = $response->json()['data']['data'];
    // dd($users['data']);
    return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/users/create';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post($url, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        dd($response->object()->errors);
        if($response->successful()){
            return redirect()->route('user-index')->with([
                'alert-type' => 'alert-success',
                'alert-message' => 'User has been successfuly added'
            ]);
        }else{
            return redirect()->route('user-index')->with([
                'alert-type' => 'alert-danger',
                'alert-message' => 'failed'
            ]);
        }
        
    }

    public function show($id){
        $url = 'http://127.0.0.1:8000/api/users/'.$id;
        $response = Http::get($url);
        // dd($response->object()->data);
        $user = $response->object()->data;
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $url = 'http://127.0.0.1:8000/api/users/update/'.$id;
        $response = Http::post($url, 
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('user-index');
    }

    public function destroy($id)
    {
        $url = 'http://127.0.0.1:8000/api/users/delete/'.$id;
        $response = Http::delete($url);
        // dd($response->object()->data);
        return redirect()->route('user-index');
    }
}
