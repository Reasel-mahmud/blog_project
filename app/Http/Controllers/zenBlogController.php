<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blog_user;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Session;
class zenBlogController extends Controller
{
    public function index()
    {
         $blogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
                ->join('authors', 'blogs.author_id', '=', 'authors.id')
                ->select('blogs.*', 'categories.category_name', 'authors.author_name')
                ->where('blogs.status',1)
                ->where('blog_type', 'popular')
                ->orderby('id','desc')
                ->take(4)
                ->get();
        // $categories = Category::all();
        return view('frontend.home.home',[
            'blogs'=> $blogs,
            // 'categories'=> $categories
        ]);
    }

    public function about()
    {
        return view('frontend.about.about');
    }

    public function blogDet($slug)
    {
        $blog = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->join('authors', 'blogs.author_id', '=', 'authors.id')
            ->select('blogs.*', 'categories.category_name', 'authors.author_name')
            ->where('slug', $slug)
            ->first();
            $catId=$blog->category_id;
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->join('authors', 'blogs.author_id', '=', 'authors.id')
            ->select('blogs.*', 'categories.category_name', 'authors.author_name')
            ->where('category_id', $catId)
            ->get();
        $comments = DB::table('comments')
                ->join('blog_users','comments.user_id','blog_users.id')
                ->select('comments.*', 'blog_users.name')
                ->where('comments.blog_id',$blog->id)
                ->get();        
        return view('frontend.blog.blog',[
            'blog'=>$blog,
            'categoryWiseBlogs'=> $categoryWiseBlogs,
            'comments'=> $comments,
            
        ]);
    }

    public function category($id)
    {
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->join('authors', 'blogs.author_id', '=', 'authors.id')
            ->select('blogs.*', 'categories.category_name', 'authors.author_name')
            ->where('category_id', $id)
            ->get();
        return view('frontend.categories.category-front',[
            'categories'=> $categoryWiseBlogs,
            'categoriesName'=> Category::where('id',$id)->first()
        ]);
    }

    public function contect()
    {
        return view('frontend.contect.contect');
    }

    public function userRegister(){
        return view('frontend.auth.user-register');
    }

    public function saveRegister(Request $request){
        Blog_user::saveRegister($request);
        return back();
    }

    public function userLogin()
    {
        return view('frontend.auth.user-login');
    }

    public function checkLogin(Request $request)
    {
       $userinFo = Blog_user::where('email', $request->userName)
       ->orWhere('phone', $request->userName)
       ->first();
       if ($userinFo) {
        $exisitPass = $userinFo->password;
        if (password_verify($request->password, $exisitPass)) {
            Session::put('userId',$userinFo->id);
            Session::put('userName',$userinFo->name);
            return redirect('/');
        }else{
            return back()->with('massage', 'please use valid pass');
        }
       }else{
        return back()->with('massage','please use valid User');
       }
    }
    public function logoutUser(){
        Session::forget('userId');
        Session::forget('userName');
        return back();
    }

    
}
