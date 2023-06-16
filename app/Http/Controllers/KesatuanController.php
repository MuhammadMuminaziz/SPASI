<?php

namespace App\Http\Controllers;

use App\Models\Kesatuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KesatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kesatuan = Kesatuan::orderBy('name', 'asc')->get();
        return view('kesatuan.index', compact('kesatuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kesatuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['code', 'name']);
        $validator = Validator::make($data, [
            'code' => 'required|unique:kesatuans',
            'name' => 'required'
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Kesatuan::create($data);
        return redirect()->route('kesatuan.index')->with('message', 'Kesatuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kesatuan $kesatuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kesatuan $kesatuan)
    {
        return view('kesatuan.edit', compact('kesatuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kesatuan $kesatuan)
    {
        $data = $request->only(['code', 'name']);
        $validator = Validator::make($data, [
            'code' => 'required|unique:kesatuans,code,' . $kesatuan->id,
            'name' => 'required'
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $kesatuan->update($data);
        return redirect()->route('kesatuan.index')->with('message', 'Kesatuan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesatuan $kesatuan)
    {
        $kesatuan->delete();
        return back()->with('message', 'Kesatuan berhasil dihapus');
    }

    private function message(): array
    {
        return [
            'code.required' => 'Kode kesatuan harus diisi',
            'code.unique' => 'Kode kesatuan sudah terdaftar',
            'name.required' => 'Nama kesatuan harus diisi'
        ];
    }
}
