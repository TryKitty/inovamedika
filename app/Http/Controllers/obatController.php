<?php

namespace App\Http\Controllers;

use App\Models\obatModel;
use Illuminate\Http\Request;

class obatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat= obatModel::latest()->get();
        return view('dashboard.obat.show',compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.obat.create');
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

            'nama' => 'required',
            'ket' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
      ]);

       obatModel::create($validatedData);

      if ($validatedData) {
          return redirect()
          ->route('obat.index')
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
        $obat = obatModel::findOrFail($id);
        return view('dashboard.obat.update', compact('obat'));
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
            'nama' => 'required',
            'ket' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',

       ];


        $validatedData = $request->validate($rules);

        obatModel::where('id',$id)
           ->update($validatedData);
        if ($validatedData) {
           return redirect()
           ->route('obat.index')
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
        $hapus = obatModel::findOrFail($id);
        $hapus->delete();

        if ($hapus) {
            return redirect()
                ->route('obat.index')
                ->with([
                    'success' => 'Berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('obat.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
