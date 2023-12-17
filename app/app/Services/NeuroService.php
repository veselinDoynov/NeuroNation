<?php

namespace App\Services;

use App\Repositories\Repository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NeuroService
{

    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function test()
    {
        return $this->repository->getCategories();
    }

    public function getSessionSummary(int $userId)
    {
        if (!$this->repository->getUser($userId)) {
            throw new NotFoundHttpException("User with id {$userId} not found");
        }

        return $this->repository->getSessionSummary($userId);
    }

    public function getSessionSummaryPerCategory(int $userId)
    {
        if (!$this->repository->getUser($userId)) {
            throw new NotFoundHttpException("User with id {$userId} not found");
        }

        return $this->repository->getSessionSummaryPerCategory($userId);
    }

    public function getSessionDate(int $userId, string $sessionIdentifier)
    {

        if (!$this->repository->getUser($userId)) {
            throw new NotFoundHttpException("User with id {$userId} not found");
        }

        return $this->repository->getSessionDate($userId, $sessionIdentifier);
    }

}
