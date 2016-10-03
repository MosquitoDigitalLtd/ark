<?php

namespace Appitized\Ark\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuidIdentifier
{
    /**
     * This is used by Eloquent models to determine if they increment or not
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    public static function bootHasUuidIdentifier()
    {
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->attributes[$model->getKeyName()] = (string)$model->generateNewUuid();
        });
    }

    public function generateNewUuid()
    {
        return Uuid::uuid4();
    }
}
