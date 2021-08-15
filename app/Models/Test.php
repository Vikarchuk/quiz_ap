<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = 'tests';

    public function questions() {
        return $this->hasMany(Question::class);
    }
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    protected $fillable = [
        'title',
        'performance_time',
        'category_id'];
}
