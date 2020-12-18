<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\DB;
class Odev extends Controller
{
    public function listele(){
        return DB::table('post')->Join('categories','post.kategori_id','=','categories.kategori_id')->select('post.*', 'post.post_id','categories.cat_isim')->orderBy('post.post_id')->get();
    }
    public function ekleme(Request $request){
      post::insert([
         'isim' => $request->isim,
         'icerik'=>$request->icerik,
         'kategori_id'=>$request->kategori_id
      ]);
    }
    public function düzenleme(Request $request){
        $mevcut = post::query()->where("post_id","=","$request->post_id")->first();
        post::query()->where("post_id","=","$request->post_id")->update([
            'isim' => $request->isim ?? $mevcut->isim,
            'icerik'=>$request->içerik ?? $mevcut->icerik,
            'kategori_id'=>$request->kategori_id ?? $mevcut->kategori_id
        ]);
    }
    public function silme(Request $request){
        post::query()->where("post_id","=","$request->post_id")->delete();
        return "$request->post_id silindi";
    }
    public function kategorileme(){
        $kategori=category::query()->get();
        return $kategori;
    }
}
