<?php

namespace App\Http\Controllers;

use App\Models\Pns;
use App\Models\SuratSk;
use App\Models\Tni;
use App\Models\UsulanPns;
use App\Models\UsulanTni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class UploadController extends Controller
{
    public function SkTni(Request $request)
    {
        $data = $request->only(['slug', 'srt_sk']);
        $validator = Validator::make($data, [
            'srt_sk' => 'required|mimes:pdf|max:3072'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $surat = $request->file('srt_sk');
        $fileName = rand() . time() . '.' . $surat->getClientOriginalExtension();
        $tni = Tni::whereSlug($request->slug)->first();
        $surat->move('uploads/sk', $fileName);
        $suratSk = SuratSk::create(['name' => $fileName]);
        $tni->update(['surat_sk_id' => $suratSk->id]);
        UsulanTni::find($tni->usulan_tni_id)->update(['status' => 'SELESAI']);

        return redirect()->route('usulan-tni.index')->with('message', 'Upload Surat SK berhasil');
    }

    public function SkPns(Request $request)
    {
        $data = $request->only(['slug', 'srt_sk']);
        $validator = Validator::make($data, [
            'srt_sk' => 'required|mimes:pdf|max:3072'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $surat = $request->file('srt_sk');
        $fileName = rand() . time() . '.' . $surat->getClientOriginalExtension();
        $pns = Pns::whereSlug($request->slug)->first();
        $surat->move('uploads/sk', $fileName);
        $suratSk = SuratSk::create(['name' => $fileName]);
        $pns->update(['surat_sk_id' => $suratSk->id]);
        UsulanPns::find($pns->usulan_pns_id)->update(['status' => 'SELESAI']);

        return redirect()->route('usulan-pns.index')->with('message', 'Upload Surat SK berhasil');
    }
}
