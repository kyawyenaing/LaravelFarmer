<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Category;
use Validator;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::paginate(20);
        return view('admin/company/lists',['companies'=>$companies]);
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
        return view('admin/company/create',['categories'=>$categories]);

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
        $validator = Validator::make( $request->all(),['name'=>'required',
                                                        'category_id'=>'required',
                                                        'website'=>'required',
                                                        'address'=>'required']);
        if( $validator->fails() ) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $company = new Company();
            $company->name = $request->name;
            $company->category_id = $request->category_id;
            $company->website = $request->website;
            $company->address = $request->address;
            $company->save();
            return redirect('admin/company');
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
        $company = Company::find($id);
        return view('admin/company/edit',['company'=>$company,'categories'=>$categories]);
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
        $validator = Validator::make( $request->all(),['name'=>'required',
                                                        'category_id'=>'required',
                                                        'website'=>'required',
                                                        'address'=>'required']);
        if( $validator->fails() ) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $company = Company::find($id);
            $company->name = $request->name;
            $company->category_id = $request->category_id;
            $company->website = $request->website;
            $company->address = $request->address;
            $company->save();
            return redirect('admin/company')->with('message','Successfully Updated!');

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
