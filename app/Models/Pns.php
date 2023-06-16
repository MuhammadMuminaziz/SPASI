<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pns extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    public function scopeUsulan(): array
    {
        $user = auth()->user();
        if ($user->role->name == 'Verifikator') {
            $countPns = Pns::where('is_usulan', true)->get();
        } else {
            $countPns = Pns::where('kesatuan_id', $user->kesatuan->id)->get();
        }
        $data = [];
        $i = 0;
        foreach ($countPns as $row) {
            $tgl = date('Y-m-d', strtotime('+57 years', strtotime($row->tgl_lahir)));
            if ($tgl <= date('Y-m-d')) {
                $data[$i]['slug'] = $row->slug;
                $data[$i]['jabatan'] = $row->jabatan->name ?? '-';
                $data[$i]['nip'] = $row->nip;
                $data[$i]['nama'] = $row->nama;
                $data[$i]['pangkat'] = $row->pangkat;
                $data[$i]['tgl_lahir'] = $row->tgl_lahir;
                $data[$i]['status_usulan'] = $row->usulanPns->status ?? null;
                $data[$i]['surat_sk'] = $row->suratSk->name ?? null;
            }
            $i++;
        }
        return $data;
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function usulanPns()
    {
        return $this->belongsTo(UsulanPns::class);
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
