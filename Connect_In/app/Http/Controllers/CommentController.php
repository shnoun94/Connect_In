<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //Liste des commentaires d’un post
    public function index (Post $Post){
        $comments = $Post->comments()
        ->with('user:id,first_name,last_name')
        ->latest()
        ->get();
        return response()->json($comments);
    }
      //Ajouter un commentaire (auth requis)
    public function store(Request $request,Post $post){
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->id()
        ]);
        return response()->json($comment->load('user'),201);
    }
    //Modifier son commentaire (ownership)
    public function update(Request $request, Comment $comment){
        // Vérification ownership
        if ($comment->user_id !== auth()->id()){
            return response()->json([
                'message' => 'Non autorisé'
            ],403);
        }
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);
        $comment->update([
            'content' => $request->input('content')
        ]);
        return response()->json($comment);
    }
    //Supprimer son commentaire (ownership)
    public function destroy(Comment $comment){
        if ($comment->user_id !== auth()->id()){
            return response()->json([
                'message' => 'Non autorisé'
            ],403);
        }
        $comment->delete();
        return response()->json([
            'message' => 'Commentaire suprimé'
        ]);
    }

}
