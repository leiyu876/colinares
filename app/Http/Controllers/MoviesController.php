<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Storage;
use FFMpeg;

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

        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:movies',
            'released_year' => 'required|integer',
            'video' => 'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/webm,video/ogg,video/x-flv,video/x-ms-asf',
            'image' => 'required|image'
        ]);

        $video_format = $video->getMimeType();

        $movie = new Movie;

        $movie->title = $request->input('title');
        $movie->slug = $request->input('slug');
        $movie->released_year = $request->input('released_year');
        $movie->visited = 0;
        $movie->is_html5 = true;

        if($request->hasFile('image')) {
            
            $image = $request->file('image');
            $path = Storage::disk('public')->put('movies/images', $image);
            $movie->image = $path;
        }

        if($request->hasFile('video')) {

            $path = Storage::disk('public')->put('movies/videos', $video); 
            $movie->video = $path;
        }
        
        // filter html5 valid video format
        if($video_format != 'video/mp4' && $video_format != 'video/webm' && $video_format != 'video/ogg') $movie->is_html5 = false;
        
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
        $video = $request->file('video');

        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:movies,slug,'.$movie->id,
            'released_year' => 'required|integer',
            'video' => 'sometimes|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/webm,video/ogg,video/x-flv,video/x-ms-asf',
            'image' => 'sometimes|image'
        ]);

        $movie->title = $request->input('title');
        $movie->slug = $request->input('slug');
        $movie->released_year = $request->input('released_year');

        if($request->hasFile('video')) {
            
            $video_format = $video->getMimeType();

            // filter html5 valid video format
            if($video_format != 'video/mp4' && $video_format != 'video/webm' && $video_format != 'video/ogg') $movie->is_html5 = false;

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
