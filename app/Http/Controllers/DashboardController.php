<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use App\Models\Synopsis;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $events = Event::all()->sortByDesc("start");
        $synopses = Synopsis::all();
        $photos = Photo::all();
        $users = User::all();
        return view("dashboard", [
            "events" => $events,
            "synopses" => $synopses,
            "photos" => $photos,
            "users" => $users,
        ]);
    }

    public function newEvent()
    {
        return view("event.new");
    }
    public function editEvent(Request $request)
    {
        $id = $request->query("id");
        $event = Event::find($id);
        return view("event.edit", ["event" => $event]);
    }

    public function newSynopsis()
    {
        return view("synopsis.new");
    }
    public function editSynopsis(Request $request)
    {
        $id = $request->query("id");
        $synopsis = Synopsis::find($id);
        return view("synopsis.edit", ["synopsis" => $synopsis]);
    }

    public function newPhoto()
    {
        return view("photo.new");
    }

    public function newUser()
    {
        return view("user.new");
    }
    public function editPassword()
    {
        return view("user.password");
    }
}
