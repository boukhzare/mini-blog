<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function toggle($postId)
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        $userId = session('user')['id'];

        $like = Like::where('user_id', $userId)
                    ->where('post_id', $postId)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
        }

        return back();
    }
}