<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->published()->paginate(1);

        if(request()->wantsJson())
        {
            return $posts;
        }

        return view('pages.home', [
            'title' => "Publicaciones de la categoría '{$category->name}'",
            'posts' => $posts
        ]);
    }

}
