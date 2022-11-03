<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class Student extends Model
{
    use HasFactory;
     protected $fillable = [
        "name",
        "email"
     ];
    // //migrálás elött,megadhatjuk a tábla nevét
    // protected $table = "mas_tablanev";
    // protected $primarykey = "mas_id";
    // protected $keytype = "string";

    // //id értékét nem növeli
    // public $incrementing =false;
    //  const CREATED_AT = "letrehozas";
    //  const UPDATED_AT = "modositas";

    // //nem nézi az időt,ki kell venni ha ignoráljuk
    public $timestamps =false;

    public function course() {
        return $this->belongsTo(Course::class);
    }
    
}