<?php

namespace App\Utils\Stfc;

class Alliance {

    private $name = null;
    private array $territories = [];
    private ?string $status = null;

    public function __construct($name, $status = Status::ALLIANCE_STATUS_NEUTRAL, $territories = [], $week = null) {
        $this->name = $name;
        $this->status = Status::getStatus($status);
        foreach ($territories as $territory) {
            $this->addTerritory($territory, $week);
        }
    }

    public function addTerritory($name, $week = null):void {
        $this->territories[] = Territory::create($name, $week);
    }

    public function getTerritories(): array {
        $return = $this->territories;
        uasort($return, function (Territory $a, Territory $b) {
            return ($a->getTime() < $b->getTime()) ? -1 : 1;
        });
        return $return;
    }

    /**
     * @return null
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

}