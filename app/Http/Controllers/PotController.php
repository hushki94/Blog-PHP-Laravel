<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class PotController extends Controller
{
    public function index(){
        

        return view('posts.index' , [
            'posts' => Post::latest()->filter(request(['search' , 'category' , 'author']))->paginate(6)->withQueryString()
        ]);
    }


    public function show(Post $post ) {
        return view('posts.show' , [
            'post'=>$post,
        ]);
    }


    public function create() {

        return view('posts.create');
    }

    public function store() {

        $attributes = request()->validate([
            'title'=>'required|max:255',
            'slug' => ['required' , Rule::unique('posts','slug')],
            'exerpt'=>'required',
            'thumbnail'=>'required|image',
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories','id')],
        ]);
        $attributes['user_id'] =auth()->id();
        $attributes['thumbnail'] =request()->file('thumbnail')->store('thumbnail');

        Post::create($attributes);

        return redirect('/');
    }
}
