
@extends('layouts.app')
@section('content')

    <div class="container position-relative">
        <div class="bg-primary current-series">
            <h3 class="text-white pe-3 ps-3 m-0 text-uppercase">{{$movie->title}}</h3>
        </div>
    </div>
     
    <section id="show-movie" class="bg-dark">
        <div class="container pt-5 pb-5 position-relative">
            <div class="absolute">
                <div class="row d-flex">
                    <div class="col-sm-12 col-md-4">
                        <div class="card border-0">
                            <div>
                                <img src="{{$movie->thumb}}" class="card-img-top" alt="Immagine">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <div>
                                <h4 class="card-title text-white mt-2">{{$movie->title}}</h4>
                            </div>
                            @if(!is_null($movie->type))
                            <div>
                                <p class="text-white m-0 pt-1">Category: {{$movie->type}}</p>
                                <p class="text-white m-0 pt-1">Artists: {{$movie->artists}}</p>
                                <p class="text-white m-0 pt-1">Writers: {{$movie->writers}}</p>
                            </div>
                            @endif
                            <a class="btn btn-primary" href="{{route('movies.edit', $movie->id)}}" role="button">Edit</a>
                            <form action="{{route('movies.destroy', $movie->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input id="delete" type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="media-q-position container pt-4 pb-4">
            <div class="mt-5 mb-5">
                <h4>Descrizione</h4>
                <div>
                    <p>{{$movie->description}}</p>
                </div>
            </div>
        </div>
    </section>

     
        
     
@endsection