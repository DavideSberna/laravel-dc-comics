


@extends('layouts.app')

@section('content')


<section id="index-blade" class="bg-dark pt-5 pb-5">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="pt-5 pb-5">
            <div class="row">
                @foreach ($movies as $movie )    
                    <div class="col-md-4 p-3 pb-4">
                        <div class="card bg-dark border-0 rounded-0">
                            <div class="cont-img d-flex">
                                <img src="{{$movie->thumb}}" class="card-img-top card-image" alt="Immagine">
                            </div>
                            <div class="mt-2">
                                <h5 class="card-title text-uppercase"><a class="text-white" href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
     
@endsection

