<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Storage;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Movie Lists';

        $data['movies'] = Movie::all();

        return view('movies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create Movie';
        
        return view('movies.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = $request->file('video');

        //dd($video->getMimeType());

        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:movies',
            'released_year' => 'required|integer',
            'video' => 'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4',
            'image' => 'required|image'
        ]);

        $movie = new Movie;

        $movie->title = $request->input('title');
        $movie->slug = $request->input('slug');
        $movie->released_year = $request->input('released_year');
        $movie->visited = 0;

        if($request->hasFile('image')) {
            
            $image = $request->file('image');
            $path = Storage::disk('public')->put('movies/images', $image);
            $movie->image = $path;
        }

        if($request->hasFile('video')) {
            
            $path = Storage::disk('public')->put('movies/videos', $video);
            $movie->video = $path;
        }
        
        $movie->save();

        return redirect('/movies')->with('success', 'Movie Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $data['movie'] = $movie;

        $data['page_title'] = 'Play Movie';

        return view('movies.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $data['movie'] = $movie;   
        
        $data['page_title'] = 'Update Movie';

        return view('movies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie = $movie;

        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:movies,slug,'.$movie->id,
            'released_year' => 'required|integer',
            'video' => 'sometimes|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4',
            'image' => 'sometimes|image'
        ]);

        $movie->title = $request->input('title');
        $movie->slug = $request->input('slug');
        $movie->released_year = $request->input('released_year');

        if($request->hasFile('video')) {
            
            $video = $request->file('video');
            
            $path = Storage::disk('public')->put('movies/videos', $video);
            
            if($movie->video) {
                
                Storage::disk('public')->delete($movie->video);
            }
            
            $movie->video = $path;
        }

        if($request->hasFile('image')) {
            
            $image = $request->file('image');
            
            $path = Storage::disk('public')->put('movies/images', $image);

            if($movie->image) {
                
                Storage::disk('public')->delete($movie->image);
            }
            
            $movie->image = $path;
        }

        $movie->save();

        return redirect('/movies')->with('success', 'Movie Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie = $movie;
        
        Storage::disk('public')->delete($movie->video);
        Storage::disk('public')->delete($movie->image);

        $movie->delete();
        
        return redirect('/movies')->with('success', 'Movie Removed');
    }

    public function single($slug)
    {
        $data['movie'] = $movie = Movie::where('slug', $slug)->first();

        if(!$movie) return abort(404);

        return view('movies.single', $data);
    }
}
