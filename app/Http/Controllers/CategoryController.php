<?php


namespace App\Http\Controllers;


use App\Blog;
use App\Category;

class CategoryController
{

    public function create(){
        $data = $this->validate();

        Category::create($data);
        return back()->withInput(['message' => 'The Category has been created successfully']);
    }

    public function update(Category $category){
        $data = $this->validate();

        $category->update($data);

        return back()->withInput(['message' => 'The category has been renamed successfully !']);
    }

    public function delete(Category $category){
        if ($category->id == 0) {
            return back()->withInput(['general-category' => "The category with id - 0 , can't be deleted"]);
        }

        Blog::where('category_id', $category->id)
            ->update(array('category_id' => 0));

        $category->delete();

        return back();
    }

    public function validate(){
        $data = request()->validate(['name' => ['required', 'string','unique:categories', 'max:75']]);
        return $data;
    }
}
