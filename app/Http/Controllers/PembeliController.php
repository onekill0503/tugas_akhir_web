<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // Mendapatkan data dari variabel search method get
        $search = \Request::get('search');
        $p = Pembeli::paginate(); // mengatur pagination

        //menjalankan query builder
        $tx = \DB::table('pembeli')
            ->distinct()
            ->where('pembeli.nama_pembeli','LIKE','%'.$search.'%')
            ->orwhere('pembeli.alamat_pembeli','LIKE','%'.$search.'%')
            ->orWhere('pembeli.email','LIKE', '%'.$search.'%')
            ->orWhere('pembeli.telepon','LIKE', '%'.$search.'%')
            ->paginate($p->perPage());

        // var_dump($mobil);
        return view('pembeli.index' , compact('tx'))
            ->with('i', (request()->input('page' , 1) - 1) * $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
