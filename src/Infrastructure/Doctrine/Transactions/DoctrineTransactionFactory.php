<?php

namespace App\Infrastructure\Doctrine\Transactions;

use App\Infrastructure\Doctrine\DoctrineEntityManagerAware;
use App\Infrastructure\Transactions\TransactionFactoryInterface;
use App\Infrastructure\Transactions\TransactionInterface;
use Doctrine\Persistence\ManagerRegistry;

abstract class DoctrineTransactionFactory extends DoctrineEntityManagerAware implements TransactionFactoryInterface
{

    public function __construct(
        ManagerRegistry $managerRegistry
    )
    {
        parent::__construct($managerRegistry);
    }

    function createTransaction($func): TransactionInterface
    {
        return new DoctrineTransaction($this->getEntityManager(), $func);
    }
}