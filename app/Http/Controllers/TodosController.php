<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Resources\UserResource;
use App\Http\Resources\PostResource;
use Exception;

class TodosController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::with('todo')->orderBy('created_at', 'desc')->get();
            if ($posts->count() > 0) {
                return PostResource::collection($posts);
            } else {
                return response()->json(['error' => 'Not found'], 404);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function all()
    {
        try {
            $users = User::with(['posts', 'todos'])->get();
            if ($users->count() > 0) {
                return UserResource::collection($users);
            } else {
                return response()->json(['error' => 'Not found'], 404);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        try {
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->todo_id = 1;
            $post->save();
            return response()->json(['success' => true], 201);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        try {
            $post = Post::find($id);
            if ($post) {
                $post->title = $request->title;
                $post->body = $request->body;
                $post->save();
                return response()->json(['success' => true], 200);
            } else {
                return response()->json(['success' => false], 400);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            if ($post) {
                $post->delete();
                return response()->json(['success' => true], 200);
            } else {
                return response()->json(['success' => false], 400);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
