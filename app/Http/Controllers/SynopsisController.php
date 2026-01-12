<?php

namespace App\Http\Controllers;

use App\Models\Synopsis;
use App\Rules\LinksRule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use function PHPUnit\Framework\isArray;

class SynopsisController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            "year" => ["integer", "unique:synopses", "required"],
            "urls" => ["string", "json", new LinksRule, "required"],
            "shown" => "boolean",
            "link" => "exclude",
            "type" => "exclude",
        ]);

        echo "<pre>";
        print_r($validated);
        echo "</pre>";

        echo "<pre>";
        print_r($validated["urls"]);
        echo "</pre>";

        echo "<pre>";
        print_r(json_decode($validated["urls"], true));
        echo "</pre>";

        Synopsis::create([
            "year" => $request->year,
            "links" => $request->urls,
            "shown" => empty($request->shown) ? 0 : 1,
        ]);

        //return redirect("/office/synopses");
    }

    public function delete(Request $request)
    {
        $id = $request->query("id");

        Synopsis::destroy($id);

        return redirect("/office/synopses");
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

        return redirect("/office/synopses");
    }
}
