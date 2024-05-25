<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::paginate(10);

        return view('pages.gallery.index', [
            'gallery' => $gallery
        ]);
    }

    public function create()
    {
        $product = Product::all();
        return view('pages.gallery.create', [
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['photos'] = $request->file('photos')->store('assets/gallery', 'public');
        Gallery::create($data);

        return redirect()->route('dashboard.gallery.index');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('dashboard.gallery.index');
    }
}
