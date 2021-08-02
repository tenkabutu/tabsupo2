<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iPadlist extends Model
{
    protected $fillable = [ 'number', 'tel', 'generation' ];
    // protected  $primaryKey ='isbn';
    // protected $keyType ='string';
    public  $incrementing = false;
    public static $rules = [
        'number' => 'required',
        'areaid' => 'required|integer|max:10',
     //   'price' => 'integer|min:0',
    //    'publisher' => 'required|in:翔泳社,技術評論社,日経BP,秀和システム,インプレス',
       // 'published' => 'required|date'
    ];

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
