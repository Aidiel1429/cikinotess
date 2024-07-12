<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hutang = Transaksi::where('status', 'belum lunas')->get();
        $totalHutang = 0;
        foreach ($hutang as $data) {
            $totalHutang += $data->pemasukan;
        }
    
        return view('hutang', compact('hutang', 'totalHutang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
