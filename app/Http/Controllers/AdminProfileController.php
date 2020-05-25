<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\User;

class AdminProfileController extends Controller
{
    /*
    * Full image path with respect to
    * the root folder
    */
    protected $path = '/public/img/profile';

    /*
     * Image directory with respect to the
     * public folder
     */
    protected $directory = '/img/profile/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //Hash::make($data['password'])
        $user = User::findOrFail($id);

//        if user upload new file
        if ($file = $request->file('url')){
//            generate unique name for each picture
            $url = time() . "-" . $file->getClientOriginalName();
//            remove picture if user already has profile
            if (isset($user->image->url) && file_exists(base_path() . '/public' . $user->image->url)){
               unlink(base_path() . '/public' . $user->image->url );
            }

            $file->move(base_path() . $this->path,$url);

            $user->image()->updateOrCreate(['imageable_id'=>$user->id],['url'=>$this->directory . $url]);

        }

         if ($request->name){
             $user->name = $request->name;
         }

         if ($request->password){
            $user->password = Hash::make($request->password);
         }

         if ($request->email){
             $user->email = $request->email;
         }

         $user->save();

         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
