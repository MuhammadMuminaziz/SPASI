<?php

namespace App\Http\Controllers;

use App\Models\Kesatuan;
use App\Models\NoteTni;
use App\Models\Pns;
use App\Models\Tni;
use App\Models\UsulanTni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsulanController extends Controller
{
    public function tni()
    {
        $tni = Tni::usulan();
        $kesatuan = Kesatuan::orderBy('name', 'asc')->get();
        return view('usulan.tni.index', compact('tni', 'kesatuan'));
    }

    public function create($slug)
    {
        $tni = Tni::whereSlug($slug)->first();
        return view('usulan.tni.create', compact('tni'));
    }

    public function store(Request $request)
    {
        $data = $request->only(array_merge($this->data(), array('tni_id', 'status')));
        $validator = Validator::make($data, $this->validation(), $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $skep_pengangkatan      = $request->file('skep_pengangkatan');
        $skep_pangkat           = $request->file('skep_pangkat');
        $skep_pemberhentian     = $request->file('skep_pemberhentian');
        $dcpp                   = $request->file('dcpp');
        $srt_nikah              = $request->file('srt_nikah');
        $skep_milsuk            = $request->file('skep_milsuk');
        $kpi                    = $request->file('kpi');
        $akte                   = $request->file('akte');
        $photo                  = $request->file('photo');
        $sk_tanggungan_keluarga = $request->file('sk_tanggungan_keluarga');
        $kta_asabri             = $request->file('kta_asabri');
        $npwp                   = $request->file('npwp');
        $tanda_jasa             = $request->file('tanda_jasa');
        $sk_kuliah              = $request->file('sk_kuliah');

        foreach ($this->data() as $row) {
            $data[$row] = rand() . time() . ".pdf";
        }

        $data['status'] = 'VERIFIKASI';
        $tni = Tni::find($data['tni_id']);
        $usulan = UsulanTni::create($data);
        $tni->update(['usulan_tni_id' => $usulan->id, 'is_usulan' => true]);

        $skep_pengangkatan->move('uploads/tni', $data['skep_pengangkatan']);
        $skep_pangkat->move('uploads/tni', $data['skep_pangkat']);
        $skep_pemberhentian->move('uploads/tni', $data['skep_pemberhentian']);
        $dcpp->move('uploads/tni', $data['dcpp']);
        $srt_nikah->move('uploads/tni', $data['srt_nikah']);
        $skep_milsuk->move('uploads/tni', $data['skep_milsuk']);
        $kpi->move('uploads/tni', $data['kpi']);
        $akte->move('uploads/tni', $data['akte']);
        $photo->move('uploads/tni', $data['photo']);
        $sk_tanggungan_keluarga->move('uploads/tni', $data['sk_tanggungan_keluarga']);
        $kta_asabri->move('uploads/tni', $data['kta_asabri']);
        $npwp->move('uploads/tni', $data['npwp']);
        $tanda_jasa->move('uploads/tni', $data['tanda_jasa']);
        $sk_kuliah->move('uploads/tni', $data['sk_kuliah']);

        return redirect()->route('usulan-tni.index')->with('message', 'Pengusulan SKEP berhasil');
    }

    public function verify($slug)
    {
        $tni = Tni::whereSlug($slug)->first();
        $usulan = UsulanTni::find($tni->usulan_tni_id);
        return view('usulan.tni.verify', compact('tni', 'usulan'));
    }

    public function verifyUsulan(Request $request)
    {
        $data = $request->only(['note_skep_pengangkatan', 'note_skep_pangkat', 'note_skep_pemberhentian', 'note_dcpp', 'note_srt_nikah', 'note_skep_milsuk', 'note_kpi', 'note_akte', 'note_photo', 'note_sk_tanggungan_keluarga', 'note_kta_asabri', 'note_npwp', 'note_tanda_jasa', 'note_sk_kuliah']);

        foreach ($data as $key => $val) {
            if ($val != null) {
                $status = 'GAGAL_VERIFIKASI';
                break;
            } else {
                $status = 'MENUNGGU_SK';
            }
        }

        $usulan = UsulanTni::find($request->usulan_tni_id);
        $note = NoteTni::create($data);
        $usulan->update(['note_tni_id' => $note->id, 'status' => $status]);

        return redirect()->route('usulan-tni.index')->with('message', 'Status usulan berhasil diubah');
    }

    public function revisi($slug)
    {
        $tni = Tni::whereSlug($slug)->first();
        $usulan = UsulanTni::find($tni->usulan_tni_id);
        return view('usulan.tni.edit', compact('tni', 'usulan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(array_merge($this->data(), array('note_tni_id')));
        $validator = Validator::make($data, [
            'skep_pengangkatan' => $request->skep_pengangkatan != null ? 'mimes:pdf|max:3072' : '',
            'skep_pangkat' => $request->skep_pangkat != null ? 'mimes:pdf|max:3072' : '',
            'skep_pemberhentian' => $request->skep_pemberhentian != null ? 'mimes:pdf|max:3072' : '',
            'dcpp' => $request->dcpp != null ? 'mimes:pdf|max:3072' : '',
            'srt_nikah' => $request->srt_nikah != null ? 'mimes:pdf|max:3072' : '',
            'skep_milsuk' => $request->skep_milsuk != null ? 'mimes:pdf|max:3072' : '',
            'kpi' => $request->kpi != null ? 'mimes:pdf|max:3072' : '',
            'akte' => $request->akte != null ? 'mimes:pdf|max:3072' : '',
            'photo' => $request->photo != null ? 'mimes:pdf|max:3072' : '',
            'sk_tanggungan_keluarga' => $request->sk_tanggungan_keluarga != null ? 'mimes:pdf|max:3072' : '',
            'kta_asabri' => $request->kta_asabri != null ? 'mimes:pdf|max:3072' : '',
            'npwp' => $request->npwp != null ? 'mimes:pdf|max:3072' : '',
            'tanda_jasa' => $request->tanda_jasa != null ? 'mimes:pdf|max:3072' : '',
            'sk_kuliah' => $request->sk_kuliah != null ? 'mimes:pdf|max:3072' : '',
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $skep_pengangkatan      = $request->file('skep_pengangkatan');
        $skep_pangkat           = $request->file('skep_pangkat');
        $skep_pemberhentian     = $request->file('skep_pemberhentian');
        $dcpp                   = $request->file('dcpp');
        $srt_nikah              = $request->file('srt_nikah');
        $skep_milsuk            = $request->file('skep_milsuk');
        $kpi                    = $request->file('kpi');
        $akte                   = $request->file('akte');
        $photo                  = $request->file('photo');
        $sk_tanggungan_keluarga = $request->file('sk_tanggungan_keluarga');
        $kta_asabri             = $request->file('kta_asabri');
        $npwp                   = $request->file('npwp');
        $tanda_jasa             = $request->file('tanda_jasa');
        $sk_kuliah              = $request->file('sk_kuliah');

        $new_data['status'] = 'VERIFIKASI';
        $usulan = UsulanTni::find($id);

        if ($skep_pengangkatan != null) {
            unlink('uploads/tni/' . $usulan->skep_pengangkatan);
            $new_data['skep_pengangkatan'] = rand() . time() . ".pdf";
            $skep_pengangkatan->move('uploads/tni', $new_data['skep_pengangkatan']);
        }
        if ($skep_pangkat != null) {
            unlink('uploads/tni/' . $usulan->skep_pangkat);
            $new_data['skep_pangkat'] = rand() . time() . ".pdf";
            $skep_pangkat->move('uploads/tni', $new_data['skep_pangkat']);
        }
        if ($skep_pemberhentian != null) {
            unlink('uploads/tni/' . $usulan->skep_pemberhentian);
            $new_data['skep_pemberhentian'] = rand() . time() . ".pdf";
            $skep_pemberhentian->move('uploads/tni', $new_data['skep_pemberhentian']);
        }
        if ($dcpp != null) {
            unlink('uploads/tni/' . $usulan->dcpp);
            $new_data['dcpp'] = rand() . time() . ".pdf";
            $dcpp->move('uploads/tni', $new_data['dcpp']);
        }
        if ($srt_nikah != null) {
            unlink('uploads/tni/' . $usulan->srt_nikah);
            $new_data['srt_nikah'] = rand() . time() . ".pdf";
            $srt_nikah->move('uploads/tni', $new_data['srt_nikah']);
        }
        if ($skep_milsuk != null) {
            unlink('uploads/tni/' . $usulan->skep_milsuk);
            $new_data['skep_milsuk'] = rand() . time() . ".pdf";
            $skep_milsuk->move('uploads/tni', $new_data['skep_milsuk']);
        }
        if ($kpi != null) {
            unlink('uploads/tni/' . $usulan->kpi);
            $new_data['kpi'] = rand() . time() . ".pdf";
            $kpi->move('uploads/tni', $new_data['kpi']);
        }
        if ($akte != null) {
            unlink('uploads/tni/' . $usulan->akte);
            $new_data['akte'] = rand() . time() . ".pdf";
            $akte->move('uploads/tni', $new_data['akte']);
        }
        if ($photo != null) {
            unlink('uploads/tni/' . $usulan->photo);
            $new_data['photo'] = rand() . time() . ".pdf";
            $photo->move('uploads/tni', $new_data['photo']);
        }
        if ($sk_tanggungan_keluarga != null) {
            unlink('uploads/tni/' . $usulan->sk_tanggungan_keluarga);
            $new_data['sk_tanggungan_keluarga'] = rand() . time() . ".pdf";
            $sk_tanggungan_keluarga->move('uploads/tni', $new_data['sk_tanggungan_keluarga']);
        }
        if ($kta_asabri != null) {
            unlink('uploads/tni/' . $usulan->kta_asabri);
            $new_data['kta_asabri'] = rand() . time() . ".pdf";
            $kta_asabri->move('uploads/tni', $new_data['kta_asabri']);
        }
        if ($npwp != null) {
            unlink('uploads/tni/' . $usulan->npwp);
            $new_data['npwp'] = rand() . time() . ".pdf";
            $npwp->move('uploads/tni', $new_data['npwp']);
        }
        if ($tanda_jasa != null) {
            unlink('uploads/tni/' . $usulan->tanda_jasa);
            $new_data['tanda_jasa'] = rand() . time() . ".pdf";
            $tanda_jasa->move('uploads/tni', $new_data['tanda_jasa']);
        }
        if ($sk_kuliah != null) {
            unlink('uploads/tni/' . $usulan->sk_kuliah);
            $new_data['sk_kuliah'] = rand() . time() . ".pdf";
            $sk_kuliah->move('uploads/tni', $new_data['sk_kuliah']);
        }

        NoteTni::find($request->note_tni_id)->update($this->note());
        $usulan->update($new_data);
        return redirect()->route('usulan-tni.index')->with('message', 'Pengusulan SKEP berhasil');
    }

    private function data(): array
    {
        return array('skep_pengangkatan', 'skep_pangkat', 'skep_pemberhentian', 'dcpp', 'srt_nikah', 'skep_milsuk', 'kpi', 'akte', 'photo', 'sk_tanggungan_keluarga', 'kta_asabri', 'npwp', 'tanda_jasa', 'sk_kuliah');
    }

    private function validation(): array
    {
        return [
            'skep_pengangkatan' => 'required|mimes:pdf|max:3072',
            'skep_pangkat' => 'required|mimes:pdf|max:3072',
            'skep_pemberhentian' => 'required|mimes:pdf|max:3072',
            'dcpp' => 'required|mimes:pdf|max:3072',
            'srt_nikah' => 'required|mimes:pdf|max:3072',
            'skep_milsuk' => 'required|mimes:pdf|max:3072',
            'kpi' => 'required|mimes:pdf|max:3072',
            'akte' => 'required|mimes:pdf|max:3072',
            'photo' => 'required|mimes:pdf|max:3072',
            'sk_tanggungan_keluarga' => 'required|mimes:pdf|max:3072',
            'kta_asabri' => 'required|mimes:pdf|max:3072',
            'npwp' => 'required|mimes:pdf|max:3072',
            'tanda_jasa' => 'required|mimes:pdf|max:3072',
            'sk_kuliah' => 'required|mimes:pdf|max:3072',
        ];
    }

    private function note(): array
    {
        return [
            'note_skep_pengangkatan' => null,
            'note_skep_pangkat' => null,
            'note_skep_pemberhentian' => null,
            'note_dcpp' => null,
            'note_srt_nikah' => null,
            'note_skep_milsuk' => null,
            'note_kpi' => null,
            'note_akte' => null,
            'note_photo' => null,
            'note_sk_tanggungan_keluarga' => null,
            'note_kta_asabri' => null,
            'note_npwp' => null,
            'note_tanda_jasa' => null,
            'note_sk_kuliah' => null,
        ];
    }

    private function message(): array
    {
        return [
            'skep_pengangkatan.required' => 'Kolom wajib diisi',
            'skep_pengangkatan.mimes' => 'File harus bertipe pdf',
            'skep_pengangkatan.max' => 'File tidak boleh melebihi 3 Mb',
            'skep_pangkat.required' => 'Kolom wajib diisi',
            'skep_pangkat.mimes' => 'File harus bertipe pdf',
            'skep_pangkat.max' => 'File tidak boleh melebihi 3 Mb',
            'skep_pemberhentian.required' => 'Kolom wajib diisi',
            'skep_pemberhentian.mimes' => 'File harus bertipe pdf',
            'skep_pemberhentian.max' => 'File tidak boleh melebihi 3 Mb',
            'dcpp.required' => 'Kolom wajib diisi',
            'dcpp.mimes' => 'File harus bertipe pdf',
            'dcpp.max' => 'File tidak boleh melebihi 3 Mb',
            'srt_nikah.required' => 'Kolom wajib diisi',
            'srt_nikah.mimes' => 'File harus bertipe pdf',
            'srt_nikah.max' => 'File tidak boleh melebihi 3 Mb',
            'skep_milsuk.required' => 'Kolom wajib diisi',
            'skep_milsuk.mimes' => 'File harus bertipe pdf',
            'skep_milsuk.max' => 'File tidak boleh melebihi 3 Mb',
            'kpi.required' => 'Kolom wajib diisi',
            'kpi.mimes' => 'File harus bertipe pdf',
            'kpi.max' => 'File tidak boleh melebihi 3 Mb',
            'akte.required' => 'Kolom wajib diisi',
            'akte.mimes' => 'File harus bertipe pdf',
            'akte.max' => 'File tidak boleh melebihi 3 Mb',
            'photo.required' => 'Kolom wajib diisi',
            'photo.mimes' => 'File harus bertipe pdf',
            'photo.max' => 'File tidak boleh melebihi 3 Mb',
            'sk_tanggungan_keluarga.required' => 'Kolom wajib diisi',
            'sk_tanggungan_keluarga.mimes' => 'File harus bertipe pdf',
            'sk_tanggungan_keluarga.max' => 'File tidak boleh melebihi 3 Mb',
            'kta_asabri.required' => 'Kolom wajib diisi',
            'kta_asabri.mimes' => 'File harus bertipe pdf',
            'kta_asabri.max' => 'File tidak boleh melebihi 3 Mb',
            'npwp.required' => 'Kolom wajib diisi',
            'npwp.mimes' => 'File harus bertipe pdf',
            'npwp.max' => 'File tidak boleh melebihi 3 Mb',
            'tanda_jasa.required' => 'Kolom wajib diisi',
            'tanda_jasa.mimes' => 'File harus bertipe pdf',
            'tanda_jasa.max' => 'File tidak boleh melebihi 3 Mb',
            'sk_kuliah.required' => 'Kolom wajib diisi',
            'sk_kuliah.mimes' => 'File harus bertipe pdf',
            'sk_kuliah.max' => 'File tidak boleh melebihi 3 Mb',
            'status.required' => 'Kolom wajib diisi',
        ];
    }
}
