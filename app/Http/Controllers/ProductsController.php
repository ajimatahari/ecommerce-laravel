<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Image;
use Storage;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all Products
        $products = Product::paginate(20);

        // pass products variable to the view
        return view('admin.products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all categories
        $categories = Category::all();

        // create product page
        return view('admin.products.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create new Product
        $product = new Product;

        // validate input data
        $this->validate($request, array(
            'name' => 'required | min:3 | max:255',
            'description' => 'required | min:5 |',
            'stock' => 'required | integer | between:0,999999',
            'price' => 'required | between:0,999999.99',
            'discounted_price' => 'nullable | between:0,999999.99',
            'category_id' => 'integer | nullable',
            'product_image' => 'sometimes | image | mimes:jpg,jpeg,bmp,png'
        ));

        // grab request input
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discounted_price = $request->discounted_price;
        $product->category_id = $request->category;

        // check if image selected

        if ($request->hasFile('product_image'))  {
          $image = $request->file('product_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/products/' . $filename);
          Image::make($image)->resize(100,100)->save($location);

          // update database with the new image
          $product->image = $filename;
        }

        // store new product data
        $product->save();

        // Set flash message
        Session::flash('success', 'The product was created succesfully.');

        // redirect to main products page
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // grab product and pass the variable to the view
        $product = Product::find($id);
        return view('admin.products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // grab product to be edited
        $product = Product::find($id);

        // retrieve all categories and place them into an associative array
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }


        // bind product model data with the view
        return view('admin.products.edit')->withProduct($product)->withCategories($cats);
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
        // grab product request
        $product = Product::find($id);

        // validate input data
        $this->validate($request, array(
            'name' => 'required | min:3 | max:255',
            'description' => 'required | min:5 |',
            'stock' => 'nullable | integer | between:0,999999',
            'price' => 'nullable | between:0,999999.99',
            'discounted_price' => 'nullable | between:0,999999.99',
            'category_id' => 'nullable | integer'
        ));

        // grab request input
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discounted_price = $request->discounted_price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('product_image')) {
             // add new image
             $image = $request->file('product_image');
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('images/products/' . $filename);
             Image::make($image)->resize(800,400)->save($location);

             // grab old image
             $oldFilename = $product->image;

             // update database with the new image
             $product->image = $filename;

             // delete old image
             Storage::delete($oldFilename);
         }


        // store new product data
        $product->save();

        // Set flash message
        Session::flash('success', 'The product details were updated succesfully.');

        // redirect to main products page
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // grab product
        $product = Product::find($id);

        // set flash message
        Session::flash('success', 'The product was deleted.');

        // delete product
        $product->delete();

        // redirect to products dashboard
        return redirect()->route('products.index');
    }

}
