<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite_Medias;
use App\Exceptions\NotFoundException;

class FavoriteMediasController extends Controller
{
    public function create(Request $req){
        $media = new Favorite_Medias();
        $media->name = $req->input('name');
        $media->userId = $req->input('user_id');
        $media->save();
        return $media;
    }

    public function list(Request $req){
        $medias = Favorite_Medias::get();
        return $medias;
    }

    public function update(Request $req, $id){
        $media = Favorite_Medias::find($id);
        if ($id == $media->id)
        {
            $media->name = $req->input('name');
            $media->userId = $req->input('user_id');
            $media->save();
            return $media;
        }
        else
        {
            throw new NotFoundException("Not Found");
        }
     
        
    }
    public function delete($id){
        $media = Favorite_Medias::find($id);
        if($media->id == $id){
            $media->delete();
            $media->save();
            return response()->json([], 204);
        }
        else{
            throw new NotFoundException("Not Found");
        }
        
    }
}
