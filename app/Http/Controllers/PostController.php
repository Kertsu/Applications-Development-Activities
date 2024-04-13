<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    private $posts = array(
        array(
            "id" => 1,
            "title" => "First Post",
            "content" => "This is the content of the first post.",
        ),
        array(
            "id" => 2,
            "title" => "Second Post",
            "content" => "This is the content of the second post.",
        ),
        array(
            "id" => 3,
            "title" => "Third Post",
            "content" => "This is the content of the third post.",
        )
    );

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "success" => true,
            "posts" => $this->posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(
            [
                "success" => true,
                "post" => $request->all()
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        foreach ($this->posts as $post) {
            if ($post["id"] == $id) {
                return response()->json([
                    "success" => true,
                    "post" => $post
                ]);
            }
        }
        return response()->json([
            "success" => false,
            "error" => "Post not found"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json([
            "success" => true,
            "post" => $request->all(),
            "postId" => $id
        ])
;    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json([
            "success" => true,
            "postId" => $id,
            "message" => "Post ID:" .$id." was deleted successfully"
        ]);
    }

    public function updateProfile(Request $request, string $id){
        return response()->json([
            "success" => true,
            "post" => $request->all(),
            "postId" => $id
        ]);
    }
}
