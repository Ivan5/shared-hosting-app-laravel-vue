<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
