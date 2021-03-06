<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories =  Category::paginate(5);

        return view('admin.categories.index', compact('categories'));
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
          $request->validate(['name'=>['required','unique:categories','min:2']]);
          Category::create($request->all());
          return redirect()->back();
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $category = Category::findBySlugOrFail($slug);
        return view('admin.categories.edit',compact('category'));
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
         $request->validate(['name'=>['required','unique:categories','min:2']]);
         $category = Category::findOrfail($id);
         $category->slug = null;
         $category->update($request->all());
         return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($slug)
    {
        //
        Category::findBySlugOrFail($slug)->delete();
        return redirect()->back();
    }
}
