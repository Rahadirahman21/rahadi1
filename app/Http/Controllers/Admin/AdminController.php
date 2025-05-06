<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggar;
use Illuminate\Support\Facades;

class AdminController extends Controller
{
    public function index()
    {
        $pelanggars = $this->top10Pelanggar();
        $hitung = $this->top10Pelanggar();
        list($jmlSiswas,$jmlPelanggars) = $this->countDash();
        return view('admin.dashboard',compact('pelanggars','hitung','jmlSiswas','jmlPelanggars'));
    }
    public function top10Pelanggar(){
        $pelanggars = DB::table('pelanggars')
        ->join('siswas','pelanggars.id_siswa','=','siswas.id')
        ->join('users','siswas.id_user','=','users.id')
        ->select(
            'pelanggars.*',
            'siswas.image',
            'siswas.nis',
            'siswas.tingkatan',
            'siswas.jurusan',
            'siswas.kelas',
            'siswas.hp',
            'users.name',
            'users.email',
        )->where('pelanggars.poin_pelanggar','>=','45')->orderBy('pelanggars.poin_pelanggar','DESC')->take(10)->get()
    }
}
