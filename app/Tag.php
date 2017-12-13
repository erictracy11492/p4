<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function user_tasks() 
    {
        return $this->belongsToMany('App\UserTask')->withTimestamps();
    }
    
    public static function getForCheckboxes()
    {
        $tags = Tag::orderBy('name')->get();

        $tagsForCheckboxes = [];

        foreach ($tags as $tag) {
        $tagsForCheckboxes[$tag['id']] = $tag->name;
        }

        return $tagsForCheckboxes;
    }
}
