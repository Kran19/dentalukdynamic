<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmileStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'location',
        'category',
        'before_image',
        'after_image',
        'avatar_image',
        'quote',
        'story_body',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
