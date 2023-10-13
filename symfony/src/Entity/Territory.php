<?php

namespace App\Entity;

use App\Repository\TerritoryRepository;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

#[ORM\Entity(repositoryClass: TerritoryRepository::class)]
class Territory {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $capture = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column(length: 255)]
    private ?string $particle = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): static {
        $this->name = $name;

        return $this;
    }

    public function getCapture(): ?string {
        return $this->capture;
    }

    public function setCapture(string $capture): static {
        $this->capture = $capture;

        return $this;
    }

    public function getLevel(): ?int {
        return $this->level;
    }

    public function setLevel(int $level): static {
        $this->level = $level;

        return $this;
    }

    public function getParticle(): ?string {
        return $this->particle;
    }

    public function setParticle(string $particle): static {
        $this->particle = $particle;

        return $this;
    }

    protected static function convertIntToStar(int $level): string {
        return str_repeat('*', $level);
    }

    public function getDefenseTime($week = null) {
        $defenseTime = self::getTimeThisWeek($this->getCapture());
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
}
