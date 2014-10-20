<?php
    namespace Application\MainBundle\Manager;

    class ArticleManager extends AbstractManager
    {
        public function getArticleData()
        {
            $query = $this->repository->createQueryBuilder('a')
                ->leftJoin("a.user", "u", "WITH")
                ->addSelect("u")
                ->getQuery();

            return $query->getResult();
        }
    }