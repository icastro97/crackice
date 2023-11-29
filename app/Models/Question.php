<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'id_category',
        'id_level'
    ];
    /**
     * Get the category associated with the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }

    /**
     * Get the level associated with the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function level(): HasOne
    {
        return $this->hasOne(Level::class, 'id', 'id_level');
    }

}
