<?php
    namespace Application\MainBundle\Manager;

    abstract class AbstractManager
    {
        /**
         * @var \Doctrine\Common\Persistence\ObjectRepository $repository
         */
        protected $repository;

        public function __construct(\Doctrine\Common\Persistence\ObjectRepository $repository){
            $this->repository = $repository;
        }

        public function getList() {
            return $this->repository->findAll();
        }
    }