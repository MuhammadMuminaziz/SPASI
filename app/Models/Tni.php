<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tni extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    public function scopeUsulan(): array
    {
        $user = auth()->user();
        if ($user->role->name == 'Verifikator') {
            $countTni = Tni::where('is_usulan', true)->get();
        } else {
            $countTni = Tni::where('kesatuan_id', $user->kesatuan->id)->get();
        }
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

    public function kesatuan()
    {
        return $this->belongsTo(Kesatuan::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function usulanTni()
    {
        return $this->belongsTo(UsulanTni::class);
    }

    public function suratSk()
    {
        return $this->belongsTo(SuratSk::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
