<?php


class BienManager
{
    /**
     * @var
     */
    private $_db; // Instance de PDO

    /**
     * FantomeManager constructor.
     *
     * @param $db
     */
    public function __construct($db)
    {
        $this->setDB($db);
    }

    /**
     * @param PDO $db
     */
    private function setDB(PDO $db)
    {
        $this->_db = $db;
    }

    /**
     * @return mixed
     */
    public function getDB()
    {
        return $this->_db;
    }

    /**
     * @param $id
     *
     * @return Bien|null
     */
    public function get($id)
    {
        $values = null;

        if (!empty($id)) {

            $q = $this->getDB()->prepare('  SELECT * FROM bien WHERE idBien = :id');
            $q->bindValue(':id', $id, PDO::PARAM_STR);
            $q->execute();

            $values = new Bien($q->fetch(PDO::FETCH_ASSOC));
        }

        return $values;
    }
}