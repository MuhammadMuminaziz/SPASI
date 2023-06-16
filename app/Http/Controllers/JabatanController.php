<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::orderBy('name', 'asc')->get();
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['code', 'name', 'type']);
        $validator = Validator::make($data, [
            'code' => 'required|unique:jabatans',
            'name' => 'required',
            'type' => 'required',
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Jabatan::create($data);
        return redirect()->route('jabatan.index')->with('message', 'Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $data = $request->only(['code', 'name', 'type']);
        $validator = Validator::make($data, [
            'code' => 'required|unique:jabatans,code,' . $jabatan->id,
            'name' => 'required',
            'type' => 'required',
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $jabatan->update($data);
        return redirect()->route('jabatan.index')->with('message', 'Jabatan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return back()->with('message', 'Jabatan berhasil dihapus');
    }

    private function message(): array
    {
        return [
            'code.required' => 'Kode jabatan harus diisi',
            'code.unique' => 'Kode jabatan sudah terdaftar',
            'name.required' => 'Nama jabatan harus diisi'
        ];
    }
}
