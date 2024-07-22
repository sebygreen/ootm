<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "images" => ["required"],
            "images.*" => ["required", "image", "mimes:jpeg,png,jpg,webp", "max:2048"],
        ]);

        $images = $request->file("images");
        foreach ($images as $image) {
            $path = $image->store("images", "public");
            Photo::create(["path" => $path]);
        }

        return redirect("/office/photos");
    }

    public function delete(Request $request)
    {
        $id = $request->query("id");
        $photo = Photo::find($id);

        Storage::disk("public")->delete($photo->path);
        Photo::destroy($id);

        return redirect("/office/photos");
    }
}
