<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJabatan extends Model
{
    use HasFactory;


    protected $table = "mst_jabatan";
    protected $primaryKey = "id_jabatan";
    protected $guarded = ["id_jabatan"];


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
        return $this->hasMany(User::class, "id_jabatan", "id_jabatan");
    }
}
