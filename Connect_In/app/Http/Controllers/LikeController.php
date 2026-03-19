<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    // Toggle like pour un post /toggle=basculer entre deux états
    public function toggle(Post $Post){
        $user = Auth::user();
        $existing = Like::where('user_id', $user->id)
        ->where('post_id', $Post->id)
        ->first();
        if($existing){
            $existing->delete();
            return response()->json([
                'liked' => false,
                'count' => $Post->likes()->count()
            ]);
        }
        Like::create([
            'user_id' => $user->id,
            'post_id' => $Post->id
        ]);
        return response()->json([
            'liked' => true,
            'count' =>$Post->likes()->count()
        ]);
    }
    //récupérer le nombre de likes et si l'utilisateur a liké
    public function info(Post $Post){
        $user = Auth::user();
        $liked = false;
        
        if ($user) {
            $liked = $Post->likes()->where('user_id', $user->id)->exists();
        }
        return response()->json([
            'count' =>$Post->likes()->count(),
            'liked' => $liked,
            'message' => $liked ? "Vous avez aimé ce post" : "Vous n'avez pas aimé ce post"
        ]);
    }

}
