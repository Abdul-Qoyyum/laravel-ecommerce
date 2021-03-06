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
        $first_url = $this->directory . $this->saveProductImage($request->file('first_url'));
        $second_url = $this->directory . $this->saveProductImage($request->file('second_url'));
        $product = Product::create($input);
        $product->photo()->create([
            'first_url'=>$first_url,
            'second_url'=>$second_url
        ]);
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $product = Product::findBySlugOrFail($slug);
        $select = $this->selectCategories();
        return view('admin.products.edit',compact('product','select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $slug)
    {
        $input = $request->all();
        $product = Product::findBySlugOrFail($slug);
        $product->slug = null;

        if ($request->file('first_url')){
            $first_url = $this->updateProductImage($request->file('first_url'),$product->photo->first_url);
            $product->photo->update(['first_url'=>$first_url]);
        }

        if ($request->file('second_url')){
            $second_url = $this->updateProductImage($request->file('second_url'),$product->photo->second_url);
            $product->photo->update(['second_url'=>$second_url]);
        }

        $product->update($input);
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $product = Product::findBySlugOrFail($slug);
        $this->deleteProductImage($product->photo->first_url);
        $this->deleteProductImage($product->photo->second_url);
        $product->destroy($product->id);
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
        $name = time() . "-" . $file->getClientOriginalName();
        $file->move(base_path() . $this->path,$name);
        return $name;
    }


    /**
     * Save the resource file
     * @param $file
     * @param $formalUrl
     * @return string
     */
    public function updateProductImage($file, $formalUrl){
            if (isset($formalUrl) && file_exists(base_path() . '/public' . $formalUrl)){
                unlink(base_path() . '/public' . $formalUrl);
                return $this->directory . $this->saveProductImage($file);
            }
    }


    /**
     * Delete the resource file
     * @param $path
     */
    public function deleteProductImage($path){
        if (isset($path) && file_exists(base_path() . '/public' . $path)){
            unlink(base_path() . '/public' . $path);
        }
    }

}
