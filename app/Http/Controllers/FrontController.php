<?php

namespace App\Http\Controllers;
use App\Services\ArticleService;


class FrontController extends Controller
{
    protected $articleService;

    public function __construct(){
        $this->articleService = new ArticleService;
    }

    public function main(){


        return view('main',[
							    'articles' => $this->articleService->getArticles()
							]);


    }

    public function index(){


        return view('index');


    }
}
