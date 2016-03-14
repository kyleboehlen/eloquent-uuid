<?php
namespace JamesMills\Uuid;

use JamesMills\Uuid\Exception\MissingUuidColumnException;
use Ramsey\Uuid\Uuid;

trait HasUuidTrait
{
    protected static function bootHasUuidTrait()
    {
        static::creating(function ($model) {

            if (!\Schema::hasColumn($model->getTable(), 'uuid')) {
                throw new MissingUuidColumnException("Looks like you don't have a uuid column on " . $model->getTable() . " table. Please check your schema.");
            }

            if (!$model->uuid) {
                $model->uuid = (string)Uuid::uuid4();
            }
        });
    }

    public static function findByUuidOrFail($uuid)
    {
        return self::whereUuid($uuid)->firstOrFail();
    }
}
