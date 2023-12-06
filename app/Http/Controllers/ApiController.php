<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function index(Request $request)
    {
        return Category::all();
        // $categories = Category::all();
        // $posts = Post::all();
        // $users = User::all();

        // return response()->json(['message' => 'Api method called', 'category' => $categories, 'post' => $posts, 'user' =>    $users]);
    }

    public function create(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return "Data berhasil Masuk";
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $slug = $request->slug;

        $category = Category::find($id);
        $category->name = $name;
        $category->slug = $slug;
        $category->save();

        return "Data berhasil Update";
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return "Data berhasil Hapus";
    }
}
