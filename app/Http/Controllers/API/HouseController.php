<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tarik api
    $url = 'http://127.0.0.1:8000/api/houses';
    $response = Http::get($url);
    $houses = $response->json()['data']['data'];
    // dd($houses['data']);
    return view('house.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('house.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/houses/create';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post($url, 
        [
            'type' => $request->type,
            'price' => $request->price,
        ]);
        // dd($response->object());
        return redirect()->route('house-index');
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
        $url = 'http://127.0.0.1:8000/api/houses/edit/'.$id;
        $response = Http::get($url);
        // dd($response->object()->data);
        $house = $response->object()->data;
        return view('house.edit',compact('house'));
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
        $url = 'http://127.0.0.1:8000/api/houses/update/'.$id;
        $response = Http::post($url, [
            'type' => $request->type,
            'price' => $request->price
        ]);
        // dd($response->object()->data);
        return redirect()->route('house-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = 'http://127.0.0.1:8000/api/houses/delete/'.$id;
        $response = Http::delete($url);
        // dd($response->object()->data);
        return redirect()->route('house-index');
    }
}
