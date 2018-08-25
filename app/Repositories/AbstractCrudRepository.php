<?php

namespace App\Repositories;

use App\Contracts\RepositoryShouldCrud;

abstract class AbstractCrudRepository extends AbstractReadonlyRepository implements RepositoryShouldCrud
{

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->findById($id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

}