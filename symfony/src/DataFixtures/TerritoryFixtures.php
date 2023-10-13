<?php

namespace App\DataFixtures;

use App\Utils\Stfc\Territory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class TerritoryFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void {
        foreach (Territory\Data::getTerritoryData() as $territoryName => $territoryDatum) {
            $territory = new \App\Entity\Territory();
            $territory->setName($territoryName)
                ->setLevel(strlen($territoryDatum[Territory\Data::KEY_LEVEL]))
                ->setCapture($territoryDatum[Territory\Data::KEY_CAPTURE])
                ->setParticle($territoryDatum[Territory\Data::KEY_PARTICLE]);
            $manager->persist($territory);
        }

        $manager->flush();
    }

    public static function getGroups(): array {
        return ['production'];
    }
}
