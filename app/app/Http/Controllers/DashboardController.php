<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        // $idea = new Idea([
        //     "content"=> "test2",
        // ]);
        // $idea->save();

        //without('user') - disable eager loading
        $ideas = Idea::with('comments.user')->orderBy('created_at','DESC');

        //where content like %test%
        if(request()->has('search')){
            $ideas = $ideas->where('content','like','%'.request()->get('search').'%','');
        }

        return view("dashboard",[
            'ideas'=>$ideas->paginate(5)
        ]);
    }
}
