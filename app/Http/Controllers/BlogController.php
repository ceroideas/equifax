<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $blogs = Blog::all();

            return view('blogs.index', [
                'blogs' => $blogs
            ]);

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function items()
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $blogs = Blog::where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);
            //->get();

            return view('blog', [
            'blogs' => $blogs
            ]);

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function createPosts($id = null){

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $blog = Blog::find($id);

            return view('blogs.create', compact('blog'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }


    }


    public function savePosts(Request $request)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $blog = new Blog;
            if ($request->image_post) {
                $extension = $request->image_post->getClientOriginalExtension();
                    if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpeg'){
                        $image_post = $request->file('image_post')->store('uploads/blogs', 'public');
                        $blog->image_post = $image_post;
                    }
                }
            $blog->title = $request->title;
            $blog->slug = strtolower(str_replace(' ', '-', $request->slug));
            $blog->extract = $request->extract;
            $blog->body = $request->body;
            $blog->status = $request->status;
            $blog->user_id = Auth::user()->id;
            $blog->save();

            return redirect('blogs')->with('msj','Se ha guardado la información del Post');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }


    }





    public function updatePosts(Request $request, $id)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $blog = Blog::find($id);

            if ($request->image_post) {
                $extension = $request->image_post->getClientOriginalExtension();
                if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpeg'){
                    $image_post = $request->file('image_post')->store('uploads/blogs', 'public');
                    $blog->image_post = $image_post;
                }
            }
            $blog->id = $request->id;
            $blog->title = $request->title;
            $blog->slug = strtolower(str_replace(' ', '-', $request->slug));
            $blog->extract = $request->extract;
            $blog->body = $request->body;
            $blog->status = $request->status;
            $blog->user_id = Auth::user()->id;
            $blog->save();

            return redirect('blogs')->with('msj','Se ha Actualizado el Post');
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function showPost($slug)
    {
        $blog = Blog::where('slug',$slug)
                    ->where('status',1)
                    ->first();

        return view('blogs.show',compact('blog'));

    }



    public function editPost($id = null)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $blog = Blog::find($id);

            return view('blogs.create', compact('blog'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = 'Titulo controller';
        $blog->slug = 'Titulo controller';
        $blog->extract = 'Titulo controller';
        $blog->body = 'Titulo controller';
        $blog->status = '0';
        $blog->user = Auth::user()->id;
        $blog->save();

    }  */

}
