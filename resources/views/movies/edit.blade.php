@extends('layouts.app')
@section('content')

    <section class="container">
        <div class="mt-5 mb-5">
            <h1>Inserisci Nuovo Fumetto</h1>
            <form action="{{ route('movies.update' , $movie->id) }}" method="POST">
                @csrf

                @method('PUT')

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="random-message d-none text-center">
                    <h4>Vuoi generare un titolo random?</h4>
                    <div class="mt-3 mb-5">
                        <button type="button" name="si" class="btn btn-primary btn-error-message">Si grazie</button>
                        <button type="button" name="no" class="btn btn-secondary btn-error-message">Non mi interessa</button>
                    </div>
                </div>
        
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control titleInput @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleHelp" value="{{$movie->title}}">
                    <div id="titleHelp" class="form-text">Inserisci un titolo</div>
                    @error('title')
                    {{$message}}
                    @enderror
                </div>
                 
                <div class="mb-3">
                    <label for="thumb" class="form-label">Immagine (l'immagine sarà random se non viene selezionata)</label>
                    <input type="text" class="form-control" name="thumb" id="thumb" aria-describedby="imageHelp"  value="{{$movie->thumb}}">
                    <div id="imageHelp" class="form-text">Inserisci immagine</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Descrizione (la descrizione sarà random se non viene selezionata)</label>
                    <input type="text" class="form-control" name="description" id="image" aria-describedby="imageHelp"  value="{{$movie->description}}">
                    <div id="imageHelp" class="form-text">Inserisci descrizione</div>
                </textarea>
                </div>
    
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </section>
        </div>
@endsection