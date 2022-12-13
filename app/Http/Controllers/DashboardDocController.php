<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        // return view('dashboard.documents.download', compact('documents'));
        return view('dashboard.documents.index', [
            'documents' => $documents,
            compact('documents')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.documents.create', [
            'types' => Type::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // +files: Symfony\Component\HttpFoundation\FileBag {#48 ▼
        //     #parameters: array:1 [▼
        //       "image" => Symfony\Component\HttpFoundation\File\UploadedFile {#33 ▼
        //         -test: false
        //         -originalName: "Surat Upacara Hari Sumpah Pemuda 2022.pdf"
        //         -mimeType: "application/pdf"
        //         -error: 0
        //         path: "C:\xampp\tmp"
        //         filename: "php906A.tmp"
        //         basename: "php906A.tmp"
        //         pathname: "C:\xampp\tmp\php906A.tmp"
        //         extension: "tmp"
        //         realPath: "C:\xampp\tmp\php906A.tmp"
        //         aTime: 2022-11-24 14:08:31
        //         mTime: 2022-11-24 14:08:31
        //         cTime: 2022-11-24 14:08:31
        //         inode: 6755399441129711
        //         size: 116984
        //         perms: 0100666
        //         owner: 0
        //         group: 0
        //         type: "file"
        //         writable: true
        //         readable: true
        //         executable: false
        //         file: true
        //         dir: false
        //         link: false
        //         linkTarget: "C:\xampp\tmp\php906A.tmp"
        //       }
        //     ]



        $validatedData = $request->validate([
            'date_doc' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:documents', //untuk menjaga user edit slug, akan di cek kembali sdh ada atau belum data slugnya
            'type_id' => 'required',
            // 'image' => 'file|max:1024', //harus dikasih file|max supaya mendeteksi Kilobyte nya, bukan integer serperti title dll.
            'image' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
            'description' => ''
        ]);


        if ($request->file('image')) { //kalau request file image ada isinya / true, jalankan penyimpanan ini / kalau false alias tidak ada file yg di upload, maka nantinya yg tampil adalah API gambar dari unsplash

            // $fileName = date(now()) . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->getClientOriginalExtension();
            $fileName = date('Y-m-d', strtotime(now())) . '-' . $request->file('image')->getClientOriginalName();
            // $validatedData['image'] = $request->file('image')->store('post-images', $fileName);
            $validatedData['image'] = $request->file('image')->storeAs('file', $fileName);
        }

        $validatedData['uploaded_at'] = date(now());
        $validatedData['user_id'] = auth()->user()->id;

        // dd($validatedData);

        Document::create($validatedData);

        return redirect('/dashboard/documents')->with('success', 'Dokumen baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        // tempat download
        // $download = Document::all();
        // return view('dashboard.documents.download', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {

        if ($document->image) { // kalau data gambar lamanya ada, maka akan dihapus dulu 
            Storage::delete($document->image);
        }

        Document::destroy($document->id);
        return redirect('/dashboard/documents')->with('success', 'Document has been deleted');

        //sekalian hapus file storage blum
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Document::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]); //dikasih data dalam bentuk json, supaya bisa di olah di script create.blade.php
    }
}
