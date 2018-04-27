<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.bannerlist', compact('banners'));
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
        //$banner = Banner::create($request->all);
        $this->validate(request(),[
            //put fields to be validated here
            'title' => 'required',
            'slide' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            

        $image = $request->file('slide');
        $input['imagename'] = time() . "." . $image->getClientOriginalExtension();
        $destinationPath = public_path('images/slider');
        $image->move($destinationPath, $input['imagename']);


        /*
        $image = $request->file('slide');
        $imagename =  time() . "." . $image->getClientOriginalExtension();
        $path = $image->storeAs('images/slider', $imagename);
        */


        $banner = new Banner();
        $banner->title = $request['title'];
        $banner->caption = $request['caption'];
        $banner->content = $request['content'];
        $slug = trim(preg_replace('/\s+/g', '', strtolower($banner->title)));
        $banner->slug = str_replace(" ", "-", $slug);
        $banner->slide_img_path = URL::to('/').str_replace(public_path(), "", $destinationPath. "/" . $input['imagename']);

        $banner->save();
        return redirect()->route('admin.banners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    public function show($slug)
    {
        //$banner = Banner::find($id);
        $banner = Banner::where('slug', $slug)->firstOrFail();
        return view('admin.banner', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $banner = Banner::where('slug', $slug)->firstOrFail();
        return view('admin.banner.bannereditform', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
       /* $this->validate(request(),[
            //put fields to be validated here
            'title' => 'required',
            //'slide' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/



        request()->validate([
            'title' =>  'required',
            ''
        ]);

        $banner = Banner::where('slug', $slug)->firstOrFail();

        if($banner){
            $banner->title = $request['title'];
            $banner->caption = $request['caption'];
            $banner->content = $request['content'];

            if($request['hasImgSet'] == "n"){
                $slide_img_path = $this->uploadFile($request, "slide");
                
                if($slide_img_path != ""){
                    $banner->slide_img_path = URL::to('/').$slide_img_path;
                }else{
                    $banner->slide_img_path = "";
                }
            }
        }

        $banner->save();
        return redirect()->route('admin.banners');
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

    private function uploadFile(Request $request, $inputName){
        $image = $request->file($inputName);
        $slide_img_path ="";

        if($image){
            $input['imagename'] = time() . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/slider');
            $image->move($destinationPath, $input['imagename']);
            $slide_img_path = str_replace(public_path(), "", $destinationPath. "/" . $input['imagename']);
        }
        return $slide_img_path;
    }
}
