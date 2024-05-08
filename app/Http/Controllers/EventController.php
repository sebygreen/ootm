<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "title" => ["required", "string"],
            "start" => ["required", "date"],
            "end" => ["nullable", "date"],
            "description" => ["nullable", "string", "max:255"],
            "location" => ["nullable", "string"],
        ]);

        Event::create([
            "title" => $request->title,
            "start" => $request->start,
            "end" => $request->end,
            "location" => $request->location,
            "description" => $request->description,
        ]);

        return redirect("/dashboard");
    }

    public function delete(Request $request)
    {
        $id = $request->query("id");

        Event::destroy($id);

        return redirect("/dashboard");
    }

    public function update(Request $request)
    {
        $request->validate([
            "title" => ["required", "string"],
            "start" => ["required", "date"],
            "end" => ["nullable", "date"],
            "description" => ["nullable", "string", "max:255"],
            "location" => ["nullable", "string"],
        ]);

        $id = $request->query("id");

        $event = Event::find($id);
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->save();

        return redirect("/dashboard");
    }
}
