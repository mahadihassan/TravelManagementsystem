<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.Category.list', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $user = Auth::user();
        $category = new Category;
        $category->category_name = $request->input('name');
        $category->category_descripation = $request->input('description');
        $category->create_by = $user->id;
        $category->save();
        session()->flash('message', 'Category Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Category');
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
        $category= Category::find($id);
        return view('admin.Category.edit', compact('category'));
        
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
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $user = Auth::user();
        $category =Category::find($id);
        $category->category_name = $request->input('name');
        $category->category_descripation = $request->input('description');
        $category->update_by = $user->id;
        $category->save();
        session()->flash('message', 'Category Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Category');
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
