<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Memanggil Model yang diperlukan
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\Pembeli;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mendapatkan data dari variabel search method get
        $search = \Request::get('search');
        $p = Transaksi::paginate(); // mengatur pagination

        //menjalankan query builder
        $tx = \DB::table('transaksi')
            ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
            ->join('mobil' , 'transaksi.id_mobil' , '=' , 'mobil.id_mobil')
            ->select('transaksi.id_transaksi', 'transaksi.metode_pembayaran' , 'transaksi.total_pembayaran' ,'pembeli.nama_pembeli','mobil.merk', 'mobil.seri')
            ->where('pembeli.nama_pembeli','LIKE','%'.$search.'%')
            ->orwhere('pembeli.alamat_pembeli','LIKE','%'.$search.'%')
            ->orWhere('pembeli.email','LIKE', '%'.$search.'%')
            ->orWhere('pembeli.telepon','LIKE', '%'.$search.'%')
            ->orWhere('mobil.merk','LIKE', '%'.$search.'%')
            ->orWhere('mobil.seri','LIKE', '%'.$search.'%')
            ->paginate($p->perPage());

        // var_dump($mobil);
        return view('transaksi.index' , compact('tx'))
            ->with('i', (request()->input('page' , 1) - 1) * $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembeli= new Pembeli();
        $mobil = \DB::table('mobil')->pluck('merk','id_mobil');
        $transaksi = new Transaksi();
        return view('transaksi.create', compact('transaksi','pembeli','mobil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cek validasi masukan
        request()->validate(Transaksi::$rules);

        //mulai transaksi
        \DB::beginTransaction();
        try{
            //menjalankan query builder untuk menyimpan ke tabel transaksi

            $detail_mobil = Mobil::find($request->id_mobil);

            $PB_insert = \DB::table('pembeli')->insertGetId([
                'nama_pembeli' => $request->nama_pembeli,
                'alamat_pembeli' => $request->alamat_pembeli,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);

            \DB::table('transaksi')->insert([
                'id_pembeli'=>$PB_insert,
                'id_mobil'=>$request->id_mobil,
                'metode_pembayaran'=>$request->metode_pembayaran,
                'jumlah_pembelian'=>$request->jumlah_pembelian,
                'total_pembayaran'=>($request->jumlah_pembelian * $detail_mobil->harga),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);

            //jika tidak ada kesalahan commit/simpan
            \DB::commit();
            // mengembalikan tampilan ke view index (halaman sebelumnya)
            return redirect()->route('transaksi.index')
                ->with('success', 'Transaksi Berhasil di Simpan!');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();

            // Fungsi ini digunakan untuk menampilkan kesalahan pada sql
            // dd($e->getMessage()); 

            return redirect()->route('transaksi.index')
                ->with('success', 'Penyimpanan Transaksi dibatalkan, ada kesalahan...');
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
        $tx = Transaksi::find($id);
        $pembeli = Pembeli::find($tx->id_pembeli);
        $mobil = Mobil::find($tx->id_mobil);

        return view('transaksi.show', compact('tx','pembeli','mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $pembeli= Pembeli::find($transaksi->id_pembeli);
        $mobil = \DB::table('mobil')->pluck('merk','id_mobil');
        
        //menampikan 1 rekaman ke view edit
        return view('transaksi.edit', compact('transaksi','mobil','pembeli'));
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
        request()->validate(Transaksi::$rules);
        //mulai transaksi
        \DB::beginTransaction();
        try{
            $tx = Transaksi::find($id);
            $detail_mobil = Mobil::find($request->id_mobil);
            \DB::table('pembeli')->where('id_pembeli' , $tx->id_pembeli)->update([
                'nama_pembeli' => $request->nama_pembeli,
                'alamat_pembeli' => $request->alamat_pembeli,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
            \DB::table('transaksi')->where('id_transaksi',$id)->update([
                'id_pembeli'=>$tx->id_pembeli,
                'id_mobil'=>$request->id_mobil,
                'metode_pembayaran'=>$request->metode_pembayaran,
                'jumlah_pembelian'=>$request->jumlah_pembelian,
                'total_pembayaran'=>($request->jumlah_pembelian * $detail_mobil->harga),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);

            \DB::commit();
            //mengembalikan tampilan ke view index (halaman sebelumnya)
            return redirect()->route('transaksi.index')
                ->with('success', 'Data Transaksi berhasil diubah');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();

            // Fungsi ini digunakan untuk menampilkan kesalahan pada sql
            dd($e->getMessage()); 

            return redirect()->route('transaksi.index')
                ->with('success', 'Data Transaksi batal diubah, ada kesalahan');
        }
    }

    public function cetak($id){
        $transaksi = Transaksi::find($id);
        $pembeli= Pembeli::find($transaksi->id_pembeli);
        $mobil = Mobil::find($transaksi->id_mobil);
        
        //menampikan 1 rekaman ke view edit
        return view('transaksi.cetak', compact('transaksi','mobil','pembeli'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //mulai transaksi
        \DB::beginTransaction();
        try{
            // Mengambil data transaksi
            $data_tx = Transaksi::find($id);
            // Menghapus data pembeli
            $pembeli_deleted = Pembeli::find($data_tx->id_pembeli)->delete();
            //hapus rekaman tabel Transaksi
            $tx_deleted = Transaksi::find($id)->delete();
            \DB::commit();
            return redirect()->route('transaksi.index')
                ->with('success', 'Berhasil menghapus data Transaksi ');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();

            // Fungsi ini digunakan untuk menampilkan kesalahan pada sql
            // dd($e->getMessage()); 

            return redirect()->route('transaksi.index')
                ->with('success', 'ada kesalahan saat menghapus data...');
        } 
    }
}
