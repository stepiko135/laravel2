<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like_request = Like::where('board_id',$request->board_id)
        ->where('user_id',$request->user_id);
        
        if($like_request->exists())
        {
            $like_request->delete();
        }
        else
        {   
            $like = new Like;
            $form = $request->all();
            unset($form['_token']);
            $like->fill($form)->save();
        }
        return redirect('/boards');
    }
}
