<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs =Blog::where('is_public',1)->latest()->paginate(3);

        return view('blog' ,[
            'blogs' => $blogs
        ]);
    }

    public function all(){
        $param = request('key');
//        dd($param);
        $blogs = Blog::where('title', 'like', "%$param%")->latest()->paginate(6);
        return view('admin.blog' ,[
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog){
        return view('single-blog', [
            'blog' => $blog
        ]);
    }

    public function store(){

        $data = $this->validateBlog();
        Blog::create($data);

        return redirect()->to('user/blogs');
    }


    public function edit(Blog $blog){
        return view('admin.blog.edit' ,[
            'blog' => $blog
        ]);
    }

    public function update(Blog $blog){
        $data = $this->validateBlog();

        $blog->update($data);
        return redirect()->to('user/blogs');
    }

    public function toggle(Blog $blog){
        $blog->togglePublic();

        return 'done';
    }

    public function delete(Blog $blog){
        $blog->delete();

        return redirect()->to('user/blogs');
    }

    public function validateBlog(){
        $data = request()->validate([
            'title' => ['required', 'max:75', 'string'],
            'excerpt' => ['required', 'max:220', 'string'],
            'body' => ['required', 'string'],
            'image'  => ['image']
        ]);

        if (isset($data['image'])){
            $data['image'] = request('image')->store('blogs');
        }
        $data['user_id'] = current_user()->id;
        return $data;
    }
}
