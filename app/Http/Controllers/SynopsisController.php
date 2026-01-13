<?php

namespace App\Http\Controllers;

use App\Models\Synopsis;
use App\Rules\LinksRule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SynopsisController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "year" => ["integer", "unique:synopses", "required"],
            "urls" => ["string", "json", new LinksRule, "required"],
            "shown" => "boolean",
            "link" => "exclude",
            "type" => "exclude",
        ]);

        Synopsis::create([
            "year" => $request->year,
            "links" => $request->urls,
            "shown" => empty($request->shown) ? 0 : 1,
        ]);

        return redirect("/office/synopses");
    }

    public function update(Request $request)
    {
        $request->validate([
            "year" => ["integer", "required"],
            "urls" => ["string", "json", new LinksRule, "required"],
            "shown" => "boolean",
            "link" => "exclude",
            "type" => "exclude",
        ]);

        $id = $request->query("id");

        $synopsis = Synopsis::find($id);
        $synopsis->year = $request->year;
        $synopsis->links = $request->urls;
        $synopsis->shown = empty($request->shown) ? 0 : 1;
        $synopsis->save();

        return redirect("/office/synopses");
    }

    public function delete(Request $request)
    {
        $id = $request->query("id");
        Synopsis::destroy($id);
        return redirect("/office/synopses");
    }
}
