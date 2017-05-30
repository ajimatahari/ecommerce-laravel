<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // grab all Categories
        $categories = Category::paginate(20);

        // pass categories to the view
        return view('admin.categories.index')->withCategories($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
          'name' => 'required | min:3 | max:255'
        ]);

        // create new category
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        // set flash message
        Session::flash('success', 'Category created succesfully.');

        // redirect to categories index
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // grab category
        $category = Category::find($id);

        // redirect to edit page
        return view('admin.categories.edit')->withCategory($category);

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
        // validate request
        $this->validate($request, [
          'name' => 'required | min: 3 | max:255'
        ]);

        // update data and save
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        // set flash message
        Session::flash('success', 'Category name updated succesfully.');

        // redirect to categories index
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // grab category
        $category = Category::find($id);

        // delete category
        $category->delete();

        // set flash message
        Session::flash('success', 'Category deleted.');

        // redirect to categories index
        return redirect()->route('categories.index');
    }
}
