<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use App\Models\Synopsis;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function dashboard()
    {
        $events = Event::all()->sortByDesc("start");
        $synopses = Synopsis::all()->sortByDesc("year");
        $photos = [];
        foreach (Photo::select("id", "path", "created_at")->get() as $photo) {
            $photos[] = (object) [
                "id" => $photo->id,
                "url" => Storage::url($photo->path),
                "size" => round(Storage::disk("public")->size($photo->path) / 1024),
                "created_at" => $photo->created_at,
            ];
        }
        $users = User::select("id", "name", "email", "admin", "created_at")->get();

        return view("dashboard.home", [
            "events" => $events,
            "synopses" => $synopses,
            "photos" => $photos,
            "users" => $users,
        ]);
    }

    public function newEvent()
    {
        return view("dashboard.event.new");
    }
    public function editEvent(Request $request)
    {
        $id = $request->query("id");
        $event = Event::find($id);
        return view("dashboard.event.edit", ["event" => $event]);
    }

    public function newSynopsis()
    {
        return view("dashboard.synopsis.new");
    }
    public function editSynopsis(Request $request)
    {
        $id = $request->query("id");
        $synopsis = Synopsis::find($id);
        return view("dashboard.synopsis.edit", ["synopsis" => $synopsis]);
    }

    public function uploadPhotos()
    {
        return view("dashboard.photos.upload");
    }

    public function newUser()
    {
        return view("dashboard.user.new");
    }
    public function editPassword()
    {
        return view("dashboard.user.password");
    }
}
