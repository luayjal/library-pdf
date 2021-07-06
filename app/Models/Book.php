<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name','slug','language', 'description', 'releas_date','image', 'file', 'status', 'category_id', 'author_id','user_id'];
    //protected $casts = ['releas_date' => 'date'];
    public  function getImageBookAttribute(){
        if($this->image){
            return asset( 'uploads/'. $this->image);
        }
    }

    public function category(){
       return $this->belongsTo(Category::class,'category_id','id');
    }

    public  function author(){
      return  $this->belongsTo(Author::class,'author_id','id');
    }
    public  function user(){
      return  $this->belongsTo(User::class,'user_id','id');
    }
}
