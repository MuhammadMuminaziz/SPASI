<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Tni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tni = Tni::orderBy('nama', 'asc')->get();
        return view('tni.index', compact('tni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Jabatan::orderBy('name', 'asc')->get();
        return view('tni.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only($this->data());
        $validator = Validator::make($data, $this->validation(), $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Tni::create($data);
        return redirect()->route('tni.index')->with('message', 'Data TNI berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tni $tni)
    {
        return view('tni.show', compact('tni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tni $tni)
    {
        $jabatan = Jabatan::orderBy('name', 'asc')->get();
        return view('tni.edit', compact('tni', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tni $tni)
    {
        $data = $request->only($this->data());
        $validator = Validator::make($data, $this->validation(), $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $tni->update($data);
        return redirect()->route('tni.index')->with('message', 'Data TNI berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tni $tni)
    {
        $tni->delete();
        return back()->with('message', 'Data TNI berhasil dihapus');
    }

    private function data(): array
    {
        return array('kesatuan_id', 'jabatan_id', 'gol_jab', 'nama', 'pangkat', 'korps', 'nrp', 'tgl_lahir', 'sumber', 'tmt_tni', 'tmt_pangkat', 'tmt_jabatan', 'tmt_lama', 'tmt_kodam', 'kep_kasad', 'kep_pangam', 'dikum', 'lulus_dikum', 'dikbangum', 'lulus_dikbangum', 'status');
    }

    private function validation(): array
    {
        return [
            'jabatan_id' => 'required',
            'gol_jab' => 'required',
            'nama' => 'required',
            'pangkat' => 'required',
            'korps' => 'required',
            'nrp' => 'required',
            'tgl_lahir' => 'required',
            'sumber' => 'required',
            'tmt_tni' => 'required',
            'tmt_pangkat' => 'required',
            'tmt_jabatan' => 'required',
            'tmt_lama' => 'required',
            'tmt_kodam' => 'required',
            'kep_kasad' => 'required',
            'kep_pangam' => 'required',
            'dikum' => 'required',
            'lulus_dikum' => 'required',
            'dikbangum' => 'required',
            'lulus_dikbangum' => 'required',
            'status' => 'required',
        ];
    }

    private function message(): array
    {
        return [
            'jabatan_id.required' => 'Pilih jabatan terlebih dahulu',
            'gol_jab.required' => 'Gol Jabatan harus diisi',
            'nama.required' => 'Nama harus diisi',
            'pangkat.required' => 'Pangkat harus diisi',
            'korps.required' => 'korps harus diisi',
            'nrp.required' => 'nrp harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'sumber.required' => 'Sumber harus diisi',
            'tmt_tni.required' => 'Tanggal TMT TNI harus diisi',
            'tmt_pangkat.required' => 'Tanggal TMT pangkat harus diisi',
            'tmt_jabatan.required' => 'Tanggal TMT jabatan harus diisi',
            'tmt_lama.required' => 'TMT lama harus diisi',
            'tmt_kodam.required' => 'Tanggal TMT di kodam harus diisi',
            'kep_kasad.required' => 'kep kasad harus diisi',
            'kep_pangam.required' => 'kep kasad/sp pangam harus diisi',
            'dikum.required' => 'Dikum harus diisi',
            'lulus_dikum.required' => 'Tahun lulus dikum harus diisi',
            'dikbangum.required' => 'Dikbagum harus diisi',
            'lulus_dikbangum.required' => 'Tahun lulus Dikbagum harus diisi',
            'status.required' => 'Status harus diisi',
        ];
    }
}
