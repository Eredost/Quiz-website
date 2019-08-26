<?php


namespace App\Http\Controllers;


use App\Models\Quiz;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function tags()
    {
        $tags = Tag::all();

        return view("tags",
            array(
                "tags" => $tags
        ));
    }

    /**
     * @param $tagId int
     * @return \Illuminate\View\View
     */
    public function quiz($tagId)
    {
        $tag = Tag::find($tagId);

        return view("tag",
            array(
                "tag" => $tag
        ));
    }
}
