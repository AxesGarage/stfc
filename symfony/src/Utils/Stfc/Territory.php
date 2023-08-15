<?php

namespace App\Utils\Stfc;

use App\Utils\Stfc\Territory\Data;
use InvalidArgumentException;

class Territory {

    private $name;
    private $level;
    private $capture;
    private $time;
    private $duration;

    private function __construct(){}

    public static function create($name, $week = null): self {
        $self = new self();
        $self->capture = Data::getCapture($name);
        $self->name = $name;
        $self->level = Data::getLevel($name);
        $self->duration = Data::defenseTime($self->level);
        $self->time = self::getDefenseTime($self->capture, $week);
        return $self;
    }


    protected static function getDefenseTime(string $time, $week = null) {
        $defenseTime = self::getTimeThisWeek($time);
        if(null === $week) return $defenseTime;
        if($week > 53 || $week < 0) throw new InvalidArgumentException('Invalid week given');
        $defense = new \DateTime('@' . $defenseTime);
        $thisWeek =  $defense->format('W');
        $defense->modify(($week - $thisWeek) . ' weeks');
        return $defense->format('U');
    }
    protected static function getTimeThisWeek(string $time){
        $thisweek = (new \DateTime())->format('W');
        $territoryWeek = (new \DateTime('@' . strtotime($time)))->format('W');
        if ($territoryWeek !== $thisweek) {
            $updatedWeek = (new \DateTime('@' . strtotime('last ' . $time)))->format('W');
            if($updatedWeek === $thisweek){
                return strtotime('last ' . $time);
            }
        } else {
            return strtotime($time);
        }
        throw new \RuntimeException('Unable to generate time');
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getCapture() {
        return $this->capture;
    }

    /**
     * @return mixed
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getDuration() {
        return $this->duration;
    }
}