<?php
namespace JamesMills\Uuid;

use Ramsey\Uuid\Uuid;

trait HasUuidTrait
{
    protected static function bootHasUuidTrait()
    {



        // Generate a Uuid on creation
        static::creating(function ($model) {
            if (! $model->uuid) {
                $model->uuid = (string) Uuid::uuid4();
            }
        });
    }

    public static function findByUuidOrFail($uuid)
    {
        return self::whereUuid($uuid)->firstOrFail();
    }
}
