
@extends('layouts.app')
@section('content')

<section class="mt-5 mb-5 pb-5 pt-5">
    <div class="carousel slide slider" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($movies as $index => $movie)
            <div class="carousel-item">
                <div class="">
                    <img class="card-img-top" src="{{ $movie->thumb }}" alt="{{ $movie->title }}">
                </div>
            </div>
            @endforeach
        </div>
    
        <button class="carousel-control-prev prev-btn bg-white" type="button"><i class="fa-solid fa-circle-arrow-left text-dark fs-1"></i></button>
        <button class="carousel-control-next next-btn bg-white" type="button"><i class="fa-solid fa-circle-arrow-right text-dark fs-1"></i></button>
    </div>
    <div>
        <div class="text-center mt-4">
            <a class="btn btn-primary" href="{{route('movies.index')}}">tutti i film</a>
        </div>
    </div>
</section>





@endsection