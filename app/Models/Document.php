<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Document extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function type()
    {
        return $this->belongsTo(Type::class);
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
