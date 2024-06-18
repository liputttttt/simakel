<?php

namespace App\Http\Controllers;
use App\suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class SuratMasukController extends Controller
{
    
    public function home (){
        return view('home',['key' => "home"]);
    }
    
    public function suratmasuk(){
        $suratmasuk  = suratmasuk::orderBy('id','desc')->get();
        return view('suratmasuk',['key' => "suratmasuk", 'suratmasuk'=>$suratmasuk ]);
    }

    public function tambahsurat(){
        return view('tambahsurat',['key' => "tambahsurat"]);
    }

    public function upload(Request $request){
        // mengambail nama file 
        $nama_file = time().'-'.$request->file('brkas')->getClientOriginalName();
        // menyimpan file kedalam folder 
        $path = $request->file('brkas')->storeAs('brkas',$nama_file,'public');
        
        suratmasuk::create([
        'nosurat' => $request -> nosurat,
        'tgl' => $request -> tgl,
        'kirim' => $request -> kirim,
        'brkas' => $path
        ]);
        return redirect("/suratmasuk")->with('alert','Data berhasil ditambahkan');
    }

    public function edit($id){
        $suratmasuk = suratmasuk::find($id);
       return view('edit',['key' => "edit","em"=> $suratmasuk]);        
    }
    public function update($id, Request $request){
        $mv = suratmasuk::find($id);
        $mv->nosurat = $request->nosurat;
        $mv->tgl = $request->tgl;
        $mv->kirim = $request->kirim;
        
        if($request->brkas){
            if($mv->brkas){
                Storage::disk('public')->delete($mv->brkas);
            }
            $nama_file = time().'-'.$request->file('brkas')->getClientOriginalName();
            // menyimpan file kedalam folder 
            $path = $request->file('brkas')->storeAs('brkas',$nama_file,'public');
            $mv->brkas = $path;    
        }
        $mv->save();
       return redirect('/suratmasuk')->with('alert','Data berhasil diedit');;        
    }

    public function delete($id){
        $mv = suratmasuk::find($id);
        if($mv->brkas){
            Storage::disk('public')->delete($mv->brkas);
        }
        $mv->delete();
        return redirect('/suratmasuk')->with('alert','Data berhasil dihapus');;

    }

    public function login(){
        return view('login');
    }

    public function edituser(){
        return view('edituser',["key" => ""]);
    }

    public function updateuser(Request $request){
        if($request -> passwordbaru == $request->confirmasipassword){
            $user = Auth::user();
            $user->password = bcrypt($request->passwordbaru);
            $user->save();
            return redirect('/edituser')->with('alert','Password berhasil diubah');
        }else{
            return redirect('/edituser')->with('alert','Password gagal diubah');
        }

    }

    public function searchsurat(){

        return view('searchsurat');
    }

    public function actsearchsuratmasuk(Request $request){
        $cari = $request->input('cari');
        // return $cari;
        $suratmasuk = suratmasuk::where('title','LIKE','%'.$cari.'%')->get();
        return view('searchsurat',['suratmasuk' => $suratmasuk]);
    }
}
