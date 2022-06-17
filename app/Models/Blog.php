<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table ='blogs';
    protected $guarded=[];
    protected $appended = ['image_path'];


    public function getImagePathAttribute(){
        return $this->image != null ? asset('uploads/blogs_images/'.$this->image) :  asset('uploads/blogs_images/default.jpg') ;
    }
}
