<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //menampilkan semua Post berdasarkan user tertentu
    public function index() //untuk halaman /dashboard/posts dengan method get 
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //menampilkan halaman Tambah Postingan
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // menjalankan fungsi tambah yang diatas
    public function store(Request $request) //untuk halaman /dashboard/posts dengan method post
    {
        // return $request->file('image')->store('post-images'); //test untuk image sudah masuh atau belum

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', //untuk menjaga user edit slug, akan di cek kembali sdh ada atau belum data slugnya
            'category_id' => 'required',
            'image' => 'image|file|max:1024', //harus dikasih file|max supaya mendeteksi Kilobyte nya, bukan integer serperti title dll.
            'body' => 'required'
        ]);

        if ($request->file('image')) { //kalau request file image ada isinya / true, jalankan penyimpanan ini / kalau false alias tidak ada file yg di upload, maka nantinya yg tampil adalah API gambar dari unsplash
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // melihat detail dari sebuah postingan
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //menampilkan halaman ubah data
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // halaman untuk proses perubahan datanya
    public function update(Request $request, Post $post) //untuk halaman /dashboard/posts dengan method put
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024', //harus dikasih file|max supaya mendeteksi Kilobyte nya, bukan integer serperti title dll.
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        // step ini akan dijalankan setelah semua validasi lolos
        if ($request->file('image')) { // kalau request file image baru, ada isinya / true, jalankan penyimpanan ini / kalau false alias tidak ada file yg di upload, maka menggunakan gambar yang lama
            if ($request->oldImage) { // kalau data gambar lamanya ada, maka akan dihapus dulu 
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images'); //gambar baru dimasukkan
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // delete postingan
    public function destroy(Post $post) //untuk halaman /dashboard/posts dengan method delete
    {
        if ($post->image) { // kalau data gambar lamanya ada, maka akan dihapus dulu 
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    // untuk mengisi slug otomatis dari script di crate.blade.php
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]); //dikasih data dalam bentuk json, supaya bisa di olah di script create.blade.php
    }
}
