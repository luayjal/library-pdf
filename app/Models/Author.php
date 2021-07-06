<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image','description'];

    //get{AttrName}Attribute
    //attr_name
    public function getImageUrlAttribute(){
            if($this->image){
                return asset('uploads/'. $this->image);
            }
            return asset('images/default-image.png');
    }

    public static function validateRuels($id){
        
          return [
            'name'=>'required|unique:authors,name,'.$id,
            'description' => 'required|min:20',
            'image'=> 'image',

       ];
    
        
    }
    public static function CoustomMessage(){
        
      return [
        'name.required' => 'هذا الحقل إجباري',
        'name.unique' => 'هذا الاسم موجود مسبقاً',
        'description.required' => 'هذا الحقل اجباري',
        'description.min' => 'يجب أن يكون نص الوصف أكبر من 20 حرف',
        'image.image'=> 'الرجاء ارفاق صيغة صحيحة للصورة'
            ];
    
        
    }


    public function books(){
      return  $this->hasMany(Book::class, 'author_id','id');
    }
}
