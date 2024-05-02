<?php

namespace App\Utils\Stfc;

class Alliance {

    private const RELATIONSHIP_ALLY = 'Allies';
    private const RELATIONSHIP_ENEMY = 'Enemies';

    private $name;
    private array $territories = [];
    private array $relationships = [
        self::RELATIONSHIP_ALLY => [],
        self::RELATIONSHIP_ENEMY => []
    ];

    public static function create($name, $relationships = null, $territories = [], $week = null): Alliance {
        return new self($name, $relationships, $territories, $week);
    }

    private function __construct($name, $relationships = null, $territories = [], $week = null) {
        $this->name = $name;
        if(null !== $relationships) $this->relationships = $relationships;
        foreach ($territories as $territory) {
            $this->addTerritory($territory, $week);
        }
    }

    public function addTerritory($name, $week = null): void {
        $this->territories[] = Territory::create($name, $week);
        $this->territories = $this->sortTerritory();
    }

    protected function sortTerritory(): array {
        $result = $this->territories;
        uasort($result, function (Territory $a, Territory $b) {
            if($a->getTime() === $b->getTime()) return 0;
            return ($a->getTime() < $b->getTime()) ? -1 : 1;
        });
        /* the original array values are  */
        return array_values($result);
    }

    /**
     * @return Territory[]
     */
    public function getTerritories(): array {
        return $this->sortTerritory();
    }

    /**
     * @return null
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string[]
     */
    public function getConnectedTerritories(): array {
        $results = [];
        foreach ($this->getTerritories() as $territory) {
            $results = array_merge($territory->getNeighbors(), $results);
        }
        /** @var Territory $territory */
        $territoryNames = array_reduce($this->getTerritories(), function($result, $territory){
            $result[] = $territory->getName();
            return $result;
        }, []);
        $results = array_filter($results, function($territory) use ($territoryNames) {
            return !in_array($territory, $territoryNames);
        });
        return array_values(array_unique($results));
    }

    public function isAlly(string $name): bool {
        return in_array($name, $this->relationships[self::RELATIONSHIP_ALLY]);
    }

    public function isEnemy(string $name): bool {
        return in_array($name, $this->relationships[self::RELATIONSHIP_ENEMY]);
    }

}