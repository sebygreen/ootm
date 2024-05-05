<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use App\Models\Synopsis;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $photos = Photo::all();
        return view("home", ["photos" => $photos]);
    }

    public function calendar()
    {
        $events = Event::all()->sortByDesc("start");
        $updated_at = Event::all()->sortByDesc("updated_at")->first();
        return view("calendar", ["events" => $events, "updated_at" => $updated_at->updated_at]);
    }

    public function synopses()
    {
        $synopses = Synopsis::all()->sortByDesc("year");
        return view("synopses", ["synopses" => $synopses]);
    }
}
