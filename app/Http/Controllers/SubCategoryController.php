<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use Validator;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategories = Subcategory::paginate(20);
        return view('admin/subcategory/lists',['subcategories'=>$subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin/subcategory/create',['categories'=>$categories]);
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
        $validator = Validator::make( $request->all(),
                                    ['name'=>'required |max:100',
                                    'category_id'=>'required',
                                    'remark'=>'required|min:10']);
        if( $validator->fails() ) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $subcategory = new SubCategory();
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category_id;
            $subcategory->remark = $request->remark;
            $subcategory->save();
            return redirect('admin/subcategory')->with('message','Successfully Added!-');
        }
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
        $categories = Category::all();
        $subcategory = Subcategory::find($id);
        return view('admin/subcategory/edit',['categories'=>$categories,'subcategory'=>$subcategory]);
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
        //
        $validator = Validator::make( $request->all(),
                                    ['name'=>'required |max:100',
                                    'category_id'=>'required',
                                    'remark'=>'required|min:10']);
        if( $validator->fails() ) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $subcategory = Subcategory::find($id);
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category_id;
            $subcategory->remark = $request->remark;
            $subcategory->save();
            return redirect('admin/subcategory')->with('message','Successfully Updated!-');
        }
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
