<?php

namespace App\Models;


class Post
{
    // private hanya bisa di akses di class Post ini saja, tdk bisa digunakan di luar class
    private static $blog_posts = [
        [
            "title"     => "Judul Post Pertama",
            "slug"      => "judul-post-pertama",
            "author"    => "Fahmi",
            "body"      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, id ipsam officia asperiores, soluta, labore repellendus sapiente distinctio ea natus fuga eligendi repellat delectus! Quo veniam culpa nisi tenetur laborum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, exercitationem. Facere delectus temporibus ad amet asperiores sunt dolorum ipsa est, cum quaerat aspernatur nulla quibusdam nostrum, possimus labore, fugit voluptatibus"
        ],
        [
            "title"     => "Judul Post Kedua",
            "slug"      => "judul-post-kedua",
            "author"    => "Bo adika",
            "body"      => " Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio quam atque repellat et suscipit, laboriosam, reprehenderit reiciendis omnis hic id odio! Consectetur molestiae beatae officia perferendis. Magnam error ratione iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quaerat iure eum dolores repellendus voluptatum, tempore ut. Eum earum voluptatum sunt consectetur officiis quod, commodi, porro quisquam quis deserunt amet! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut doloribus minima tempora praesentium vitae accusamus facere amet. Dolores quia in saepe consequuntur tenetur neque architecto explicabo nobis, nulla porro dignissimos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ratione voluptates quae! Molestiae rerum repudiandae recusandae, voluptatem dolor delectus fuga et explicabo natus sint, praesentium, illum ipsum unde est debitis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, id ipsam officia asperiores, soluta, labore repellendus sapiente distinctio ea natus fuga eligendi repellat delectus! Quo veniam culpa nisi tenetur laborum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, exercitationem. Facere delectus temporibus ad amet asperiores sunt dolorum ipsa est, cum quaerat aspernatur nulla quibusdam nostrum, possimus labore, fugit voluptatibus"
        ],
        [
            "title"     => "Judul Post Ketiga",
            "slug"      => "judul-post-ketiga",
            "author"    => "sinta",
            "body"      => " <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique sapiente debitis nesciunt quam inventore quis, asperiores quo, quod reprehenderit natus odio atque magni tempora error, mollitia sequi recusandae perferendis magnam?
            Sapiente odit quos perferendis inventore itaque. Provident recusandae placeat vel reiciendis hic corporis, repellendus perspiciatis aspernatur porro repudiandae eos ipsam dicta vero eligendi unde quo reprehenderit voluptatum rem illo? Consequatur.
            Iusto necessitatibus sequi vero rem nobis veritatis velit distinctio accusamus minima! Dolores ducimus dicta, rem delectus laudantium voluptate quibusdam adipisci itaque error nam tenetur sint accusantium doloribus voluptatibus distinctio mollitia?
            Dolor, excepturi commodi corporis expedita adipisci sint tenetur officia sed temporibus magni error earum fuga aliquam quae, esse, exercitationem consectetur suscipit corrupti doloremque odio. Sed magni distinctio obcaecati dolor esse?
            Earum rem id a vero, aspernatur voluptas itaque incidunt exercitationem perspiciatis ipsa iure voluptate expedita obcaecati temporibus ea architecto distinctio? Dolore perspiciatis molestias dicta tempore ducimus similique. Minus, perferendis atque!
            Fuga, mollitia accusantium aspernatur voluptatum ipsum vitae cupiditate? Tempore facere fugit et quasi unde odit ea vero voluptates vitae nemo nobis, minima adipisci neque corporis corrupti excepturi, dolor, modi mollitia.
            Tempora, repudiandae quos eligendi delectus alias nesciunt doloribus deserunt inventore cumque, nemo exercitationem consectetur.</p> <p>Deserunt numquam magni eligendi ipsam commodi cupiditate voluptatibus eum molestias nemo, sed unde, dolore quae tenetur.
            Magnam culpa, animi pariatur unde similique amet quibusdam optio praesentium sapiente provident error neque voluptatum exercitationem atque dolor? Dolorem culpa obcaecati nostrum unde sapiente. Consequuntur nisi voluptas magnam dignissimos consectetur.
            Cupiditate eius, porro aliquam suscipit placeat exercitationem debitis dolores quibusdam excepturi inventore omnis facilis odit iusto. Et consequuntur obcaecati minima hic dolores neque culpa molestiae quas! Autem error aliquam vel.
            Repudiandae sint minus odio commodi, cum illum corrupti. Numquam, odit magni expedita nostrum ab eum magnam cupiditate necessitatibus possimus? Soluta sunt perspiciatis optio quaerat esse ex laboriosam veritatis nulla illum.
            Dolores magnam similique in voluptates libero iste voluptatem doloremque quisquam corrupti quae sint sit illum harum, cumque nemo beatae nulla iure minus fuga mollitia eveniet doloribus velit minima? Error, quod?
            Earum debitis sequi deleniti, quas aliquam adipisci molestiae, tenetur placeat repellat minima sapiente voluptas accusantium iste reprehenderit magnam exercitationem molestias sunt recusandae, excepturi dicta. Commodi ad at quis veritatis sapiente!
            Ratione dolor unde, praesentium obcaecati facilis molestiae veritatis voluptates laboriosam earum sit, quisquam iste, mollitia saepe. Non nemo minus aperiam provident, repellat, expedita dolorem porro neque natus molestiae maxime. Rem?
            Ad nisi voluptate nam nihil ullam id, modi error, expedita blanditiis officiis aspernatur ipsam sit culpa, maiores earum alias consequatur eius vero. Deleniti nihil aliquam, fugit cumque mollitia quibusdam placeat.
            Quam libero neque quae minima odit, laboriosam quod, nesciunt culpa omnis nobis suscipit quo voluptate voluptatem deserunt doloribus?</p><p> At dolorum ad numquam, voluptatem cum sequi quos sed quam magni sint!
            Eaque, ratione veniam sit libero cupiditate porro commodi, impedit architecto odio et sunt est dolores molestiae corporis a aliquid vel! Quaerat minima enim maiores recusandae deserunt voluptatem dolorum omnis nesciunt.
            Neque porro eum distinctio consectetur inventore minima, nisi maiores obcaecati saepe iste iusto dolorem laudantium praesentium adipisci necessitatibus ipsum officiis. Qui recusandae minus dolorum cum quisquam officiis cupiditate fuga neque.
            Nihil fuga sapiente in quae quibusdam necessitatibus eligendi consequuntur tempore corporis, non, atque laborum ratione? Nobis hic quo illo rerum, voluptatem, officiis vero iste doloribus fugit eos reiciendis error quia.
            Mollitia maiores eius neque porro id aspernatur fuga facere eveniet. Iure, quidem dolorem! Dolores fuga minus voluptate perspiciatis, recusandae possimus eum dolor sint inventore hic excepturi praesentium animi quidem ea.
            Ut distinctio dignissimos, deserunt praesentium nisi, perspiciatis nostrum dolores molestiae accusamus pariatur rem fugit quia numquam, minus eligendi quibusdam corporis corrupti recusandae quisquam neque est nam alias sapiente sunt. Perspiciatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, id ipsam officia asperiores, soluta, labore repellendus sapiente distinctio ea natus fuga eligendi repellat delectus! Quo veniam culpa nisi tenetur laborum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, exercitationem. Facere delectus temporibus ad amet asperiores sunt dolorum ipsa est, cum quaerat aspernatur nulla quibusdam nostrum, possimus labore, fugit voluptatibus</p>"
        ],
        [
            "title"     => "Judul Post Keempat",
            "slug"      => "judul-post-keempat",
            "author"    => "Sudar",
            "body"      => " Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio quam atque repellat et suscipit, laboriosam, reprehenderit reiciendis omnis hic id odio! Consectetur molestiae beatae officia perferendis. Magnam error ratione iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quaerat iure eum dolores repellendus voluptatum, tempore ut. Eum earum voluptatum sunt consectetur officiis quod, commodi, porro quisquam quis deserunt amet! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut doloribus minima tempora praesentium vitae accusamus facere amet. Dolores quia in saepe consequuntur tenetur neque architecto explicabo nobis, nulla porro dignissimos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ratione voluptates quae! Molestiae rerum repudiandae recusandae, voluptatem dolor delectus fuga et explicabo natus sint, praesentium, illum ipsum unde est debitis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, id ipsam officia asperiores, soluta, labore repellendus sapiente distinctio ea natus fuga eligendi repellat delectus! Quo veniam culpa nisi tenetur laborum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, exercitationem. Facere delectus temporibus ad amet asperiores sunt dolorum ipsa est, cum quaerat aspernatur nulla quibusdam nostrum, possimus labore, fugit voluptatibus"
        ]
    ];

    public static function all()
    {
        //return self::$blog_posts; //karena methodnya static / properti static, maka gunakan self:: (kalau dia properti biasa, menggunakan this->$blog_posts)
        // collection adalah pembungkus sebuar array yg akan membuat array menjadi lebih sakti, lebih banyak fungsi yg bisa di olah.
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all(); //mengambil method static all() diatasnya, yg berisi data2 collection 

        // self::$blog_posts; 

        // biasanya menggunakana cara ini tanpa collection
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug); //ambil satu data yg pertama ditemukan dimana field slugnya sama dengan parameter inputan slug 

    }
}
