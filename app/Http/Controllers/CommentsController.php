<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\comment;

class CommentsController extends Controller
{
    
    public function store(Request $request,$id){

        //validate the request
        $this->validate($request,

              [
                'body'=>'required'
              ]
          );

          //save comment to the database
        $comment = new comment;
        $comment->body = request('body') ;
        $comment->blog_id = $id;
        $comment->user_id= auth()->id();
        $comment->save();

        //redirect back to the detail page
        return back();


    }

}
