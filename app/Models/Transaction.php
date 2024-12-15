<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Transaction extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $appends = [
        'created_at_ind',
        'photo'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->generateNumber();
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }


    public function getPhotoAttribute(): string|null
    {
        return $this->getFirstMediaUrl('photo');
    }

    public function generateNumber()
    {
        $count = $this->count() + 1 ;
        $formattedNumber = str_pad($count, 4, '0', STR_PAD_LEFT);
        $this->attributes['number'] = sprintf('TRX-%s', $formattedNumber);
    }

    public function getCreatedAtIndAttribute()
    {
        return Carbon::parse($this->created_at)->locale('id')->isoFormat('dddd, DD MMMM YYYY H:m:s');
    }
}
