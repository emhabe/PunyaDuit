<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function dashboard(){
        $data=Saldo::firstOrFail();
        $saldo=Saldo::all();
        return view('dashboard',compact('data','saldo'));
    }
    public function tambahSaldo(){
        return view('tambah-saldo');
    }
    public function store(Request $request){
     $saldo=Saldo::create([
        'jumlah_saldo'=>$request->jumlah_saldo,
     ]);  
     return redirect ('dashboard');
    }
    public function cetak(){
        $saldo=Saldo::all();
        $pdf=Pdf::loadview('cetak',compact('saldo'));
        return $pdf->download('laporan.pdf');
    }

    
}
