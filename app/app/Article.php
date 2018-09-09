<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    public static function deleteIn($ids)
    {
        Article::whereIn('id', $ids)->delete();
    }
}
