<?php


class Communication
{
    private $pk;
    private $title;
    private $text;
    private $date;
    private $building;
    private $FK_building;

    /**
     * Communication constructor.
     * @param $pk
     * @param $title
     * @param $text
     * @param $date
     * @param $building
     */
    public function __construct($pk, $title, $text, $date, $FK_building)
    {
        $buildingDao = new BuildingDAO();
        $this->pk = $pk;
        $this->title = $title;
        $this->text = $text;
        $this->date = $date;
        $this->FK_building = $FK_building;
        $this->building = $buildingDao->fetch($FK_building);
    }

    function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}