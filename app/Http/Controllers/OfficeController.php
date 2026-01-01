<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use App\Models\Synopsis;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function forgotPassword()
    {
        return view("auth.password.forgot");
    }

    public function resetPassword(Request $request)
    {
        $token = $request->query("token");
        return view("auth.password.reset", ["token" => $token]);
    }

    public function home()
    {
        return view("office.home");
    }

    //events
    public function events()
    {
        $events = Event::all()->sortByDesc("start");
        return view("office.events", ["events" => $events]);
    }

    public function newEvent()
    {
        return view("office.events.new");
    }

    public function editEvent(Request $request)
    {
        $id = $request->query("id");
        $event = Event::find($id);
        return view("office.events.edit", ["event" => $event]);
    }

    //synopses
    public function synopses()
    {
        $synopses = Synopsis::all()->sortByDesc("year");
        return view("office.synopses", ["synopses" => $synopses]);
    }

    public function newSynopsis()
    {
        $range = [];
        for ($x = Carbon::now()->year - 5; $x <= Carbon::now()->year + 5; $x++) {
            $range[] = $x;
        }
        return view("office.synopses.new", ["range" => $range]);
    }

    public function editSynopsis(Request $request)
    {
        $range = [];
        for ($x = Carbon::now()->year - 5; $x <= Carbon::now()->year + 5; $x++) {
            $range[] = $x;
        }
        $id = $request->query("id");
        $synopsis = Synopsis::find($id);
        return view("office.synopses.edit", ["synopsis" => $synopsis, "range" => $range]);
    }

    //photos
    public function photos()
    {
        $photos = [];
        foreach (Photo::select("id", "path", "created_at")->get() as $photo) {
            $photos[] = (object)[
                "id" => $photo->id,
                "url" => Storage::url($photo->path),
                "size" => round(Storage::disk("public")->size($photo->path) / 1024),
                "created_at" => $photo->created_at,
            ];
        }
        return view("office.photos", ["photos" => $photos]);
    }

    public function newPhotos()
    {
        return view("office.photos.upload");
    }

    //users
    public function users()
    {
        $users = User::select("id", "name", "email", "admin", "created_at")->get();
        return view("office.users", ["users" => $users]);
    }

    public function newUser()
    {
        return view("office.users.new");
    }

    public function editUser()
    {
        return view("office.users.edit");
    }

    //testimonials
    public function testimonials()
    {
        $testimonials = Testimonial::all()->sortBy("author");
        return view("office.testimonials", ["testimonials" => $testimonials]);
    }

    public function newTestimonial()
    {
        return view("office.testimonials.new");
    }

    public function editTestimonial(Request $request)
    {
        $id = $request->query("id");
        $testimonial = Testimonial::find($id);
        return view("office.testimonials.edit", ["testimonial" => $testimonial]);
    }
}
