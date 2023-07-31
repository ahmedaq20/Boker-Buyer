<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);
           Comments::create([
            'content' =>$request->content,
            'post_id' =>$request->post_id,
            'broker_id'=>$request->broker_id
           ]);

            $post = posts::where('id',$request->post_id);
            $post->update([
                'have_comments' => true,
            ]);


            return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $post =posts::findOrFail($id)->first();
        // $comments= Comments::where('post_id', '=', $post->id);
        // return view('posts.show',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $comment_id = $request->id;
        $comment = Comments::find($id);
        $comment->status = $request->status;
        $comment->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function action(string $id)
    {
        //
    }

    public function  offer()
    {

     $postsWithComments = posts::with('comments')->where('have_comments',1)->get();
     //   $postsWithComments = posts::with('comments')->get();
        return view('posts/offer', compact('postsWithComments'));

    }

    public function  Contracts()
    {

    //  $postsWithComments = posts::with('comments')->where('have_comments',1)->get();
    $user_id = Auth::guard('broker')->user()->id;
     $userComments = Comments::where('broker_id','=',$user_id)->get();
        return view('Broker/Contracts', compact('userComments'));



    }


}
