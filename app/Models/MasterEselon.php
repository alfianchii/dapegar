<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterEselon extends Model
{
    use HasFactory;


    protected $table = "mst_eselon";
    protected $primaryKey = "id_eselon";
    protected $guarded = ["id_eselon"];


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
        return $this->hasMany(User::class, "id_eselon", "id_eselon");
    }
}
