@extends('layouts.main')
    @section('main')
        <section id="index">
            <div class="container-fluid">
                <div class="row">
                    <ul class="flex">
                        @foreach($articles as $article)
                            <li>
                                <h3>
                                    <a href="{{$article->link}}" target="_blank">
                                        {{$article->title}}
                                    </a>
                                </h3>
                                <p>
                                    {{$article->excerpt}}
                                </p>
                                <footer>
                                    <p>
                                        <i>
                                            {!!$article->author!!}
                                        </i>
                                    </p>
                                    <p>
                                        <i>
                                            {{$article->date}}
                                        </i>
                                    </p>
                                </footer>
                            </li>    
                        @endforeach
                    </ul>
                
                </div>
            </div>
        
        </section>
    @endsection
