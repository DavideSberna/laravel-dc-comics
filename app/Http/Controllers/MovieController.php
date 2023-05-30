<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);


        $form_data = $request->all();
        $newMovie = new Movie();
        $newMovie->title = $form_data['title'];
    

        if (is_null($form_data['thumb'])) {
            $randomImage = $this->getRandomImage();
            if ($randomImage) {
                $newMovie->thumb = $randomImage;
            }
        } else {
            $newMovie->thumb = $form_data['thumb'];
        }

        if (is_null($form_data['description'])) {
            $randomDescription = $this->getRandomDescription();
            if ($randomDescription) {
                $newMovie->description = $randomDescription;
            }
        } else {
            $newMovie->description= $form_data['description'];
        }

        //dd($newMovie);

        //$newMovie->fill($form_data);
        $newMovie->save();
        return redirect()->route('movies.show', $newMovie->id);
    }

    public function getRandomImage()
    {
        $randomImage = Movie::inRandomOrder()->select('thumb')->first();

        if ($randomImage) {
            return $randomImage->thumb;
        }

    }
    public function getRandomDescription()
    {
        $randomDescription = Movie::inRandomOrder()->select('description')->first();

        if ($randomDescription) {
            return $randomDescription->description;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
{
    $form_data = $request->all();
    
    $movie->title = $form_data['title'];

    if (is_null($form_data['thumb'])) {
        $randomImage = $this->getRandomImage();
        if ($randomImage) {
            $movie->thumb = $randomImage;
        }
    } else {
        $movie->thumb = $form_data['thumb'];
    }

    if (is_null($form_data['description'])) {
        $randomDescription = $this->getRandomDescription();
        if ($randomDescription) {
            $movie->description = $randomDescription;
        }
    } else {
        $movie->description = $form_data['description'];
    }

    $movie->save();

    return redirect()->route('movies.show', $movie->id);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
