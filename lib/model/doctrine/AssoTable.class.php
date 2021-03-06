<?php

/**
 * AssoTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AssoTable extends Doctrine_Table
{

    /**
     * Returns an instance of this class.
     *
     * @return object AssoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Asso');
    }

    /**
     *
     * Fetch the list of all associations sorted by name.
     *
     * TODO : Add more parameters to specify the associations we want
     *
     * @param int $pole_id
     */
    public function getAssosList($pole_id = null)
    {
        $q = $this->createQuery('a')
            ->select('a.*, p.*, pa.name')
            ->leftJoin('a.Pole p')
            ->leftJoin('p.Asso pa')
            ->addOrderBy('a.name ASC');

        if (!is_null($pole_id))
            $q = $q->where("a.pole_id = ?", $pole_id);

        return $q;
    }

    /**
     *
     * Fetch the list of all associations sorted by name.
     *
     *
     * @param int $pole_id
     */
    public function getAssosAndNotPolesList($pole_id = null)
    {
        $q = $this->createQuery('a')
            ->select('a.login, a.name, p.id, p.asso_id, i.id, i.login, i.name')
            ->leftJoin('a.Pole p')
            ->leftJoin('p.Infos i')
            ->where('a.pole_id IS NOT NULL')
            ->addOrderBy('p.id, a.name ASC');

        if (!is_null($pole_id))
            $q = $q->where("a.pole_id = ?", $pole_id);

        return $q->execute();
    }

    public function getMyAssos($user_id)
    {
        $q = $this->createQuery('q')
            ->select('q.id, q.login, q.name, q.logo, m.id')
            ->leftJoin('q.AssoMember m')
            ->where('m.user_id = ?', $user_id)
            ->andWhere('m.semestre_id = ?', sfConfig::get('app_portail_current_semestre'));
        return $q;
    }

    public function getMyPrevAssos($user_id, $current = null)
    {
        if (!$current) $current = $this->getMyAssos($user_id)->execute();
        $list = array();
        foreach ($current as $asso)
            array_push($list, $asso->getId());

        $q = $this->createQuery('q')
            ->select('q.id, q.login, q.name, q.logo, m.id')
            ->leftJoin('q.AssoMember m')
            ->where('m.user_id = ?', $user_id)
            ->andWhere('m.semestre_id = ?', sfConfig::get('app_portail_current_semestre') - 1)
            ->andWhereNotIn('q.id', $list);
        return $q;
    }

    public function getRandom()
    {
        $q = $this->createQuery('q')
            ->orderBy('RAND()');
        return $q->fetchOne();
    }

    public function retrieveAsso(Doctrine_Query $q)
    {
        $alias = $q->getRootAlias();
        $q->select("$alias.name, $alias.login, $alias.description, $alias.logo, $alias.salle, $alias.phone, $alias.facebook, p.id, p.asso_id, p.couleur");
        $q->leftJoin("$alias.Pole p");
        return $q->fetchOne();
    }

    public function getOneById($id)
    {
        $q = $this->createQuery('q')
            ->where('q.id = ?', $id);
        return $q;
    }

    public function getOneByLogin($login)
    {
        $q = $this->createQuery('q')
            ->where('q.login = ?', $login);
        return $q;
    }

    public function getAllForPole($pole)
    {
        $q = $this->createQuery('q')
            ->where('q.pole_id = ?', $pole->getPrimaryKey());
        return $q;
    }

    /**
     *
     * Method to use the zend framework for search
     * Give the response of a search query
     * * @param unknown_type $query
     */
    public function getForLuceneQuery($query)
    {
        $hits = self::getLuceneIndex()->find($query);

        $pks = array();
        foreach ($hits as $hit)
        {
            $pks[] = $hit->pk;
        }

        if (empty($pks))
        {
            return array();
        }

        $q = $this->createQuery('a')
            ->whereIn('a.id', $pks)
            ->limit(20);

        return $q->execute();
    }

    /**
     *
     * Method to use the zend framework for search
     * Get or create the index file
     */
    static public function getLuceneIndex()
    {
        ProjectConfiguration::registerZend();

        if (file_exists($index = self::getLuceneIndexFile()))
        {
            return Zend_Search_Lucene::open($index);
        } else
        {
            return Zend_Search_Lucene::create($index);
        }
    }

    /**
     *
     * Method to use the zend framework for search
     * Give the index file if exists
     */
    static public function getLuceneIndexFile()
    {
        return sfConfig::get('sf_data_dir') . '/asso.' . sfConfig::get('sf_environment') . '.index';
    }

}
