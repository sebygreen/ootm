<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use App\Models\Synopsis;
use App\Models\Testimonial;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function home()
    {
        $photos = [];
        foreach (Photo::select("path")->get() as $photo) {
            $photos[] = (object) [
                "url" => Storage::url($photo->path),
            ];
        }
        $testimonials = Testimonial::all()->sortBy("author");
        shuffle($photos);
        return view("main.home", [
            "photos" => $photos,
            "testimonials" => $testimonials,
        ]);
    }

    public function calendar()
    {
        $events = Event::select("title", "start", "end", "description", "location")->orderByDesc("start")->get();
        $latest = Event::select("updated_at")->orderByDesc("updated_at")->first();
        return view("main.calendar", [
            "events" => $events,
            "latest" => $latest->updated_at,
        ]);
    }

    public function synopses()
    {
        $synopses = Synopsis::where("shown", 1)->select("year", "links")->orderByDesc("year")->get();
        return view("main.synopses", [
            "synopses" => $synopses,
        ]);
    }

    public function about()
    {
        return view("main.about");
    }
}
