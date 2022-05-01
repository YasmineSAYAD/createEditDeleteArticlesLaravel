<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
     //get articles
     public function articles(){
        $articles=Article::all();
        return view('articles',compact('articles'));
     }

     //get article by id
     public function article($id){
        $article=Article::where('id',$id)->first();
        return view('editArticle',compact('article'));
     }

     //delete an article
     public function deleteArticle($id){
      Article::where('id',$id)->delete();
      return redirect()->back()
      ->with('success','The article has been deleted');
     }
  
    //create an article
    public function createArticle(Request $request){
        $new_article[]=[
               'name' =>$request->input('name'),
               'price' => $request->input('price'),
         ];
        Article::insert($new_article);
        return redirect()->back()
        ->with('success', 'The article account has been successfully created');
     }

     //update an article
     public function editArticle($id,Request $request){
         
          //get article to update
          $articletoupdate=Article::where('id',$id)->first();
           
           $articletoupdate->name=$request->input('name');
           $articletoupdate->price=$request->input('price');
           $articletoupdate->save();
           return redirect()->back()
           ->with('success','The article has been well modified');
         
     }
  
   
}
