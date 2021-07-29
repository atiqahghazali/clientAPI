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
    $url = 'http://127.0.0.1:8000/api/v1/users';
    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
    ])->get($url,[
        'search' => $request->search
    ]);

    if($response->json()['message'] == 'Unauthenticated.'){
        return $response->json()['message'];
    }elseif($response->json()['success'] == true){
        $users = $response->json()['data']['data'];

        return view('user.index', compact('users'))->with([
        'alert-type' => 'alert-success',
        'alert-message' => $response->json()['message']
        ]);
    }
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/v1/users/create';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
        ])->post($url, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        dd($response->json()['message']);
        if($response->json()['message'] == 'Unauthenticated.'){
            return $response->json()['message'];
        }elseif($response->json()['message'] == 'The given data was invalid.'){
            return redirect()->back()->with([
                'alert-type' => 'alert-success',
                'alert-message' => $response->json()['message']
            ]);
        }else{
            return redirect()->route('user-index')->with([
                'alert-type' => 'alert-success',
                'alert-message' => $response->json()['message']
            ]);
        }
        
    }

    public function show($id){
        $url = 'http://127.0.0.1:8000/api/v1/users/'.$id;
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
        ])->get($url);
        // dd($response->object()->data);
        if($response->json()['message'] == 'Unauthenticated.'){
            return $response->json()['message'];
        }else{
            $user = $response->object()->data;
            return view('user.edit',compact('user'));
        }
        
    }

    public function update(Request $request, $id)
    {
        $url = 'http://127.0.0.1:8000/api/v1/users/update/'.$id;
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
        ])->post($url, 
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($response->json()['message'] == 'Unauthenticated.'){
            return $response->json()['message'];
        }else{
            return redirect()->route('user-index');
        }
        
    }

    public function destroy($id)
    {
        $url = 'http://127.0.0.1:8000/api/v1/users/delete/'.$id;
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTliZGI1YzU4NTQ4ZjAxNTU3ZGUyYTBmZDcwYWQwMzdjMjRiZjJhYTk2MTYwOGE1OTNkYjA5MGYyNTlmYjgwOGNhZTZjNDc4NDEzMTVhMzciLCJpYXQiOjE2Mjc1NDg1NDAuNzkxMDcsIm5iZiI6MTYyNzU0ODU0MC43OTEwNzIsImV4cCI6MTY1OTA4NDU0MC43ODk5ODIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.VfjQpkA5DYo6-eeYQubuE5cs60ytmhF9RvEopzKvziAZlEHH6hm2hasaF33afD-9LJUBINDtcMYrijJ1P2JRtiJFbUhkUv_QQEqcpQHXf-FGW_v34vRJLcB8iXdiI56HEdAOwU7Nl9OBee0rrVQteDTUBLZsHbDvnh8E4wCDtxPALU_5F8J1N36NkuHWImrC98W_7AQiOx8SbNU1bJ7HUi9BgRFoSVMFN1yJgOZfuTbEqnAXZc0Pmmej4zuJDv0-w_Hl2AfTmCT8p5AxyXiyN35JwTmaY_4S4y3TwLAKIYhOt_kWbrOFnLwCB5bcYuATO6eaGMC1m4yjF6ZhL6TARcWq_WJYODZgeRLlfhP1OgEApRnXRxuQnzuoASuDOGzq1_IEn3QZ1v7fVNjaHX-JDk8iHQUDMb7vCUquIca__eFEAbp5ByNK9Za5kpDJJygugW0bZd8DxnynG-Z2QyRr5bRQSckwhEfhGfwIw0Ew_ZAeoALr5eyJtB7NubddxijgXJRiLD_AUvku0IAFUdTYiAucjU8tEkTKVH9KghQ7JJJjpjf2j9_4Vlnh7Xjthc0UTnVMcreA_1v6aDwS-rbTZNgEFTgofWUIm0z2Z6U1Pcp_80ynoQWpCuF4tcPDVlPe4E9Vl1CDxEvOMG5aqjlvvz0IoXsM9UGoEzsMcmG3WLY'
        ])->delete($url);

        if($response->json()['message'] == 'Unauthenticated.'){
            return $response->json()['message'];
        }else{
            return redirect()->route('user-index');
        }
    }
}
