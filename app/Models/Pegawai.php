<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'username',
        'password',
        'nama_pegawai',
        'alamat_pegawai',
        'hp_pegawai',
        'id_bagian',
        'archive_status'
    ];
    public function bagian(){
        return $this->belongsTo('App\Models\Bagian', 'id_bagian', 'id_bagian');
    }
}
