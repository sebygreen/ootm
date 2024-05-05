<?php

namespace App\Http\Controllers;

use App\Models\Synopsis;
use Illuminate\Http\Request;

class SynopsisController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "year" => ["required", "date"],
            "link" => ["required", "url"],
        ]);

        Synopsis::create([
            "year" => $request->year,
            "link" => $request->link,
        ]);

        return redirect("/dashboard");
    }

    public function delete(Request $request)
    {
        $id = $request->query("id");

        Synopsis::destroy($id);

        return redirect("/dashboard");
    }

    public function update(Request $request)
    {
        $request->validate([
            "year" => ["required", "date"],
            "link" => ["required", "url"],
        ]);

        $id = $request->query("id");

        $synopsis = Synopsis::find($id);
        $synopsis->year = $request->year;
        $synopsis->link = $request->link;
        $synopsis->save();

        return redirect("/dashboard");
    }
}
