<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\News\StoreNews;
use App\Http\Requests\News\UpdateNews;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('users')->get();
        return $news;
    }

    public function show($id)
    {
        return News::find($id);
    }

    public function update(UpdateNews $request, $id)
    {
        $news = News::find($id);
        $news->update($request->all());

        return response()->json(['message'=>'Update news success']);
    }

    public function store(StoreNews $request)
    {
        News::create($request->all());
        return response()->json(['message'=>'Create news success']);
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return $news;
    }

}
?>
