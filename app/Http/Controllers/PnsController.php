<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pns = Pns::orderBy('nama', 'asc')->get();
        return view('pns.index', compact('pns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Jabatan::orderBy('name', 'asc')->get();
        return view('pns.create', compact('jabatan'));
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

        $data['kesatuan_id'] = auth()->user()->kesatuan->id;
        Pns::create($data);
        return redirect()->route('pns.index')->with('message', 'Data PNS berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pns $pns, $slug)
    {
        $pns = Pns::whereSlug($slug)->first();
        return view('pns.show', compact('pns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pns $pns, $slug)
    {
        $pns = Pns::whereSlug($slug)->first();
        $jabatan = Jabatan::orderBy('name', 'asc')->get();
        return view('pns.edit', compact('pns', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pns $pns, $slug)
    {
        $data = $request->only($this->data());
        $validator = Validator::make($data, $this->validation(), $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Pns::whereSlug($slug)->update($data);
        return redirect()->route('pns.index')->with('message', 'Data PNS berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pns $pns, $slug)
    {
        Pns::whereSlug($slug)->delete();
        return redirect()->route('pns.index')->with('message', 'Data PNS berhasil dihapus');
    }

    private function data(): array
    {
        return array('jabatan_id', 'nip', 'nama', 'pangkat', 'tgl_lahir', 'dikum', 'lulus_dikum', 'dikjang', 'lulus_dikjang', 'kep_jab', 'tgl_kep_jab');
    }

    private function validation(): array
    {
        return [
            'jabatan_id' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'pangkat' => 'required',
            'tgl_lahir' => 'required',
            'dikum' => 'required',
            'lulus_dikum' => 'required',
            'dikjang' => 'required',
            'lulus_dikjang' => 'required',
            'kep_jab' => 'required',
            'tgl_kep_jab' => 'required',
        ];
    }

    private function message(): array
    {
        return [
            'jabatan_id.required' => 'Jabatan harus diisi',
            'nip.required' => 'Nip harus diisi',
            'nama.required' => 'Nama lengkap harus diisi',
            'pangkat.required' => 'Pangkat harus diisi',
            'tgl_lahir.required' => 'Tanggal Lahir harus diisi',
            'dikum.required' => 'Dikum harus diisi',
            'lulus_dikum.required' => 'Tahun lulus dikum harus diisi',
            'dikjang.required' => 'Dikjang/diksus harus diisi',
            'lulus_dikjang.required' => 'Tahun lulus dikjang/diksus harus diisi',
            'kep_jab.required' => 'No Kep/Sprint Jab TMT harus diisi',
            'tgl_kep_jab.required' => 'Tanggal No Kep/Sprint Jab TMT harus diisi',
        ];
    }
}
