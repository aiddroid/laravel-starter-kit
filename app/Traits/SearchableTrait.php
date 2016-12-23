<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait SearchableTrait
{
    /**
     * Search from fields
     * @param Builder $query
     * @param $attributes
     * @return Builder
     */
    public function scopeSearch(Builder $query, $attributes = [])
    {
        foreach ($this->searchable as $column => $searchConfig) {
            if (isset($attributes[$column]) && $attributes[$column]) {
                $operator = isset($searchConfig[0]) ? $searchConfig[0] : '=';
                $value = isset($searchConfig[1]) ? str_replace("{{$column}}", $attributes[$column], $searchConfig[1]) : $attributes[$column];
                $boolean = isset($searchConfig[2]) ? $searchConfig[2] : 'and';
                $query->where($column, $operator, $value, $boolean);
            }
        }

        return $query;
    }
}