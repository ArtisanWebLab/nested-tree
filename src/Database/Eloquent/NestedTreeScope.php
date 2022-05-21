<?php

namespace ArtisanWebLab\NestedTree\Database\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope as ScopeInterface;

class NestedTreeScope implements ScopeInterface
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->orderBy($model->getLeftColumnName());
    }
}
