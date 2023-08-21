<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Alert;

class ProfileController extends Controller
{

    public function index()
    {
    	$id_user = Auth::id();

        $profile = Profile::where('id_user', $id_user)->first();
        
        return view('profiles.index', ['dataProfile' => $profile]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'ttl' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
            'pekerjaan' => ['required']
        ]);

        $profile = Profile::find($id);

        $id_user = Auth::id();

        $profile->nama = $request->nama;
        $profile->ttl = $request->ttl;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->alamat = $request->alamat;
        $profile->pekerjaan = $request->pekerjaan;
        $profile->id_user = $id_user;


        $profile->save();

        Alert::success('Sukses!', 'Data berhasil diedit');

        return redirect('/profile');
    }
}
