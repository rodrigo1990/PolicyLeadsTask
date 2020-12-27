<?php

namespace App\Services;
use Goutte\Client;
use App\Models\Article;




class GoutteService
{
    protected $client;
    public function __construct(){
        $this->client = new Client;
    }
    public function scrapSpiegelPolitiks(){
        
    	return  $this->client->request('GET', 'https://www.spiegel.de/politik/')
        ->filter(
            'article')
            ->each(function ($node) {

                $article = new Article();
                
                //link
                $link = $node->filter('a')->link()->getUri();   
                $article->link = $link;
                
                //title
                $title = $node->filter('header>h2>a>span:nth-child(2)')->each(function($node){
                    $title=$node->text();
                    return $title;
                });
                //remove the icon from the title
                $article->title = str_replace("Icon: Spiegel Plus","",$title[0]);


                //excerpt
                $excerpt  = $node->filter('section a span:nth-child(1)')->each(function($node){
                    $excerpt = $node->text();
                    return $excerpt;
                });
                $article->excerpt = $excerpt[0];

                //date
                $date = $node->filter('footer')->each(function($node){
                    $date = $node->text();
                    return $date;
                });
                $article->date = $date[0];

                //text
                $client = new Client();
                $text =  $client->request('GET', $link)
                ->filter('main article div>p,main article div>h3')
                ->each(function($node){

                    $text = $node->text();
                    return $text;


                });
                $article->text = implode("",$text);
                $article->text = strlen($article->text)==0 ? null : $article->text;

                //author
                $author = $client->request('GET', $link)
                ->filter('main article header>div>div>div:nth-child(3)')
                ->each(function($node){

                    //I take the information like a HTML
                    //in this way is easier to filtrate the time if there's no author
                    $author = $node->html();

                    return $author;
                    


                });
                
                //Could happend that there's no author 
                //So the scrapper takes the time inside the div and removes it
                //The last step is remove the <a> tag if effectively there is an author
                $article->author = $author[0];
                $article->author = !strpos($article->author,'time') ? $article->author : null ;
                if($article->author != null){
                    $article->author = strip_tags($article->author);

                }
                
                return $article;


            });
    }

   
   
}