<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function servicetype()
    {
        return $this->belongsTo('App\Servicetype');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }
    
    public static function allproductforcat($id,$shop_id)
    {
         $allproductforcat =  Product::where('category_id',$id)->where('user_id',$shop_id)->get();
         return $allproductforcat;
    }

}//end class
