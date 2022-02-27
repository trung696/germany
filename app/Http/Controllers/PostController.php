<?php

namespace  App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Pagination\Paginator;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $pageSize = $request->has('pageSize') ? $request->pageSize : "5";
        $keyword = $request->has('keyword') ? $request->keyword : "";

        $query = Post::where('title', 'like', "%$keyword%")->orderBy('id', 'desc');
        $post = $query->paginate($pageSize)->onEachSide(2);
        // $total =$paginator->total();
        $post->total();
        // giữ lại các giá trị đang tìm kiếm trong link phần trang
        $post->appends($request->input());
        $searchData = $request->input();
        $searchData = compact('keyword');
        $paginator = $post;


        return view('posts.index', compact('paginator', 'searchData', 'pageSize', 'post'));
    }

    public function addForm()
    {
        return view('posts.add');
    }
    public function saveAdd(Request $request)
    {
        $model = new Post();
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('public/post');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }
        $model->title = $request->title;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();
        return redirect()->route('post.index', [$imgPath])->withInput();
    }
    public function remove($id)
    {

        Post::destroy($id);
        return redirect(route('post.index'));
    }
    public function editForm($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back();
        }
        return view('posts.edit', compact('post'));
    }
    public function saveEdit($id, Request $request)
    {
        $model = Post::find($id);
        $count = Post::where('title', $request->title)->count();

        if (!$model) {
            return redirect(route('post.index'));
        }
        if ($request->hasFile('image')) {
            $oldImg = str_replace('storage/', 'public/', $model->image);
            Storage::delete($oldImg);

            $imgPath = $request->file('image')->store('public/post');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }
        if ($count > 1) {
            return redirect(route('post.edit', ['id' => $id]))->with('message', 'Name already exist');
        }
        // dd($model);
        $model->title = $request->title;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();
        return redirect(route('post.index'))->withInput();
    }
}
