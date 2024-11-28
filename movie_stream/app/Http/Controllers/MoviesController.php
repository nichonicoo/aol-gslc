<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{

    public function home(){
        $genres = Genre::all();
        $movies = Movie::paginate(3);

        $data = [
            'genres' => $genres,
            'movies' => $movies
        ];

        return view('homespage', $data);
    }

    public function create(){
        $genres = Genre::all();

        $data = [
            'genres' => $genres
        ];
        return view('inputs', $data);
    }

    public function store(Request $request) {
        // dd($request);

        $validating = $request->validate([
            'genres_id' => 'required',
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5048',
            'title' => 'required|max:30|unique:movies',
            'description' => 'required|max:50',
            'publish_date' => 'required|before_or_equal:today'
        ]);

        $photo_url = $request->photo->store('photos/movies_data', 'public');

        Movie::create([
            'title' => $request->title,
            'genres_id' => $request->genres_id,
            'photo' => $request->photo->store('photos/movies_data', 'public'),
            'description' => $request->description,
            'publish_date' => $request->publish_date
        ]);

        return redirect()->route('movies.home')->with('success', 'success adding');
    }

    public function delete(Movie $movies){
        $movies->delete();
        Storage::disk('public')->delete($movies->photo);
        return redirect()->route('movies.home')->with('success', 'success deleting');
    }
}
