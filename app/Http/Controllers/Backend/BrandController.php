<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.pages.brand.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
         $request->validate([
            'brand_name'         => 'required|max:255',
            
        ],
        [
            'brand_name.required' => 'Please insert a brand name',
        ]
    );

        $brand = new Brand();

        $brand->name         = $request->brand_name;
        $brand->slug         = Str::slug($request->brand_name);
        $brand->description  = $request->brand_description;
        
        

        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img; 
            
        }

        $brand->save();
        return redirect()->route('manageBrand');
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
        $brand = Brand::find($id);

        if ( !is_null($brand) ){
            return view('backend.pages.brand.edit', compact('brand'));
        }else{
            return route('manageBrand');
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
        // Form validation
         $request->validate([
            'brand_name'         => 'required|max:255',
            
        ],
        [
            'brand_name.required' => 'Please insert a brand name',
        ]
    );

        $brand =Brand::find($id);

        $brand->name         = $request->brand_name;
        $brand->slug         = Str::slug($request->brand_name);
        $brand->description  = $request->brand_description;
        
        

        if ( $request->image )
        {
            // Delete existing image
            if (File::exists('images/brands/'. $brand->image)) {
                File::delete('images/brands/'. $brand->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img; 
        }

        $brand->save();
        return redirect()->route('manageBrand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {

            if (File::exists('images/brands/'. $brand->image)) {
                File::delete('images/brands/'. $brand->image);
                }
            $brand->delete();
        }
        return redirect()->route('manageBrand');
    }
}
