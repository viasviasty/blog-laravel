<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function index()
    {
    	$data['artikel']=\App\Artikel::paginate(5);
    	return view('blog.home')->with($data);
    }
    public function detail($id)
    {
    	$data['artikel']=\App\Artikel::whereSlug($id)->first();
        $data['komentar']=\App\Komentar::whereIdArtikel($data['artikel']->id)->get();
        return view('blog.detail')->with($data);
    }
    public function home()
    {
        $data['artikel'] = \App\Artikel::paginate(10);
        return view('welcome')->with($data);

    }
    public function about()
    {
        return view('about');
    }
}
