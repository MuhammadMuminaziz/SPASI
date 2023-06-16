<?php

namespace App\Http\Controllers;

use App\Models\NotePns;
use App\Models\Pns;
use App\Models\UsulanPns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsulanPnsController extends Controller
{
    public function pns()
    {
        $pns = Pns::usulan();
        return view('usulan.pns.index', compact('pns'));
    }

    public function create($slug)
    {
        $pns = Pns::whereSlug($slug)->first();
        return view('usulan.pns.create', compact('pns'));
    }

    public function store(Request $request)
    {
        $data = $request->only(array_merge($this->data(), array('pns_id', 'status')));
        $validator = Validator::make($data, $this->validation(), $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $dpcp           = $request->file('dpcp');
        $kep_cpns       = $request->file('kep_cpns');
        $kep_pns        = $request->file('kep_pns');
        $kep_pangkat    = $request->file('kep_pangkat');
        $akte_nikah     = $request->file('akte_nikah');
        $akte_anak      = $request->file('akte_anak');
        $sp_hd          = $request->file('sp_hd');
        $sk_kematian    = $request->file('sk_kematian');
        $kk             = $request->file('kk');
        $kgb            = $request->file('kgb');
        $ppk            = $request->file('ppk');

        foreach ($this->data() as $row) {
            $data[$row] = rand() . time() . ".pdf";
        }

        $data['status'] = 'VERIFIKASI';
        $pns = Pns::find($data['pns_id']);
        $usulan = UsulanPns::create($data);
        $pns->update(['usulan_pns_id' => $usulan->id, 'is_usulan' => true]);

        $dpcp->move('uploads/pns', $data['dpcp']);
        $kep_cpns->move('uploads/pns', $data['kep_cpns']);
        $kep_pns->move('uploads/pns', $data['kep_pns']);
        $kep_pangkat->move('uploads/pns', $data['kep_pangkat']);
        $akte_nikah->move('uploads/pns', $data['akte_nikah']);
        $akte_anak->move('uploads/pns', $data['akte_anak']);
        $sp_hd->move('uploads/pns', $data['sp_hd']);
        if ($request->file('sk_kematian')) {
            $sk_kematian->move('uploads/pns', $data['sk_kematian']);
        }
        $kk->move('uploads/pns', $data['kk']);
        $kgb->move('uploads/pns', $data['kgb']);
        $ppk->move('uploads/pns', $data['ppk']);

        return redirect()->route('usulan-pns.index')->with('message', 'Pengusulan SKEP berhasil');
    }

    public function verify($slug)
    {
        $pns = Pns::whereSlug($slug)->first();
        $usulan = UsulanPns::find($pns->usulan_pns_id);
        return view('usulan.pns.verify', compact('pns', 'usulan'));
    }

    public function verifyUsulan(Request $request)
    {
        $data = $request->only(['note_dpcp', 'note_kep_cpns', 'note_kep_pns', 'note_kep_pangkat', 'note_akte_nikah', 'note_akte_anak', 'note_sp_hd', 'note_sk_kematian', 'note_kk', 'note_kgb', 'note_ppk']);

        foreach ($data as $key => $val) {
            if ($val != null) {
                $status = 'GAGAL_VERIFIKASI';
                break;
            } else {
                $status = 'MENUNGGU_SK';
            }
        }

        $usulan = UsulanPns::find($request->usulan_pns_id);
        $note = NotePns::create($data);
        $usulan->update(['note_pns_id' => $note->id, 'status' => $status]);

        return redirect()->route('usulan-pns.index')->with('message', 'Status usulan berhasil diubah');
    }

    public function revisi($slug)
    {
        $pns = Pns::whereSlug($slug)->first();
        $usulan = UsulanPns::find($pns->usulan_pns_id);
        return view('usulan.pns.edit', compact('pns', 'usulan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(array_merge($this->data(), array('note_pns_id')));
        $validator = Validator::make($data, [
            'dpcp' => $request->dpcp != null ? 'required|mimes:pdf|max:3072' : '',
            'kep_cpns' => $request->kep_cpns != null ? 'required|mimes:pdf|max:3072' : '',
            'kep_pns' => $request->kep_pns != null ? 'required|mimes:pdf|max:3072' : '',
            'kep_pangkat' => $request->kep_pangkat != null ? 'required|mimes:pdf|max:3072' : '',
            'akte_nikah' => $request->akte_nikah != null ? 'required|mimes:pdf|max:3072' : '',
            'akte_anak' => $request->akte_anak != null ? 'required|mimes:pdf|max:3072' : '',
            'sp_hd' => $request->sp_hd != null ? 'required|mimes:pdf|max:3072' : '',
            'sk_kematian' => $request->sk_kematian != null ? 'mimes:pdf|max:3072' : '',
            'kk' => $request->kk != null ? 'required|mimes:pdf|max:3072' : '',
            'kgb' => $request->kgb != null ? 'required|mimes:pdf|max:3072' : '',
            'ppk' => $request->ppk != null ? 'required|mimes:pdf|max:3072' : '',
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $dpcp           = $request->file('dpcp');
        $kep_cpns       = $request->file('kep_cpns');
        $kep_pns        = $request->file('kep_pns');
        $kep_pangkat    = $request->file('kep_pangkat');
        $akte_nikah     = $request->file('akte_nikah');
        $akte_anak      = $request->file('akte_anak');
        $sp_hd          = $request->file('sp_hd');
        $sk_kematian    = $request->file('sk_kematian');
        $kk             = $request->file('kk');
        $kgb            = $request->file('kgb');
        $ppk            = $request->file('ppk');

        $new_data['status'] = 'VERIFIKASI';
        $usulan = UsulanPns::find($id);

        if ($dpcp != null) {
            unlink('uploads/pns/' . $usulan->dpcp);
            $new_data['dpcp'] = rand() . time() . ".pdf";
            $dpcp->move('uploads/pns', $new_data['dpcp']);
        }
        if ($kep_cpns != null) {
            unlink('uploads/pns/' . $usulan->kep_cpns);
            $new_data['kep_cpns'] = rand() . time() . ".pdf";
            $kep_cpns->move('uploads/pns', $new_data['kep_cpns']);
        }
        if ($kep_pns != null) {
            unlink('uploads/pns/' . $usulan->kep_pns);
            $new_data['kep_pns'] = rand() . time() . ".pdf";
            $kep_pns->move('uploads/pns', $new_data['kep_pns']);
        }
        if ($kep_pangkat != null) {
            unlink('uploads/pns/' . $usulan->kep_pangkat);
            $new_data['kep_pangkat'] = rand() . time() . ".pdf";
            $kep_pangkat->move('uploads/pns', $new_data['kep_pangkat']);
        }
        if ($akte_nikah != null) {
            unlink('uploads/pns/' . $usulan->akte_nikah);
            $new_data['akte_nikah'] = rand() . time() . ".pdf";
            $akte_nikah->move('uploads/pns', $new_data['akte_nikah']);
        }
        if ($akte_anak != null) {
            unlink('uploads/pns/' . $usulan->akte_anak);
            $new_data['akte_anak'] = rand() . time() . ".pdf";
            $akte_anak->move('uploads/pns', $new_data['akte_anak']);
        }
        if ($sp_hd != null) {
            unlink('uploads/pns/' . $usulan->sp_hd);
            $new_data['sp_hd'] = rand() . time() . ".pdf";
            $sp_hd->move('uploads/pns', $new_data['sp_hd']);
        }
        if ($request->file('sk_kematian')) {
            unlink('uploads/pns/' . $usulan->sk_kematian);
            $new_data['sk_kematian'] = rand() . time() . ".pdf";
            $sk_kematian->move('uploads/pns', $new_data['sk_kematian']);
        }
        if ($request->file('kk')) {
            unlink('uploads/pns/' . $usulan->kk);
            $new_data['kk'] = rand() . time() . ".pdf";
            $kk->move('uploads/pns', $new_data['kk']);
        }
        if ($request->file('kgb')) {
            unlink('uploads/pns/' . $usulan->kgb);
            $new_data['kgb'] = rand() . time() . ".pdf";
            $kgb->move('uploads/pns', $new_data['kgb']);
        }
        if ($request->file('ppk')) {
            unlink('uploads/pns/' . $usulan->ppk);
            $new_data['ppk'] = rand() . time() . ".pdf";
            $ppk->move('uploads/pns', $new_data['ppk']);
        }

        NotePns::find($request->note_pns_id)->update($this->note());
        $usulan->update($new_data);
        return redirect()->route('usulan-pns.index')->with('message', 'Pengusulan SKEP berhasil');
    }

    private function data(): array
    {
        return array('dpcp', 'kep_cpns', 'kep_pns', 'kep_pangkat', 'akte_nikah', 'akte_anak', 'sp_hd', 'sk_kematian', 'kk', 'kgb', 'ppk');
    }

    private function validation(): array
    {
        return [
            'dpcp' => 'required|mimes:pdf|max:3072',
            'kep_cpns' => 'required|mimes:pdf|max:3072',
            'kep_pns' => 'required|mimes:pdf|max:3072',
            'kep_pangkat' => 'required|mimes:pdf|max:3072',
            'akte_nikah' => 'required|mimes:pdf|max:3072',
            'akte_anak' => 'required|mimes:pdf|max:3072',
            'sp_hd' => 'required|mimes:pdf|max:3072',
            'sk_kematian' => 'mimes:pdf|max:3072',
            'kk' => 'required|mimes:pdf|max:3072',
            'kgb' => 'required|mimes:pdf|max:3072',
            'ppk' => 'required|mimes:pdf|max:3072',
        ];
    }

    private function note(): array
    {
        return [
            'note_dpcp' => null,
            'note_kep_cpns' => null,
            'note_kep_pns' => null,
            'note_kep_pangkat' => null,
            'note_akte_nikah' => null,
            'note_akte_anak' => null,
            'note_sp_hd' => null,
            'note_sk_kematian' => null,
            'note_kk' => null,
            'note_kgb' => null,
            'note_ppk' => null,
        ];
    }

    private function message(): array
    {
        return [
            'dpcp.required' => 'Kolom wajib diisi',
            'dpcp.mimes' => 'File harus bertipe pdf',
            'dpcp.max' => 'File tidak boleh melebihi 3 Mb',
            'kep_cpns.required' => 'Kolom wajib diisi',
            'kep_cpns.mimes' => 'File harus bertipe pdf',
            'kep_cpns.max' => 'File tidak boleh melebihi 3 Mb',
            'kep_pns.required' => 'Kolom wajib diisi',
            'kep_pns.mimes' => 'File harus bertipe pdf',
            'kep_pns.max' => 'File tidak boleh melebihi 3 Mb',
            'kep_pangkat.required' => 'Kolom wajib diisi',
            'kep_pangkat.mimes' => 'File harus bertipe pdf',
            'kep_pangkat.max' => 'File tidak boleh melebihi 3 Mb',
            'akte_nikah.required' => 'Kolom wajib diisi',
            'akte_nikah.mimes' => 'File harus bertipe pdf',
            'akte_nikah.max' => 'File tidak boleh melebihi 3 Mb',
            'akte_anak.required' => 'Kolom wajib diisi',
            'akte_anak.mimes' => 'File harus bertipe pdf',
            'akte_anak.max' => 'File tidak boleh melebihi 3 Mb',
            'kk.required' => 'Kolom wajib diisi',
            'kk.mimes' => 'File harus bertipe pdf',
            'kk.max' => 'File tidak boleh melebihi 3 Mb',
            'kgb.required' => 'Kolom wajib diisi',
            'kgb.mimes' => 'File harus bertipe pdf',
            'kgb.max' => 'File tidak boleh melebihi 3 Mb',
            'ppk.required' => 'Kolom wajib diisi',
            'ppk.mimes' => 'File harus bertipe pdf',
            'ppk.max' => 'File tidak boleh melebihi 3 Mb',
        ];
    }
}
