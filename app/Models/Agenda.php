<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; // diambil dari https://github.com/cviebrock/eloquent-sluggable yang sudah di install melalui composer


class Agenda extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    // protected $with = (['category',  'author']); // penyingkatan, with di controller yg sebelumnya -> Post::with(['category', 'author'])->latest();
    // public function scopeFilter($query, array $filters) //pencarian dengan banyak filter menggunakan array
    // {
    //     // ini pencarian tanpa array
    //     // if (request('search')) {
    //     //     return $query->where('title', 'like', '%' . request('search') . '%')
    //     //         ->orWhere('body', 'like', '%' . request('search') . '%');
    //     // }

    //     // if (isset($filters['search']) ? $filters['search'] : false) { // kalau didalam variabel filter ini ada search ? maka ambil apapun yg di search : kalau gak ada di false (tidak dikerjakan)
    //     //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
    //     //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
    //     // }

    //     // bisa lebih efisien dengan fitur laravel Collection When
    //     $query->when($filters['search'] ?? false, function ($query, $search) {  //kalau search tidak ada, lakukan false -> cara lebih ringkas di php 7 null coalescing operator
    //         return $query->where('title', 'like', '%' . $search . '%')
    //             ->orWhere('body', 'like', '%' . $search . '%');
    //     });

    //     $query->when($filters['category'] ?? false, function ($query, $category) {  //kalau search tidak ada, lakukan false -> cara lebih ringkas di php 7 null coalescing operator
    //         return $query->whereHas('category', function ($query) use ($category) { //punya relationship category (ambil category() dibawahnya), maka lakukan function ini, penggunaan use dimaksudkan untuk menggunakan variable $category yang diatasnya (diluar bagiannya)
    //             $query->where('slug', $category);
    //         });
    //     });

    //     $query->when(
    //         $filters['author'] ?? false,
    //         fn ($query, $author) =>   //penggunaan fungsi arrow function lebih sederhana
    //         $query->whereHas(
    //             'author',
    //             fn ($query) =>
    //             $query->where('username', $author)
    //         )
    //     );
    // }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function komponen()
    {
        return $this->belongsTo(Komponen::class);
    }



    public function getRouteKeyName() //ini untuk mengganti pencarian database berdasarkan id, diganti menjadi slug. (id tidak akan bisa digunakan jika sudah menggunakan getRouteKeyName ini)
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
