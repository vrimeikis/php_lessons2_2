<?php

declare(strict_types = 1);

include_once __DIR__.'/Model.php';

class Category extends Model
{
    protected $table = 'categories';

    public function save(): void
    {
        // TODO: Implement save() method.
    }

    protected function fillObject(int $id): void
    {
        // TODO: Implement fillObject() method.
    }
}