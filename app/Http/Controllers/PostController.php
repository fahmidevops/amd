<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

class PostController extends Controller
{
    public function index() //sebagai method default
    {
        //$blog_posts = Post::all();
        // dd(request('search'));
        // select * from post, jika ada pencarian akan tambah menjadi select * from post where title like % search %, terakhir di get utk tampilkan data

        // $posts = Post::with(['category', 'author'])->latest(); //menggunakan teknik eager loading ambil semua data yg dibutuhkan di awal, sehingga looping berkali2 bisa dihindari

        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }

        return view('posts', [
            "title" => "Agenda Pimpinan" . $title,
            "active" => "posts",
            "posts" => Post::all()
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->get() //menggunakan teknik eager loading Post::with dipindah ke model post -> ambil semua data yg dibutuhkan di awal, sehingga looping berkali2 bisa dihindari // filter diambil dari scopeFilter()
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate()->withQueryString() //paginate antar page  ->paginate(7) jumlah nya ada 7/ ->withQueryString() agar tidak ter reset jika sudah berada di URL category / author
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->get() //paginate antar page  ->paginate(7) jumlah nya ada 7/ ->withQueryString() agar tidak ter reset jika sudah berada di URL category / author
        ]);
    }

    public function show(Post $post) //ini route model binding - menggunakan model Post kemudian diikuti parameter yg di kirim dari wildcard route
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
