<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterGolonganPangkat extends Model
{
    use HasFactory;


    protected $table = "mst_golongan_pangkat";
    protected $primaryKey = "id_golongan_pangkat";
    protected $guarded = ["id_golongan_pangkat"];


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
        return $this->hasMany(User::class, "id_golongan_pangkat", "id_golongan_pangkat");
    }
}
