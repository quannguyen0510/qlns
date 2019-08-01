<?php


namespace App\Repositories;
use App\Models\News;
use App\Repositories\EloquentRepository;


class NewsRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return News::class;
    }
}
