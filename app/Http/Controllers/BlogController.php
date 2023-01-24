<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.add_blog',[
            'categories' => Category::all(),
            'authors'=>Author::all()
        ]);
    }

    public function saveBlog(Request $request){
        $blog = new Blog();
        $blog->category_id= $request->category_id;
        $blog->author_id= $request->author_id;
        $blog->title= $request->title;
        $blog->slug= $this->makeSlug($request);
        $blog->description= $request->description;
        $blog->image_name= $this->saveImage($request);
        $blog->date= $request->date;
        $blog->status= $request->status;
        $blog->blog_type= $request->blog_type;
        $blog->save();
        return back();
    }

    public function saveImage($request){
        $image =$request->file('image_name');
        $imageName =rand().'.'.$image->extension();
        $directory ='admin/upload-image/blog-image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }

    public function makeSlug($request){
        $slug = $request->slug;

        if ($slug) {
            $str = $request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }
        $str = $request->title;
            return preg_replace('/\s+/u','-',trim($str));
    }

    public function manegeBlog(){
        return view('admin.blog.manage-blog',[
            'blogs'=>DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
                ->join('authors', 'blogs.author_id', '=', 'authors.id')
                ->select('blogs.*', 'categories.category_name', 'authors.author_name')
                ->get()
        ]);
    }

    public function status($id){
        $blog = Blog::find($id);
        if ($blog->status == 1) {
            $blog->status = 0;
        } else {
            $blog->status = 1;
        }
        $blog->save();
        return back();
        
    }

    public function blogDelete(Request $request){
        $blog = Blog::find($request->blog_id);

        if ($blog->image_name) {
            if (file_exists($blog->image_name)) {
                
                unlink($blog->image_name);
            }
        }
        $blog->delete();
        return back();
    }


    public function editBlog($id){
        $blog = Blog::find($id);
        $category = Category::all();
        $author = Author::all();
        return view('admin.blog.editBlog',[
            'blog' => $blog,
            'categories' => $category,
            'authors' => $author
        ]);
    }

    public function updateBlog(Request $request){
        $blog = Blog::find($request->blog_id);
        $blog->category_id = $request->category_id;
        $blog->author_id = $request->author_id;
        $blog->title = $request->title;
        $blog->slug = $this->makeSlug($request);
        $blog->description = $request->description;
        $blog->image_name = $this->saveImage($request);
        $blog->date = $request->date;
        $blog->status = $request->status;
        $blog->blog_type = $request->blog_type;
        $blog->save();
        return back();
    }
    

}
