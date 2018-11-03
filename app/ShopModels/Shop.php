<?php

namespace App\ShopModels;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $fillable = ['shop_name','shop_category_id','discount','brand','on_time','fengniao','bao','piao','zhun','start_send','send_cost','notice','shop_img','status'];
}
