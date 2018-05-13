<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Storage;
use FFMpeg;
use App\Events\MovieCreate;

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
     * List of video format that can be converted to MP4
     * - mkv
     *
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        setPHPINItoMax();

        $video = $request->file('video');

        //$video_format = $video->getMimeType();
        //dd($video_format);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:movies',
            'released_year' => 'required|integer',
            'video' => 'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/webm,video/ogg,video/x-flv,video/x-ms-asf,video/x-matroska',
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
        setPHPINItoMax();
        
        $video = $request->file('video');

        //$video_format = $video->getMimeType();

        //dd($video_format);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:movies,slug,'.$movie->id,
            'released_year' => 'required|integer',
            'video' => 'sometimes|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/webm,video/ogg,video/x-flv,video/x-ms-asf,video/x-matroska',
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

    public function category(Request $request)
    {
        switch ($request->category) {
            case 'upload':
                $data['movies'] = Movie::where('title', 'like', '%'.$request->search_string.'%')->orderBy('created_at', 'desc')->paginate(6);
                break;
            case 'view':
                $data['movies'] = Movie::where('title', 'like', '%'.$request->search_string.'%')->orderBy('visited', 'desc')->paginate(6);
                break;
            default:
                $data['movies'] = Movie::where('title', 'like', '%'.$request->search_string.'%')->orderBy('released_year', 'desc')->paginate(6);
                break;
        }
        
        $data['category'] = $request->category;
        $data['search_string'] = $request->search_string;
        
        return view('movies.category', $data);
    }

    public function single($slug)
    {
        $data['movie'] = $movie = Movie::where('slug', $slug)->first();

        if(!$movie) return abort(404);

        $movie->visited += 1;
        $movie->save();

        return view('movies.single', $data);
    }

    public function convert_percentage() {

        if(Storage::disk('local')->exists('video_converting.txt')) {
            
            $str = (array) json_decode(Storage::disk('local')->get('video_converting.txt'));
            
            // with duration it means convertion was done on the server
            if (array_key_exists('duration', $str)) {

                $string = $str['duration'];
                $time   = explode(":", $string);
                $hour   = $time[0] * 60 * 60 * 100;
                $minute = $time[1] * 60 * 100;

                $second = explode(".", $time[2]);
                $sec    = $second[0] * 100;
                $milisec= $second[1];

                $result1 = $hour + $minute + $sec + $milisec;

                //echo $result1;

                $string = $str['time'];
                $time   = explode(":", $string);

                $hour   = $time[0] * 60 * 60 * 100;
                $minute = $time[1] * 60 * 100;

                $second = explode(".", $time[2]);
                $sec    = $second[0] * 100;
                $milisec= $second[1];

                $result2 = $hour + $minute + $sec + $milisec;

                return (int) (($result2 / $result1) * 100);

            } else {

                return $str['percentage']; 
            }
            
        } else {

            $movie = Movie::where('is_html5', false)->get()->first();

            if($movie) {

                return 0;

            } else {

                return 100;
            }
        }
    }
}
