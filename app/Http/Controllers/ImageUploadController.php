<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class ImageUploadController extends Controller

{

     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUpload()

    {

        return view('imageUpload');

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUploadPost(Request $request)

    {

        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $imageName = time().'.'.$request->image->extension();

        $request->image->storeAs('images', $imageName);

        $request->image->move(public_path('images'), $imageName);

        DB::insert('insert into images_user (imagename, username) values (?, ?)', [$imageName, auth()->user()->id]);



        /* Store $imageName name in DATABASE from HERE */




        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

    }

}
