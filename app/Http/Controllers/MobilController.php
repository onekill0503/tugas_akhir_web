<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // Mendapatkan data dari variabel search method get
        $search = \Request::get('search');
        $p = Mobil::paginate(); // mengatur pagination

        // Mendapatkan data pada database
        $mobil = \DB::table('mobil')
            ->where('merk' , 'LIKE' , '%'.$search.'%')
            ->orwhere('seri' , 'LIKE' , '%'.$search.'%')
            ->orwhere('harga' , 'LIKE' , '%'.$search.'%')
            ->orwhere('warna' , 'LIKE' , '%'.$search.'%')
            ->paginate($p->perPage());
        

        // var_dump($mobil);
        return view('mobil.index' , compact('mobil'))
            ->with('i', (request()->input('page' , 1) - 1) * $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $mobil = new Mobil();
        return view('mobil.create' , compact('mobil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //melakukan cek validasi pada data yang di terima
        request()->validate(Mobil::$rules);

        //mulai transaksi
        \DB::beginTransaction();
        try{

            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();

            $fileFoto = $request->merk . $request->seri.".".$ext;
            //menyimpan ke folder /foto_mobil
            $request->file('foto')->move("foto_mobil/", $fileFoto);

            //simpan ke tabel mobil
            \DB::table('mobil')->insert([
                'merk'=>$request->merk,
                'seri'=>$request->seri,
                'harga'=>$request->harga,
                'volume_mobil'=>$request->volume_mobil,
                'warna'=>$request->warna,
                'foto' => $fileFoto,
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s')
            ]);

            \DB::commit();
            return redirect()->route('mobil.index')
                ->with('success', 'Mobil Berhasil di Tambahkan !.');
        } catch (\Throwable $e) {
            // jika terjadi kesalahan aksi penyimpanan di batalkan
            \DB::rollback();
            
            // Fungsi ini digunakan untuk menampilkan kesalahan pada sql
            // dd($e->getMessage()); 

            return redirect()->route('mobil.index')
                ->with('success','Penyimpanan dibatalkan semua, ada kesalahan......');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $mobil = Mobil::find($id);
        return view('mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $mobil = Mobil::find($id);
        return view('mobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Menvalidasi data yang masuk
        request()->validate(Mobil::$rules);
        //mulai transaksi
        \DB::beginTransaction();
        try{
            // Mengambil data mobil
            $mobil = Mobil::find($id);
            // Jika foto tidak ada, biarkan pakai foto lama, jika ada hapus foto lama copy foto baru
            if ($request->hasFile('foto')){
                $image_path = "foto_mobil/".$mobil->foto;
                if (\File::exists($image_path)){
                    \File::delete($image_path);
                }
                $file = $request->file('foto');
                $ext = $file->getClientOriginalExtension();
                $fileFoto = $mobil->merk . $mobil->seri .".".$ext;
                $destinationPath = 'foto_mobil/';
                $file->move($destinationPath, $fileFoto);
            } else {
                $fileFoto = $mobil->foto;
            }

            // Simpan perubahan ke database.
            \DB::table('mobil')->where('id_mobil',$id)->update([
                'merk'=>$request->merk,
                'seri'=>$request->seri,
                'harga'=>$request->harga,
                'volume_mobil'=>$request->volume_mobil,
                'warna'=>$request->warna,
                'foto' => $fileFoto,
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s')
            ]);


            \DB::commit();
            return redirect()->route('mobil.index')
                ->with('success', 'Data Mobil Berhasil Diubah');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();

            // Fungsi ini digunakan untuk menampilkan kesalahan pada sql
            // dd($e->getMessage()); 

            return redirect()->route('mobil.index')
                ->with('success','Data Mobil Batal diubah, ada kesalahan');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //mulai transaksi
        \DB::beginTransaction();
        try{
            // Mengambil data mobil.
            $mobil = Mobil::find($id);

            // Menghapus file foto
            $image_path = "foto_mobil/".$mobil->foto;
            if (\File::exists($image_path)){
                \File::delete($image_path);
            }

            //hapus rekaman tabel mobil
            $Mobil_deleted = Mobil::find($id)->delete();
            \DB::commit();
            return redirect()->route('mobil.index')
                ->with('success', 'Berhasil menghapus data mobil ' . $mobil->merk);
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();

            // Fungsi ini digunakan untuk menampilkan kesalahan pada sql
            dd($e->getMessage()); 

            return redirect()->route('mobil.index')
                ->with('success', 'ada kesalahan saat menghapus data...');
        } 
    }
}
