<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Event;
use Illuminate\Http\Request;
use Validator;
use Carbon;

class SearchController extends Controller
{
    public function index(){
        // @TODO return all events to landing page
        return view ('event');
    }

    public function getEvents(Request $request){
        $keyword = $request->keyword;
        $location = $request->location;
        $category = $request->category;  

        $rKey = str_replace(' ', '%',$keyword);

        $current_time = Carbon\Carbon::now();
       
        
        $events = Event::when($rKey, function($query) use ($rKey){
            return $query->where('name', 'like', "%$rKey%");
        })
        ->when($category, function($query) use ($category){
            return $query->where('category', $category);
        })
        ->when($location, function($query) use ($location){
            return $query->where('location',$location);
        })
        ->where('finish','>',$current_time)
        // ->where('private','!=', 1) hide private events
        ->orderby('start')
        ->get();
        
        if (count($events)>0){
            $message = "Found ".count($events)." event(s)";
            $keyword? ($message.= " Keyword is {$keyword}"):'';
            $location? ($message.= " Location is {$location}"):'';
            $category? ($message.= " Category is {$category}"):'';
        }
        else{
            $message = "No results containing all your search terms were found.";
        }

        // @TODO return to event page with old input
        // return View('event', compact('events','message'))->withInput($request->input());
        return View('event', compact('events','message'));
    }
}
