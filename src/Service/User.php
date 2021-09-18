<?php


namespace App\Service;

use App\Entity\User as UserEntity;
use Doctrine\ORM\EntityManagerInterface;

class User
{

    private $repository = null;
    private $entityManager = null;

    public function __construct(EntityManagerInterface $em){
        $this->entityManager = $em;
        $this->repository = $this->entityManager->getRepository(UserEntity::class);
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function getById($id)
    {
        return $this->repository->find((int)$id);
    }

    public function create($name, $email)
    {
        $user = new UserEntity();
        $user->setName($name);
        $user->setEmail($email);
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }

}