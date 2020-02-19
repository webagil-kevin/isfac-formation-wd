<?php


class ProprietaireManager
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
     * @return Proprietaire|null
     */
    public function get($id)
    {
        $id = (int)$id;
        $values = null;

        if ($id > 0) {

            $q = $this->getDB()->prepare('  SELECT * FROM Proprietaire WHERE idClient = :id');
            $q->bindValue(':id', $id, PDO::PARAM_STR);
            $q->execute();

            $values = new Proprietaire($q->fetch(PDO::FETCH_ASSOC));
        }

        return $values;
    }
}