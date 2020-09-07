<?php

namespace App\Repository;

use DateTime;
use DateTimeZone;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Facades\EntityManager;

class TaskRepository extends EntityRepository
{
    public function findAllByDate($date)
    {
        echo $date->format('Y-m-d H:i:00.0000');
        $dt = new DateTime($date->format('Y-m-d H:i') . ':00', new DateTimeZone('UTC'));
        echo var_dump($dt);

        $qb = EntityManager::createQueryBuilder();
        $qb->select('t')
            ->from('App\Task', 't')
            // ->where('t.date BETWEEN :from AND :to')
            ->where('t.date = :from')
            // ->andWhere('t.date <= :to')
            ->setParameters([
                'from' => $dt,
                // 'to'   => $to->format('Y-m-d H:i'),
            ]);
        // ->setParameter('from', new \DateTime('-5 second'), \Doctrine\DBAL\Types\Type::DATETIME);

        $updatedata = $qb->getQuery()->getResult();

        return $updatedata;
    }
}
