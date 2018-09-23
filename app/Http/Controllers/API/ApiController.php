<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\DB;
use Carbon;



class ApiController extends Controller
{
    public function index(){
        $current_time = Carbon\Carbon::now();

        $results = DB::table('custom_events')
            ->select('location', 'category')
            ->where('finish','>',$current_time)//only return not expired events' location 
            ->get();
        
       $location = [];
       $category = [];

       foreach ($results as $result) {
            foreach ($result as $key => $value){
                if($key == 'location' && !in_array($value, $location)){
                    $location[]=$value;
                }
                elseif($key == 'category' && !in_array($value, $category)){
                    $category[]=$value;
                }
            }
       }

        $response = [
            'success' => true,
            'data_location' => $location,
            'data_category' => $category,
            'message' => ''
        ];

        return response()->json($response, 200);
    }
}
