<?php

require_once locate('/app/models/Post.php');
require_once locate('/app/views/posts.php');
require_once locate('/app/views/post_form.php');

class PostController {
    public function index(Request $request) {
        if(isset($request->id)) {
            $result = Post::find($request->id);
            return view(new Posts(), $result); 
        } else {
            $result = Post::all([
                'order_by' => 'id DESC'
            ]);
            return view(new Posts(), [
                'articles' => $result,
                'title' => 'Latest Articles'
            ]);
        }
    }

    public function create() {
        return view(new PostForm());
    }

    public function modify(Request $request) {

        $result = Post::find($request->id);

        return view(new PostForm($result));
    }

    public function update(Request $request) {
        $result = Post::update([ 'id' => $request->id ], [ 
            'title' => $request->input('title'),
            'topic' => $request->input('topic'),
            'content' => $request->input('content'),
        ]);

        if($result) {
            return redirect_to('posts');
        }
    }

    public function insert(Request $request) {
        $result = Post::create([ 
            'title' => $request->input('title'),
            'topic' => $request->input('topic'),
            'content' => $request->input('content'),
        ]);

        if($result) {
            return redirect_to('posts');
        }
    }

    public function show(Request $request) {
        $result = Post::find($request->id);

        return response()->body([
            'status' => 'success',
            'message' => $result,
        ]); 
    }

}