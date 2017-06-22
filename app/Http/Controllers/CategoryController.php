<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(20);
        return view('admin/category/lists',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/category/create');
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
                                    'remark'=>'required |min:10'
                                    ]);
        if( $validator->fails()) {
            return redirect()->back()->withErrors( $validator )->withInput();
        } else {
            $category = new Category();
            $category->name = $request->name;
            $category->remark = $request->remark;
            $category->save();
            return redirect('admin/category')->with( 'message', 'Successfully Added New Category');
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
        $category = Category::find($id);
        // dd($category);
        return view('admin/category/edit',['category'=>$category]);
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
                                    'remark'=>'required |min:10']);
        if( $validator->fails() ) {
            return redirect()->back()->withErrors( $validator )->withInput();
        } else {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->remark = $request->remark;
            $category->save();
            return redirect('admin/category')->with( 'message','Successfully Updated!' );
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
