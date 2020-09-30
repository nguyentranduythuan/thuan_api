<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('is_active',1)->paginate(2);
        
        // return view('backend.category.list',[
        //     'categories' => $categories
        // ]);
        return response()->json($categories,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        // $category->image_up = $image_name;
        $category->image_link = $request->link;
        
    	$tmp                = createdFolderCategory();
        $dir_final          = $tmp['dir_final'];
        //dd($dir_final);
        $folder             = $tmp['folder'];
                
		if ($request->image)
        {
            $file = $request->image;

            $pic_1      = $file->getClientOriginalName();
            $pic_1      = explode(".", $pic_1);
            $extension  = $file->getClientOriginalExtension();
            $file_name  = $category->id.time().'.'.$extension;

            $file->move($dir_final.$folder, $file_name);
            $file_name = $folder.'/'.$file_name;

            $category->image_up   = $file_name;
        }

    	$category->save();

        return redirect('v1/category/list')->with('message','Bạn đã thêm category mới');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category->name);
        return view('backend.category.edit',[
            'category' => $category
        ]);
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        // $category->image_up = $image_name;
        $category->image_link = $request->link;

        $tmp                = createdFolderCategory();
        $dir_final          = $tmp['dir_final'];
        $folder             = $tmp['folder'];

        if ($request->image)
        {
        	
            $file = $request->image;

            $pic_1      = $file->getClientOriginalName();
            $pic_1      = explode(".", $pic_1);
            $extension  = $file->getClientOriginalExtension();
            $file_name  = $category->id.time().'.'.$extension;

            $file->move($dir_final.$folder, $file_name);
            $file_name = $folder.'/'.$file_name;

            if(!empty($category->image_up))
            {
            	@unlink($dir_final.'/'.$category->image_up);
            }
            $category->image_up   = $file_name;
        }
		$category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$category = Category::find($id);
        if($category)
		{
			$tmp                = createdFolderCategory();
            $dir_final          = $tmp['dir_final'];
            $folder             = $tmp['folder'];
			if(!empty($category->image_up))
            {
            	@unlink($dir_final.'/'.$category->image_up);
            }
			$category->delete();
		}
    }
}
