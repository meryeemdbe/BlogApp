<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use Illuminate\Http\UpladedFile;

use Storage;

class BlogsController extends Controller
{
    public function index() {

        $blogs = Blog::all();
        return view('blogs.index' , ['blogs' => $blogs]) ;
    }



    public function create() {

        return view('blogs.create') ;
    }




    public function store(Request $request ) {

       $blog = new Blog ;

        //$file_ext = $request->photo->getClientOriginalExtension();
        //$file_name= time().'.'.$file_ext ;
        // $path  ='images/blogs';
         //$request->photo-> move($path,$file_name);

         $path = Storage::putFile('public', $request->file('photo')) ;
         $url = Storage::url($path);

       $blog->title = $request->title;
       $blog->content = $request->content ;
       $blog->image =   $url  ;
       // $blog->image =   $file_name  ;

       
       

       $blog->save();

       return redirect()->route('blogs_path');
    }



    

    public function show($id) {

        $blog = Blog::find($id);
       
     
        return view('blogs.show' , ['blog' => $blog]) ;
       // return view('blogs.show');
    }


    public function edit($id) {

        $blog = Blog::find($id);

        return view('blogs.edit' , ['blog' => $blog]);
    }


    public function update (Request $request , $id) {

        $blog = Blog::find($id);

        $path = Storage::putFile('public', $request->file('photo')) ;
        $url = Storage::url($path);

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image =   $url  ;

        $blog->update();
        // this is what should be done ,
        //return redirect()->route('blog_path', ['blog' => $blog]) ;
        // but this one worked for me 
        return view('blogs.show' , ['blog' => $blog]) ;
       

    }

    public function destroy($id) {

        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->route('blogs_path');
    }


}
