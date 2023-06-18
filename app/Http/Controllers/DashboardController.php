<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kesatuan;
use App\Models\Pns;
use App\Models\Tni;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $usulan_tni = count(Tni::usulan());
        $usulan_pns = count(Pns::usulan());
        if ($user->role->name == 'Operator') {
            $tni = Tni::where('kesatuan_id', $user->kesatuan_id)->get();
            $pns = Pns::where('kesatuan_id', $user->kesatuan_id)->get();
        } else {
            $tni = Tni::all();
            $pns = Pns::all();
        }
        $data_tni = Tni::orderBy('id', 'desc')->limit(5)->get();
        $data_pns = Pns::orderBy('id', 'desc')->limit(5)->get();
        $kesatuan = Kesatuan::get();
        $jabatan = Jabatan::count();
        $operator = User::where('role_id', 3)->count();
        $data = array('user', 'usulan_tni', 'usulan_pns', 'tni', 'pns', 'kesatuan', 'jabatan', 'operator', 'data_tni', 'data_pns');
        return view('dashboard', compact($data));
    }
}
