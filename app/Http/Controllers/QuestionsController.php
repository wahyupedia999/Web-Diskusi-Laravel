<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Questions;
use App\Models\Categories;
use App\Models\User;
use App\Models\Replies;
use Alert;
use File;

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show','home']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id_user = Auth::id();
        //$questions = Questions::all();
        $questions = Questions::where('id_user', '=', $id_user)->get();
        return view('question.index', ['dataPertanyaan' => $questions]);
    }

    public function home()
    {
        $questions = Questions::all();
        return view('index', ['dataPertanyaan' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();
        return view('question.create', ['dataKategori' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'min:5'],
            'isi' => ['required','min:5','max:255'],
            'file' => ['required', 'mimes:jpg,png,jpeg', 'max:2048'],
            'kategori' => ['required'],
        ]);

        $namaGambar = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $namaGambar);

        $id_user = Auth::id();

        $questions = Questions::create([
            'judul' => $request['judul'],
            'isi' => $request['isi'],
            'files' => $namaGambar,
            'id_category' => $request['kategori'],
            'id_user' => $id_user
        ]);

        $questions->save();

        Alert::success('Sukses!', 'Pertanyaan sukses ditambah');

        // dd($request);
        return redirect('questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_user = Auth::id();
        
        if($id_user != ""){
        $question = Questions::find($id);
        $filterByIdUser = Replies::where('id_user', '=', $id_user)->get();
        // dd($filterByIdUser);

        // return view('question.detail', ['dataPertanyaan' => $question]);
        return view('question.detail', ['dataPertanyaan' => $question,'dataFilter' => $filterByIdUser]);

        }else{

        $question = Questions::find($id);
        return view('question.detail', ['dataPertanyaan' => $question]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Questions::find($id);
        $category = Categories::all();
        return view('question.edit', ['dataEditPertanyaan' => $question, 'dataKategori' => $category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => ['required', 'string', 'min:5'],
            'isi' => ['required','min:5','max:255'],
            'file' => ['mimes:jpg,png,jpeg', 'max:2048'],
            'kategori' => ['required'],
        ],
        [
            'file.mimes' => "File bukan foto",
            'file.max' => "File tidak boleh lebih dari 2MB"
        ]);

        $questions = Questions::find($id);

        if ($request->has('file')) {
            $path = '/uploads/';
            File::delete($path. $questions->files);

            $namaFiles = time().'.'.$request->file->extension();

            $request->file->move(public_path('uploads'), $namaFiles);

            $questions->files = $namaFiles;

            $questions->save();
        }

        //$id_user = Auth::id();

        $questions->judul = $request['judul'];
        $questions->isi = $request['isi'];
        //$questions->files = $namaFiles;
        $questions->id_category = $request['kategori'];

        $questions->save();

        Alert::success('Sukses!', 'Pertanyaan sukses diubah');
        
        return redirect('questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = Questions::find($id);

        $path = '/uploads/';
        File::delete($path. $questions->files);

        $questions->delete();

        Alert::success('Sukses!', 'Pertanyaan sukses dihapus');

        return redirect('/questions');
    }
}
