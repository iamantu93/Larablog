<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'details']);
    }

    // show the list of posts
    public function index()
    {
        $posts = blog::latest()->get();
        return view('index', compact('posts'));
    }

    // show form to create post
    public function create()
    {
        return view('create');
    }
    
    //store post in database
    public function store(Request $request)
    {
        //validate the request
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //save post to database
        $blog = new blog;
        $blog->title = request('title');
        $blog->body = request('body');
        $blog->user_id = auth()->id();
        $blog->save();

        // flash a session message
        session()->flash('message', 'Your post have been published');

        return redirect('/');
    }

    //show individual posts
    public function details($id)
    {
        $post = blog::find($id);
        return view('details', compact('post'));
    }

    // Delete a post
    public function destroy($id)
    {
        $post = blog::find($id);
        $post->delete();
        return redirect('/');
    }
}