<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Auth;

class ArtikelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$data['artikel'] = \App\Artikel::where('id_user',Auth::user()->id)->paginate(10);
    	return view('artikel.all')->with($data);
    }
    public function add()
    {
    	return view('artikel.add');
    }
    public function save()
    {
    	$a = new \App\Artikel;
        $a->slug = str_slug(Input::get('judul'));
    	$a->judul = Input::get('judul');
    	$a->isi = Input::get('isi');
        $a->id_user = Auth::user()->id;
        $a->sampul ='';
        if(Input::hasFile('sampul')){
            $sampul = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('sampul')->getClientOriginalExtension();
            Input::file('sampul')->move(storage_path('sampul'),$sampul);
            $a->sampul = $sampul;
        }
    	$a->save();
    	return redirect(url('artikel'));
    }
    public function komentar()
    {
        $a = new \App\Komentar;
        $a->isi = Input::get('isi');
        $a->id_artikel = Input::get('id_artikel');
        $a->id_user = Auth::user()->id;
        $a->save();
        $key = \App\Artikel::find(Input::get('id_artikel'));
        return  redirect(url($key->slug));
            
    }   
    public function hapuskomentar($id)
    {
        $a = \App\Komentar::find($id);
        $key = \App\Artikel::find($a->id_artikel);
        $a->delete();
        return redirect(url($key->slug));  
    }
    public function edit($id)
    {
    	$data['artikel']=\App\Artikel::find($id);
		return view('artikel.edit')->with($data);

    }
    public function update()
    {
    	$a = \App\Artikel::find(Input::get('id'));
        $a->slug = str_slug(Input::get('judul'));
    	$a->judul = Input::get('judul');
    	$a->isi = Input::get('isi');
        if(Input::hasFile('sampul')){
            $sampul = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('sampul')->getClientOriginalExtension();
            Input::file('sampul')->move(storage_path('sampul'),$sampul);
            $a->sampul = $sampul;
        }
    	$a->save();
    	return redirect(url('artikel'));
    }
    public function delete($id)
    {
    	$a = \App\Artikel::find($id);
    	$a->delete();

    	return redirect(url('artikel'));
    }
}
