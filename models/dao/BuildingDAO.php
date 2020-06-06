<?php


class BuildingDAO extends DAO
{
    protected $table;
    protected $deleteBehaviour;
    protected $properties;

    function __construct() {
        $this->deleteBehaviour = new HardDeleteBehaviour();
        $this->table = 'building';
        $this->properties = ['pk', 'name'];
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0;
        //condition ? si oui : si non;

        return new Building(
            $data['pk'],
            $data['name']
        );
    }
}