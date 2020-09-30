<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//$category = Category::all();
        $items = Item::where('is_active',1)->paginate(2);
        
        // return view('backend.item.list',[
        //     'items' => $items,
        //     'category' => $category
        // ]);
        return response()->json($items,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::all();
        return view('backend.item.add',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$item = new Item;
        $item->title = $request->name;
        $item->description = $request->description;
        $item->link = $request->link;
        $item->time_born = $request->time_born;
        //$item->image_upload = $request->image_upload;
        $item->image_link = $request->image_link;
        $item->category_id = $request->category_id;
        $item->is_active = $request->is_active;
        $item->bk1 = $request->bk1;
        $item->bk2 = $request->bk2;
        //dd($request->all());
    	$tmp                = createdFolderItem();
        $dir_final          = $tmp['dir_final'];
        //dd($dir_final);
        $folder             = $tmp['folder'];
                
		if ($request->image_upload)
        {
            $file = $request->image_upload;

            $pic_1      = $file->getClientOriginalName();
            $pic_1      = explode(".", $pic_1);
            $extension  = $file->getClientOriginalExtension();
            $file_name  = $item->id.time().'.'.$extension;

            $file->move($dir_final.$folder, $file_name);
            $file_name = $folder.'/'.$file_name;

            $item->image_upload   = $file_name;
        }

    	$item->save();

        return redirect('v1/item/list')->with('message','Bạn đã thêm item mới');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getItem(Request $request)
    {
    	$cate_id = $request->cate_id;
    	$item = Item::where('category_id',$cate_id)->get();

    	//dd($item);

    	return response()->json($item,200);

    	//return view('backend.item.cateItem');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $item = Item::find($id);
        //dd($item->id);
        return view('backend.item.edit',[
            'item' => $item,
            'categories' => $categories
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
        $item = Item::find($id);
        $item->title = $request->name;
        $item->description = $request->description;
        $item->link = $request->link;
        $item->time_born = $request->time_born;
        //$item->image_upload = $request->image_upload;
        $item->image_link = $request->image_link;
        $item->category_id = $request->category_id;
        $item->is_active = $request->is_active;
        $item->bk1 = $request->bk1;
        $item->bk2 = $request->bk2;
        $tmp                = createdFolderItem();
        $dir_final          = $tmp['dir_final'];
        $folder             = $tmp['folder'];

        if ($request->image)
        {
        	
            $file = $request->image;

            $pic_1      = $file->getClientOriginalName();
            $pic_1      = explode(".", $pic_1);
            $extension  = $file->getClientOriginalExtension();
            $file_name  = $item->id.time().'.'.$extension;

            $file->move($dir_final.$folder, $file_name);
            $file_name = $folder.'/'.$file_name;

            if(!empty($item->image_up))
            {
            	@unlink($dir_final.'/'.$item->image_up);
            }
            $item->image_up   = $file_name;
        }
		$item->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$item = Item::find($id);
        if($item)
		{
			$tmp                = createdFolderItem();
            $dir_final          = $tmp['dir_final'];
            $folder             = $tmp['folder'];
			if(!empty($item->image_upload))
            {
            	@unlink($dir_final.'/'.$item->image_upload);
            }
			$item->delete();
		}
    }
}
