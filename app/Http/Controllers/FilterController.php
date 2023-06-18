<?php

namespace App\Http\Controllers;

use App\Models\Tni;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $tni = $this->filter($request->val);
        return view('tni.filter', compact('tni'));
    }

    private function filter($kesatuan): array
    {
        $countTni = Tni::where('is_usulan', true)->where('kesatuan_id', $kesatuan)->get();
        $data = [];
        $i = 0;
        foreach ($countTni as $row) {
            if ($row->status == 'Perwira') {
                $tgl = date('Y-m-d', strtotime('+57 years', strtotime($row->tgl_lahir)));
            } else {
                $tgl = date('Y-m-d', strtotime('+52 years', strtotime($row->tgl_lahir)));
            }
            if ($tgl <= date('Y-m-d')) {
                $data[$i]['slug'] = $row->slug;
                $data[$i]['kesatuan'] = $row->kesatuan->name ?? '-';
                $data[$i]['jabatan'] = $row->jabatan->name ?? '-';
                $data[$i]['gol_jab'] = $row->gol_jab;
                $data[$i]['nama'] = $row->nama;
                $data[$i]['pangkat'] = $row->pangkat;
                $data[$i]['korps'] = $row->korps;
                $data[$i]['nrp'] = $row->nrp;
                $data[$i]['status_usulan'] = $row->usulanTni->status ?? null;
                $data[$i]['surat_sk'] = $row->suratSk->name ?? null;
            }
            $i++;
        }
        return $data;
    }
}
