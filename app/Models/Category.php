<?php

namespace App\Models;

use App\Enum\Category\CategoryType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Category extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'type' => CategoryType::class
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
            }
        });
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
