<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    
    use HasFactory;
    
    protected $fillable = ['user_id','name','price','image','description'];
    
    public static function getImage($image){
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$image);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        if($result !== FALSE)
        {
            $img = $image;
        }
        else
        {
            $img = 'property_detail_image.png';
        }
        
        $html = '<img src="'.$img.'" class="img-fluid">';
        return $html;
    }
    
}
