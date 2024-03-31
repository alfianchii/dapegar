<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAgama extends Model
{
    use HasFactory;


    protected $table = "mst_agama";
    protected $primaryKey = "id_agama";
    protected $guarded = ["id_agama"];


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
        return $this->hasMany(User::class, "id_agama", "id_agama");
    }
}