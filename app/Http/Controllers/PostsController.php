<?php

namespace App\Http\Controllers;

use App\Models\broker;
use App\Models\brokerinof;
use App\Models\category;
use App\Models\Comments;
use App\Models\LoginHistory;
use App\Models\posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = posts::orderBy('created_at', 'desc')->take(4)->get();
        $categorys  = category::all();
        $users= Auth::user();

      

        $topUsers = brokerinof::orderBy('stars', 'desc')
                    ->limit(3)
                    ->get();
        return view('index',compact('posts', 'categorys','users','topUsers'));
    }

    // public function showSavedPosts()
    // {
    //     $savedPosts = auth()->user()->savedPosts;

    //     return view('saved-posts.index', compact('savedPosts'));
    // }

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

        // dd($request);
    $request->validate([
        'content' => 'required',
    ]);
    $post = new posts();
    // dd($request->all());
    if($request->has('image')){
        $imagePath = $request->file('image')->store('public/images');
        $imageUrl = 'storage/' . substr($imagePath, 7);
        $post->image_url =$imageUrl;
    }


    $post->content = $request->input('content');
    $post->user_id = $request->u_id;
    $post->category_id= $request->category;
    $post->save();

    return redirect()->back();

}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post =Posts::findOrFail($id);
         $comments= Comments::where('post_id','=', $post->id)->get();
        $data= [
            'post' => $post,
            'comments' => $comments,
        ];
        return view('posts.show',with($data));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $post =posts::findOrFail($id);
       $categorys =category::all();
       return view('posts.edit',compact('post','categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //    // dd($request->all());
    //     $post =posts::findOrFail($id);
    //     if(!($request->has('image'))){
    //         $post->update([
    //             'content' => $request->content,
    //             'category_id' => $request->category,
    //         ]);
    //     }
    //     else{
    //         $imagePath = $request->file('image')->store('public/images');
    //         $imageUrl = 'storage/' . substr($imagePath, 7);

    //         $post->update([
    //             'content' => $request->content,
    //             'category_id' => $request->category,
    //             'image_url' => $imageUrl,
    //         ]);


    //     }


    //          return redirect()->back();
    // }

    // public function update(Request $request, string $id)
    // {
    //     $post = posts::findOrFail($id);

    //     // $request->validate([
    //     //     'content' => 'required|string|max:500',
    //     //     'category' => 'required|integer',
    //     //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     // ]);

    //     // Update the content and category_id fields
    //     $post->update([
    //         'content' => $request->content,
    //         'category_id' => $request->category,
    //     ]);

    //     // Check if an image was uploaded
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('public/images');
    //         $imageUrl = 'storage/' . substr($imagePath, 7);

    //         // Update the image_url field
    //         $post->update([
    //             'image_url' => $imageUrl,
    //         ]);
    //     }

    //     return redirect()->route('posts.show', $post->id);
    // }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'content' => 'required|string|max:500',
            'category' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the mime types and max size as needed
        ]);

        // Find the post by its ID
        $post = posts::findOrFail($id);

        // Update the post content and category
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');

        // Check if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image_url) {
                Storage::delete('public/' . substr($post->image_url, 8));
            }

            // Store the new image
            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = 'storage/' . substr($imagePath, 7);
            $post->image_url = $imageUrl;
        }
        if ($request->active == 0) {
            $post->active = $request->input('active');
        }

        $post->active = $request->input('active');

        // Save the changes
        $post->save();

        // Redirect back to the page or any other page as needed
        return redirect()->back()->with('success', 'Post updated successfully!');
    }



    public function destroy(string $id)
    {
        posts::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function save_post(Request $request)
    {
        $id =$request->id;
        $savePost = posts::find($id);
        $savePost->save = true;
        $savePost->save();
        return redirect()->back();


    }
    public function save_post_index(Request $request)
    {
      $saveposts=posts::where('save',1)->get();
      return view('posts.save',compact('saveposts'));

    }


    public function all_post()
    {
        $posts = posts::all();
        return view('posts.allpost',compact('posts'));
    }

    public function profile_info()
    {
       $user_id = Auth::user()->id;
       $profile = User::find($user_id);
    //     $broker_phone =broker::first();
   // $profile= brokerinof::where('id',$broker_phone->id)->first();

    // $profile= brokerinof::first();
        // $broker_phone =broker::first();
      //  dd($user_id);
        return view('posts.profile',compact('user_id','profile'));
    }

    public function profile_store_info(Request $request,$id)
    {

        // $request->validate([
        //     'fname' => 'required|string',
        //     'lname' => 'required|string',
        //     'country' => 'required|string',
        //     'city' => 'required|string',
        //     'birthday' => 'required|date',
        //     'bio' => 'required|string',
        // ]);

        $user = User::find($id);
        if($request->has('image')){
            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = 'storage/' . substr($imagePath, 7);
            $user->image_url =$imageUrl;
        }

                // Update the user's profile information
            $user->name = $request->input('name');
            $user->lname = $request->input('lname');
            $user->phone_number = $request->input('phone_number');
            $user->country = $request->input('country');
            $user->city = $request->input('city');
            $user->birthday = $request->input('birthday');
            $user->bio = $request->input('bio');
            // Update any other fields as needed

            $user->save();

        return redirect()->back();

    }


    public function search_index(Request $request)
    {
        if($request->has('search')){
            $search =$request->search;
             $resultposts=posts::where('content','LIKE','%'.$search.'%')->get();

            return view('posts.searchkeyword' ,compact('resultposts'));
        }else{
        $result = [];
            return view('posts.searchkeyword',compact('result'));
        }
    }

    public function search_servie(Request $request)
    {
        if($request->has('search')){
            $search =$request->search;
            $catagory= category::where('category','LIKE','%'.$search.'%')->first();
            if($catagory){
             $resultposts=posts::where('category_id',$catagory->id)->get();
            }
            else{
                $resultposts = collect();
            }
             return view('posts.searchservic' ,compact('resultposts'));
        }else{
        $result = [];
            return view('posts.searchservic',compact('result'));
        }

    }






    public function profile_broker_info(Request $request,$broker_id)
    {
        $broker = broker::where('id',$broker_id)->first();
        $broker_info = brokerinof::where('user_id',$broker_id)->first();
        return view('posts.connectprofile',compact('broker_info','broker'));
    }

    public function history()
{
    // Get the login history for the authenticated user
    // $loginHistory = LoginHistory::where('user_id', auth()->user()->id)
    //     ->orderBy('login_time', 'desc')
    //     ->get();

    // return view('posts.notification', compact('loginHistory'));

    return view('posts.notification');
}

}
