<?php


class CommunicationDAO extends DAO
{
    protected $table;
    protected $deleteBehaviour;
    protected $properties;

    function __construct() {
        $this->deleteBehaviour = new HardDeleteBehaviour();
        $this->table = 'communications';
        $this->properties = ['pk', 'title', 'text', 'date', 'FK_building'];
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0;
        //condition ? si oui : si non;

        return new Communication(
            $data['pk'],
            $data['title'],
            $data['text'],
            isset($data['date']) ? $data['date'] : null,
            $data['FK_building']
        );
    }

    function fetchAllByBuilding($FK_building)
    {       var_dump($FK_building);
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE FK_building = ?");
            $statement->execute([$FK_building]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $data) {
                //CREER UN NOUVEL OBJET
                //AJOUTE CET OBJET A NOTRE LISTE DE PRODUIT
                array_push($this->object_list, $this->create($data));
            }

            return $this->object_list;

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}