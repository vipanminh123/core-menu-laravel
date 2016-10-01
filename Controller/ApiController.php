<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use App\Models\Video;
use App\Models\Ycat;
use App\Models\Categories;
use App\Models\Vocabularies;
use App\Models\Examples;
use App\Http\Controllers\Controller;

class ApiController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $video = Video::all()->sortByDesc("updated_at");

        return $video;
    }

    /**
     * get all playlists
     */
    public function getPlaylists($catid) {
        $playlists = Playlist::where('cat_id', $catid)->get()->sortByDesc("updated_at");
        return $playlists;
    }

    public function getVideos($id){
        $playlist = Playlist::find($id);
        $playlist->videos = $playlist->videos;
        return $playlist;
    }

    public function categories() {
        $categories = Categories::all();

        return $categories;
    }

    public function vocabularies() {
        $vocabularies = Vocabularies::all();

        return $vocabularies;
    }

    public function examples() {
        // exit();
        $examples = Examples::find(51);

        return $examples;
    }

    public static function getCats() {
        $cats = Ycat::all();
        return $cats;
    }
}
