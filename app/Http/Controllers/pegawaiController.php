<?php

namespace App\Http\Controllers;

use App\Models\pegawaiModel;
use Illuminate\Http\Request;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai= pegawaiModel::latest()->get();
        return view('dashboard.pegawai.show',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate ([

            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
      ]);

       pegawaiModel::create($validatedData);

      if ($validatedData) {
          return redirect()
          ->route('pegawai.index')
          ->with([
              'Success'=> 'Data berhasil dimasukan'
          ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error'=>"data bermasalah,silahkan coba kembali"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = pegawaiModel::findOrFail($id);
        return view('dashboard.pegawai.update', compact('pegawai'));
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
        $rules = [
            'nip' =>'required',
            'nama' =>'required',
            'alamat' =>'required',

       ];


        $validatedData = $request->validate($rules);

        pegawaiModel::where('id',$id)
           ->update($validatedData);
        if ($validatedData) {
           return redirect()
           ->route('pegawai.index')
           ->with([
               'Success'=> 'Data berhasil dimasukan'
           ]);
         } else {
             return redirect()
             ->back()
             ->withInput()
             ->with([
                 'error'=>"data bermasalah,silahkan coba kembali"
             ]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = pegawaiModel::findOrFail($id);
        $hapus->delete();

        if ($hapus) {
            return redirect()
                ->route('pegawai.index')
                ->with([
                    'success' => 'Berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('pegawai.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
