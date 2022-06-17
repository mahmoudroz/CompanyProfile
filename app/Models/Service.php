<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Service extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;

    public $table = "services";
    public $translatedAttributes = ['title','description'];
    protected $fillable = ['icon'];
    //protected $appended = ['image_path'];


//    public function getImagePathAttribute(){
//        return $this->image != null ? asset('uploads/services/'.$this->image) :  asset('uploads/services/default.jfif') ;
//    }


}
