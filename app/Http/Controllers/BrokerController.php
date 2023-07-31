<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use App\Models\broker as ModelsBroker;
use App\Models\brokerinof;
use App\Models\category;
use App\Models\Comments;
use App\Models\posts;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function broker_register()
    {
        // if (Auth::guard('broker')->check()) {
        //     return redirect()->back();
        // }
        return view('BorkerAuth.register');
    }

    public function register_store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed'],
        // ]);

        // $broker = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $broker = broker::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($broker));

        Auth::login($broker);

        return redirect()->route('broker.login');
    }


    public function broker_profile_info()
    {
       $user_id = Auth::guard('broker')->user()->id;
        $broker_phone =broker::first();
        // $profile= brokerinof::where('id',$broker_phone->id)->first();

    $profile= brokerinof::first();
        // $broker_phone =broker::first();
        // dd($profile);
        return view('broker.profile',compact('profile','broker_phone'));
    }

    public function profile_store_info(Request $request)
    {

        // $request->validate([
        //     'fname' => 'required|string',
        //     'lname' => 'required|string',
        //     'country' => 'required|string',
        //     'city' => 'required|string',
        //     'birthday' => 'required|date',
        //     'bio' => 'required|string',
        // ]);

        // Get the authenticated user's ID
        $user_id = Auth::guard('broker')->user()->id;
        if($request->has('image')){
            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = 'storage/' . substr($imagePath, 7);
        }
        $broker =broker::first();
        // Create a new broker profile record in the database
        brokerinof::create([
            'user_id' => $broker->id,
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'birthday' => $request->input('birthday'),
            'bio' => $request->input('bio'),
            'image_url'=>$imageUrl,
        ]);

        return redirect()->back();

    }

    public function broker_login(Request $request){
        // if (Auth::guard('broker')->check()) {
        //     return redirect()->back();
        // }
        return view('BorkerAuth.login');
    }

    public function check(Request $request){
        $check = $request->all();
        if (Auth::guard('broker')->attempt(['email'=>$check['email'],'password'=>$check['password']])) {
            return redirect()->route('broker.main');
        }else{
            return redirect()->back()->with('error', 'Your Credintal is invalid');
        }



    }



    public function logout()
    {
        Auth::guard('broker')->logout();
        return redirect()->route('broker.login')->with('success', 'You Have Logout Success');
    }


    public function show(string $id)
    {
        $post =posts::findOrFail($id);
         $comments= Comments::where('post_id','=', $post->id)->get();
        $data= [
            'post' => $post,
            'comments' => $comments,
        ];
        return view('Broker.show',with($data));

    }

    // store comments
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);
           Comments::create($request->all());
            return redirect()->back();

    }
    public function profile(){
        return view('Broker.profile');

    }


    public function save_post(Request $request)
    {
        $id =$request->id;
        $savePost = posts::find($id);
        $savePost->broker_save = true;
        $savePost->save();
        return redirect()->back();


    }
    public function save_post_index(Request $request)
    {
      $saveposts=posts::where('broker_save',1)->get();
      return view('broker.save',compact('saveposts'));

    }

    public function broker_search_index(Request $request)
    {
        if($request->has('search')){
            $search =$request->search;
             $resultposts=posts::where('content','LIKE','%'.$search.'%')->get();

            return view('Broker.searchkeyword' ,compact('resultposts'));
        }else{
        $result = [];
            return view('Broker.searchkeyword',compact('result'));
        }
    }

    public function broker_search_servie(Request $request)
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
             return view('Broker.searchservic' ,compact('resultposts'));
        }else{
        $result = [];
            return view('Broker.searchservic',compact('result'));
        }

    }

    public function history()
    {
        return view('Broker.notification');
    }




}
