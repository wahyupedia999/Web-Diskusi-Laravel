<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Replies;
use App\Models\Questions;
use Alert;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function index()
    {
        $id_user = Auth::id();
        //$questions = Questions::all();
        $replies = Replies::where('id_user', '=', $id_user)->get();
        return view('replies.index', ['dataKomentar' => $replies]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required',
        ]);

        $id_user = Auth::id();

        $replies = new Replies;

        $replies->balasan = $request->balasan;
        $replies->id_pertanyaan = $id;
        $replies->id_user = $id_user;

        $replies->save();

        Alert::success('Sukses!', 'Komentar berhasil ditambahkan');

        return redirect('/questions/'. $id);
    }

    public function edit($id)
    {
        $replies = Replies::find($id);

        //$questions = Questions::find($id);
        // return view('replies.edit', ['dataEditKomentar' => $replies, 'dataPertanyaan' => $questions]);
        return view('replies.edit', ['dataEditKomentar' => $replies]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'balasan' => ['required']
        ]);

        $replies = Replies::find($id);

        $replies->balasan = $request['balasan'];

        $replies->save();

        Alert::success('Sukses!', 'Komentar sukses diubah');
        
        return redirect('/questions/'. $replies->id_pertanyaan);
    }

    public function destroy($id)
    {
        $replies = Replies::find($id);

        $replies->delete();

        Alert::success('Sukses!', 'Komentar sukses dihapus');

        return redirect('/questions/'. $replies->id_pertanyaan);
    }
}
