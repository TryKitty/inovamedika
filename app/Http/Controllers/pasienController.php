<?php

namespace App\Http\Controllers;

use App\Models\pasienModel;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = pasienModel::latest()->get();
        return view('dashboard.pasien.show',compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pasien.create');
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

            'ktp' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
      ]);

       pasienModel::create($validatedData);

      if ($validatedData) {
          return redirect()
          ->route('pasien.index')
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
        $pasien = pasienModel::findOrFail($id);
        return view('dashboard.pasien.update', compact('pasien'));
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
            'ktp' =>'required',
            'nama' =>'required',
            'alamat' =>'required',

       ];


        $validatedData = $request->validate($rules);

        pasienModel::where('id',$id)
           ->update($validatedData);
        if ($validatedData) {
           return redirect()
           ->route('pasien.index')
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
       $hapus = pasienModel::findOrFail($id);
        $hapus->delete();

        if ($hapus) {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'success' => 'Berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
