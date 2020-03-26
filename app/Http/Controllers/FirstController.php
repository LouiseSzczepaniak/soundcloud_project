<?php

namespace App\Http\Controllers;

use App\Chanson;
use App\Playlist;
use App\Playlists_chanson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    public function index(){
        $chansons = Chanson::all();
        /*$c = Chanson::find(1);*/
        return view('FirstController.index', ["chansons" => $chansons]);
    }
    public function about(){
        return view('FirstController.about');
    }

    public function article($id){
        return view('FirstController.article', ['id' => $id, 'nom' => 'Gilles']);
    }

    public function utilisateur($id){
        $u = User::findOrFail($id);
        return view('FirstController.utilisateur', ['utilisateur'=>$u]);
    }

    public function playlists($id){
        $playlists = Playlist::findOrFail($id);
        return view('FirstController.playlists', ['playlists' => $playlists]);
    }

    public function afficheplaylists($id){
        $playlists = Playlist::findOrFail($id);
        return view('FirstController.utilisateur', ['playlists' => $playlists]);
    }

    public function nouvellechanson(){
        return view('FirstController.nouvelle');
    }

    public function like($id) {
        Auth::user()->jeLike()->toggle($id);
        return redirect("/");
    }

    public function creerchanson(Request $request){

        $request->validate([
            'nom' => 'required|min:3|max:255',
            'chanson' => 'required|file',
            'style' => 'required|min:2',
        ]);

        $name = $request->file('chanson')->hashName();
        $request->file('chanson')->move("uploads/".Auth::id(), $name);

        $c = new Chanson();
        $c-> nom = $request->input('nom');
        $c->url = "/uploads/".Auth::id()."/".$name;
        $c->style = $request->input('style');
        $c->user_id = Auth::id();
        $c->save();
        return redirect("/utilisateur/". Auth::id());
    }

    public function suivre($id){
        Auth::user()->jeLesSuit()->toggle($id);
        return back();
    }

    public function search($s){
        $users = User::whereRaw("name like concat('%',?, '%')", [$s])->orderBy('created_at', 'desc')->get();
        $chanson = Chanson::whereRaw("nom like concat('%',?, '%')", [$s])->orderBy('nom', 'asc')->get();
        return view('FirstController.search', ['users'=>$users, 'chanson'=>$chanson]);
    }

    public function jeLike($id) {
        Auth::user()->jeLike()->toggle($id);
        return redirect("/");
    }
        
}
