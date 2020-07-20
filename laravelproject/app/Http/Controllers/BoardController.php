<?php
namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Board::with('user')->get();
        return view('boards.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Board::$rules);
        $board = new Board;
        $form  = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/boards');        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $longin_user_id = Auth::id();
        $post = Board::find($id);

        if( $longin_user_id === $post->user_id )
        {
            return view('boards.edit',['post'=>$post]);

        }else{
            return redirect('/boards');
        }
        
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
        $this->validate($request,Board::$rules);
        $board = Board::find($id);
        $form  = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/boards'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Board::find($id)->delete();
        return redirect('/boards');
    }
}
