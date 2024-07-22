<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "quote" => ["required", "string", "max:255"],
            "author" => ["required", "string"],
            "label" => ["required", "string"],
        ]);

        Testimonial::create([
            "quote" => $request->quote,
            "author" => $request->author,
            "label" => $request->label,
        ]);

        return redirect("/office/testimonials");
    }

    public function delete(Request $request)
    {
        $id = $request->query("id");

        Testimonial::destroy($id);

        return redirect("/office/testimonials");
    }

    public function update(Request $request)
    {
        $request->validate([
            "quote" => ["required", "string", "max:255"],
            "author" => ["required", "string"],
            "label" => ["required", "string"],
        ]);

        $id = $request->query("id");

        $testimonial = Testimonial::find($id);
        $testimonial->quote = $request->quote;
        $testimonial->author = $request->author;
        $testimonial->label = $request->label;
        $testimonial->save();

        return redirect("/office/testimonials");
    }
}
