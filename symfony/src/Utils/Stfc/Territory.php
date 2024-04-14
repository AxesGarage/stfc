<?php

namespace App\Utils\Stfc;

use App\Utils\Stfc\Territory\Data;
use InvalidArgumentException;

class Territory {

    private string $name;
    private string $level;
    private string $capture;
    private int $time;
    private int $duration;
    private array $neighbors;

    private function __construct() {}

    public static function create($name, $week = null): self {
        $self = new self();
        $self->capture = Data::getCapture($name);
        $self->name = $name;
        $self->level = Data::getLevel($name);
        $self->duration = Data::defenseTime($self->level);
        $self->time = self::getDefenseTime($self->capture, $week);
        $self->neighbors = Data::getRoutes($name);
        return $self;
    }


    protected static function getDefenseTime(string $time, $week = null): int {
        $defenseTime = self::getTimeThisWeek($time);
        if (null === $week) return $defenseTime;
        if ($week > 53 || $week < 0) throw new InvalidArgumentException('Invalid week given');
        $defense = new \DateTime('@' . $defenseTime);
        $thisWeek = $defense->format('W');
        $defense->modify(($week - $thisWeek) . ' weeks');
        return (int)$defense->format('U');
    }

    protected static function getTimeThisWeek(string $time): int {
        $thisweek = (new \DateTime())->format('W');
        $territoryWeek = (new \DateTime('@' . strtotime($time)))->format('W');
        if ($territoryWeek !== $thisweek) {
            $updatedWeek = (new \DateTime('@' . strtotime('last ' . $time)))->format('W');
            if ($updatedWeek === $thisweek) {
                return strtotime('last ' . $time);
            }
        } else {
            return strtotime($time);
        }
        throw new \RuntimeException('Unable to generate time');
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLevel(): string {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getCapture(): string {
        return $this->capture;
    }

    /**
     * @return int
     */
    public function getTime(): int {
        return $this->time;
    }

    /**
     * @return int
     */
    public function getDuration(): int {
        return $this->duration;
    }

    /**
     * @return string[]
     */
    public function getNeighbors(): array {
        return $this->neighbors;
    }
}