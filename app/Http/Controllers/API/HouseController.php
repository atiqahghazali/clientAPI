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
    $url = 'http://127.0.0.1:8000/api/v1/houses';
    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
    ])->get($url);
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
        $url = 'http://127.0.0.1:8000/api/v1/houses/create';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
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
        $url = 'http://127.0.0.1:8000/api/v1/houses/edit/'.$id;
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
        ])->get($url);
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
        $url = 'http://127.0.0.1:8000/api/v1/houses/update/'.$id;
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
        ])->post($url, [
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
        $url = 'http://127.0.0.1:8000/api/v1/houses/delete/'.$id;
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
        ])->delete($url);
        // dd($response->object()->data);
        return redirect()->route('house-index');
    }
}
