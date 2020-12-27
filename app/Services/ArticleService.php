<?php 

namespace App\Services;
use App\Models\Article;

class ArticleService{

    public function getArticles(){
        return Article::all();
    }

    public function deleteArticles(){

        $articles = Article::all();
        
        if(count($articles)>1){
        
            foreach($articles as $article){
        
                $article->delete();
        
            }
        
        }

    }
    
    public function saveArticles($items){

        $articles = Article::all();

        foreach($items as $item){
            $article = new Article();
            $article->title=$item->title;
            $article->link=$item->link;
            $article->author=$item->author;
            $article->date=$item->date;
            $article->excerpt=$item->excerpt;
            $article->text=$item->text; 

            $article->save();
            
        }   

        return true;
    }


}

?>