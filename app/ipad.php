<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ipad extends Model
{
    protected $table = 'ipad';
    protected $fillable = [ 'number', 'tel', 'generation','group', 'schoolid','areaid','imei','serial','status','person'];
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
