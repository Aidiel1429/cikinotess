<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::orderBy('created_at', 'asc')->get();
        $pemasukan = Transaksi::sum('pemasukan');
        $pengeluaran = Transaksi::sum('pengeluaran');
        $untung = $pemasukan - $pengeluaran;
        return view('dashboard', compact('data', 'untung', 'pemasukan', 'pengeluaran'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Pulsa', 'Uang Elektronik', 'Voucher Game'];
        $statuses = ['Lunas', 'Belum Lunas'];
        return view('tambah', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'buyerName' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Pulsa,Uang Elektronik,Voucher Game',
            'status' => 'required|in:Lunas,Belum Lunas'
        ], [
            'nama.required' => 'Input Nama Harus diisi',
            'nama.max' => 'Nama maksimal 50 Karakter',
            'buyerName.required' => 'Data Harus Diisi',
            'pemasukan.required' => 'Input Pemasukan Harus diisi',
            'pengeluaran.required' => 'Input Pengeluaran Harus diisi',
            'tanggal.required' => 'Input Tanggal Harus diisi',
            'tanggal.date' => 'Input Harus Berupa Format Tanggal',
            'kategori.required' => 'Input Kategori Harus diisi',
            'kategori.in' => 'Tidak Termasuk kedalam Kategori',
            'status.required' => 'Input Status Harus diisi',
            'status.in' => 'Tidak termasuk kedalam Status'
        ]);

        $data = [
            'nama' => $request->nama,
            'buyerName' => $request->buyerName,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'status' => $request->status
        ];

        Transaksi::create($data);

        if ($request->status == 'belum lunas') {
            // Logika untuk hutang
            // Tambahkan logika penyimpanan hutang di sini jika diperlukan
            return redirect()->route('hutang.dashboard')
                ->with('success', 'Transaksi berhasil ditambahkan dan dimasukkan ke hutang.');
        } else {
            return redirect()->route('dashboard')
                ->with('success', 'Transaksi berhasil ditambahkan.');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = ['Pulsa', 'Uang Elektronik', 'Voucher Game'];
        $statuses = ['Lunas', 'Belum Lunas'];
        $data = Transaksi::find($id);
        return view('edit', compact('data', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'pemasukan' => 'required|numeric',
            'pengeluaran' => 'required|numeric',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Pulsa,Uang Elektronik,Voucher Game',
            'status' => 'required|in:Lunas,Belum Lunas'
        ], [
            'nama.required' => 'Input Nama Harus diisi',
            'nama.max' => 'Nama maksimal 50 Karakter',
            'pemasukan.required' => 'Input Pemasukan Harus diisi',
            'pemasukan.numeric' => 'Pemasukan Harus Berupa Angka',
            'pengeluaran.required' => 'Input Pengeluaran Harus diisi',
            'pengeluaran.numeric' => 'pengeluaran Harus Berupa Angka',
            'tanggal.required' => 'Input Tanggal Harus diisi',
            'tanggal.date' => 'Input Harus Berupa Format Tanggal',
            'kategori.required' => 'Input Kategori Harus diisi',
            'kategori.in' => 'Tidak Termasuk kedalam Kategori',
            'status.required' => 'Input Status Harus diisi',
            'status.in' => 'Tidak termasuk kedalam Status'
        ]);

        $data = [
            'nama' => $request->nama,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'status' => $request->status
        ];

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        if ($request->status == 'lunas') {
            return redirect()->route('dashboard')
                ->with('success', 'Transaksi berhasil diperbarui dan hutang dihapus.');
        } else {
            return redirect()->route('hutang.dashboard')
                ->with('success', 'Transaksi berhasil diperbarui .');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findorFail($id);
        $transaksi->delete();
        return redirect()->route('dashboard')->with('success', 'Data Berhasil di Hapus');
    }
}