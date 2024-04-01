<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = "mst_users";
    protected $primaryKey = "id_user";
    protected $guarded = ["id_user"];
    protected $casts = ['password' => 'hashed', 'tanggal_lahir' => 'date'];
    protected function casts(): array
    {
        return $this->casts;
    }


    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, "updated_by", "id_user");
    }

    public function golonganPangkat()
    {
        return $this->belongsTo(MasterGolonganPangkat::class, "id_golongan_pangkat", "id_golongan_pangkat");
    }

    public function eselon()
    {
        return $this->belongsTo(MasterEselon::class, "id_eselon", "id_eselon");
    }

    public function jabatan()
    {
        return $this->belongsTo(MasterJabatan::class, "id_jabatan", "id_jabatan");
    }

    public function lokasiKerja()
    {
        return $this->belongsTo(MasterLokasiKerja::class, "id_lokasi_kerja", "id_lokasi_kerja");
    }

    public function unitKerja()
    {
        return $this->belongsTo(MasterUnitKerja::class, "id_unit_kerja", "id_unit_kerja");
    }

    public function agama()
    {
        return $this->belongsTo(MasterAgama::class, "id_agama", "id_agama");
    }
}
