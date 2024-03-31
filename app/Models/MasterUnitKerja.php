<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUnitKerja extends Model
{
    use HasFactory;


    protected $table = "mst_unit_kerja";
    protected $primaryKey = "id_unit_kerja";
    protected $guarded = ["id_unit_kerja"];


    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, "updated_by", "id_user");
    }

    public function user()
    {
        return $this->hasMany(User::class, "id_unit_kerja", "id_unit_kerja");
    }
}