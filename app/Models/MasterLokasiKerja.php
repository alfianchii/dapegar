<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiKerja extends Model
{
    use HasFactory;


    protected $table = "mst_lokasi_kerja";
    protected $primaryKey = "id_lokasi_kerja";
    protected $guarded = ["id_lokasi_kerja"];


    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, "updated_by", "id_user");
    }

    public function users()
    {
        return $this->hasMany(User::class, "id_lokasi_kerja", "id_lokasi_kerja");
    }
}
