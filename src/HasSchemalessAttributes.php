<?php

namespace Spatie\SchemalessAttributes;

use Illuminate\Database\Eloquent\Builder;

trait HasSchemalessAttributes
{
    public function getExtraAttributesAttribute(): SchemalessAttributes
    {
        return SchemalessAttributes::createForModel($this, $this->getSchemalessColumnName());
    }

    public function scopeWithExtraAttributes(): Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes($this->getSchemalessColumnName());
    }

    private function getSchemalessColumnName()
    {
        return property_exists($this, 'schemalessColumn') ? $this->schemalessColumn : 'extra_attributes';
    }
}