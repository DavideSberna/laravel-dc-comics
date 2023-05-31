@extends('layouts.app')
@section('content')

    <section class="container">
        <div class="mt-5 mb-5">
            <h1>Inserisci Nuovo Fumetto</h1>
            <form action="{{ route('movies.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleHelp" value="{{old('title')}}">
                    <div id="titleHelp" class="form-text">Inserisci un titolo</div>
                    @error('title')
                    {{$message}}
                    @enderror
                </div>
                 
                <div class="mb-3">
                    <label for="thumb" class="form-label">Immagine (l'immagine sarà random se non viene selezionata)</label>
                    <input type="text" class="form-control" name="thumb" id="thumb" aria-describedby="imageHelp" value="{{old('thumb')}}">
                    <div id="imageHelp" class="form-text">Inserisci immagine</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Descrizione (la descrizione sarà random se non viene selezionata)</label>
                    <input type="text" class="form-control" name="description" id="image" aria-describedby="imageHelp" value="{{old('description')}}">
                    <div id="imageHelp" class="form-text">Inserisci descrizione</div>
                </textarea>
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
        </div>
@endsection