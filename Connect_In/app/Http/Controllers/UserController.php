<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show($id, Request $request)
    {     //Cherche l’utilisateur dans la base méthode show
        $user = User::findOrFail($id);
        //utilisateur connecté via Sanctum
        if ($request->user()->id !== $user->id) {
            //on ne doit PAS exposer email et password
            return response()->json([
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'avatar' => $user->avatar,
                'created_at' => $user->created_at
            ], 200);
        }        //retourner toutes ses infos
        return response()->json($user, 200);
    }
    public function update(Request $request, $id)
    {  //si quelqu’un essaie de modifier un autre compte méthode update
        $user = User::findOrFail($id);
        if ($request->user()->id !== $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        $validate = $request->validate([
            'first_name' => 'sometimes|string|max:225',    //sometimes=champs optionnel
            'last_name' => 'sometimes|string|max:225',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed',  //email unique
        ]);
        if (isset($validate['password'])) {
            $validate['password'] = bcrypt($validate['password']);   //hash du mot de passe
        }
        $user->update($validate);
        return response()->json($user, 200);  //mettre à jour seulement les champs validés
    }
    public function destroy(Request $request, $id)
    {      //vérifie que l’utilisateur peut seulement supprimer son compte
        $user = User::findOrFail($id);
        if ($request->user()->id !== $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        $deleteContent = $request->boolean('delete_content');
        //si delete_content = true → supprime tous les posts et commentaires
        if ($deleteContent) {
            $user->posts()->delete();
            $user->comments()->delete();
        } else {
            Post::where('user_id', $user->id)
                ->update(['user_id' => null]);

            Comment::where('user_id', $user->id)
                ->update(['user_id' => null]);
        }
        $user->likes()->delete();
        $user->delete();
        return response()->json(null, 204);
    }
    public function upload(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Vérifie que l'utilisateur connecté est le propriétaire du compte
        if ($request->user()->id !== $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        // Validation
        $request->validate([
            'avatar' => 'required|image|max:2048'
        ]);
        // Supprimer l'ancien avatar s'il existe
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        // Upload du nouveau fichier
        $path = $request->file('avatar')->store('avatars', 'public');
        // Mettre à jour l'utilisateur
        $user->update([
            'avatar' => $path
        ]);
        return response()->json([
            'avatar_url' => Storage::url($path)
        ], 200);
    }
}

