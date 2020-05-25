<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests\CreateProductRequest;

use App\Http\Requests\UpdateProductRequest;

use App\Product;

use App\Category;

class AdminProductsController extends Controller
{
    /*
     * Full image path with respect to
     * the root folder
     */
    protected $path = '/public/img/products';

    /*
     * Image directory with respect to the
     * public folder
     */
    protected $directory = '/img/products/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(5);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $select = $this->selectCategories();
        return view('admin.products.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        //
        $input = $request->all();
        $name = $this->directory . $this->saveProductImage($request->file('url'));
        $product = Product::create($input);
        $product->image()->create(['url'=>$name]);
        return redirect('admin/products');
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
        $product = Product::findOrFail($id);
        $select = $this->selectCategories();
        return view('admin.products.edit',compact('product','select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $input = $request->all();
        $product = Product::findOrFail($id);
//        if there is an attempt to change the Image,
//        remove and replace the current Image
        if ($file = $request->file('url')){
            unlink(base_path() . '/public' . $product->image->url);
            $name = $this->directory . $this->saveProductImage($file);
            $product->image()->update(['url'=>$name]);
        }
        $product->update($input);
        return redirect('admin/products');
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
        $product = Product::findOrFail($id);
        unlink(base_path() .'/public/'. $product->image->url);
        $product->destroy($id);
        return redirect()->back();
    }

    /**
     * Organise the categories options
     * @return array
     */
    public function selectCategories(){
        $categories = Category::all();
        $select = [];
        foreach ($categories as $category){
            $select[$category->id] = $category->name;
        }
        return $select;
    }

    /**
     * Save the file to the resource
     * @param $file
     * @return string
     */
    public function saveProductImage($file){
        $name = time() . $file->getClientOriginalName();
        $file->move(base_path() . $this->path,$name);
        return $name;
    }

}
