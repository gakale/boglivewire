<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;

    public function getPublishedAtAttribute($value)
    {
        // Convertit la valeur en instance de Carbon si ce n'est pas déjà le cas
        return Carbon::parse($value);
    }

    public function getPublishedAtForHumansAttribute()
    {
        return Carbon::parse($this->attributes['published_at'])->diffForHumans();
    }
    public function scopePublished($query){
        $query->where('published_at','<=', Carbon::now());
    }

    public function scopeFeatured($query){
        $query->where('featured',true);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getExcerpt(){
        return Str::limit(strip_tags($this->body),150);
    }
    public function getReadingTime(){

        $mins =  round(str_word_count($this->body)/ 250);

        return ($mins <1) ? : $mins;
    }
}
