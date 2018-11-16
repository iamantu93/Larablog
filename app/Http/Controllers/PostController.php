<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','details']);
    }
    public function index()
    {
        $posts = blog::latest()->get();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);

        $blog = new blog;
        $blog->title= request('title');
        $blog->body= request('body');
        $blog->user_id=auth()->id();
        $blog->save();

        session()->flash('message','Your post have been published');
        
        return redirect('/');
    }
    public function details($id)
    {
        $post=blog::find($id);
        return view('details', compact('post'));
    }
}
