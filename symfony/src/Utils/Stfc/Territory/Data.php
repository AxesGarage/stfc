<?php

namespace App\Utils\Stfc\Territory;

use Exception;
use InvalidArgumentException;

class Data {
    const KEY_CAPTURE = 'capture';
    const KEY_LEVEL = 'level';
    const KEY_PARTICLE = 'particle';

    const LEVEL_1_STAR = '*';
    const LEVEL_2_STAR = '**';
    const LEVEL_3_STAR = '***';

    const PARTICLE_SURAX = 'surax';
    const PARTICLE_QUANTUM = 'quantum';
    const PARTICLE_PHANTOM = 'phantom';
    const PARTICLE_METREON = 'metreon';


    protected static array $territories = [
        'Hoobishan' => [self::KEY_CAPTURE => 'Monday 5pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Zhian' => [self::KEY_CAPTURE => 'Monday 6pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Crios' => [self::KEY_CAPTURE => 'Monday 7pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Bolari' => [self::KEY_CAPTURE => 'Monday 8pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Roshar' => [self::KEY_CAPTURE => 'Monday 9pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Bimasa' => [self::KEY_CAPTURE => 'Monday 10pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Duportas' => [self::KEY_CAPTURE => 'Monday 11pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Eldur' => [self::KEY_CAPTURE => 'Tuesday 12am UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Abilakk' => [self::KEY_CAPTURE => 'Tuesday 1am UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],

        'Adia' => [self::KEY_CAPTURE => 'Wednesday 4pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Otima' => [self::KEY_CAPTURE => 'Wednesday 5pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Perim' => [self::KEY_CAPTURE => 'Wednesday 6pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Thaylen' => [self::KEY_CAPTURE => 'Wednesday 7pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Asiti' => [self::KEY_CAPTURE => 'Wednesday 8pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Tefkari' => [self::KEY_CAPTURE => 'Wednesday 9pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Nujord' => [self::KEY_CAPTURE => 'Wednesday 10pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Zamaro' => [self::KEY_CAPTURE => 'Wednesday 11pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Thosz' => [self::KEY_CAPTURE => 'Thursday 12am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Lenara' => [self::KEY_CAPTURE => 'Thursday 1am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],

        'Vantar' => [self::KEY_CAPTURE => 'Thursday 5pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Avansa' => [self::KEY_CAPTURE => 'Thursday 6pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Burran' => [self::KEY_CAPTURE => 'Thursday 7pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Triss' => [self::KEY_CAPTURE => 'Thursday 8pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Brijac' => [self::KEY_CAPTURE => 'Thursday 9pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Hrojost' => [self::KEY_CAPTURE => 'Thursday 10pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Tezera' => [self::KEY_CAPTURE => 'Thursday 11pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Anzat' => [self::KEY_CAPTURE => 'Friday 12am UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Ber\'Tho' => [self::KEY_CAPTURE => 'Friday 1mm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],

        'Comst' => [ self::KEY_CAPTURE => 'Friday 4pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Framtid' => [ self::KEY_CAPTURE => 'Friday 5pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Ruhe' => [ self::KEY_CAPTURE => 'Friday 6pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Saldeti' => [ self::KEY_CAPTURE => 'Friday 7pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Ezla' => [ self::KEY_CAPTURE => 'Friday 8pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Kolava' => [ self::KEY_CAPTURE => 'Friday 9pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Beku' => [ self::KEY_CAPTURE => 'Friday 10pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Klefaski' => [ self::KEY_CAPTURE => 'Friday 11pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Tazolka' => [ self::KEY_CAPTURE => 'Saturday 12am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Tigan' => [ self::KEY_CAPTURE => 'Saturday 1am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],

        'Mak\'ala' => [self::KEY_CAPTURE => 'Saturday 8pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        'Corva' => [self::KEY_CAPTURE => 'Saturday 9pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        'Nyrheimur' => [self::KEY_CAPTURE => 'Saturday 10pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        'Barasa' => [self::KEY_CAPTURE => 'Saturday 11pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        'Tholus' => [self::KEY_CAPTURE => 'Sunday 12am UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        'Brellan' => [self::KEY_CAPTURE => 'Sunday 1am UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],

        'Qeyma' => [self::KEY_CAPTURE => 'Sunday 4pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Gelida' => [self::KEY_CAPTURE => 'Sunday 5pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Innlasn' => [self::KEY_CAPTURE => 'Sunday 6pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Vemira' => [self::KEY_CAPTURE => 'Sunday 7pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Helvi' => [self::KEY_CAPTURE => 'Sunday 8pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Aonad' => [self::KEY_CAPTURE => 'Sunday 9pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        'Temeri' => [self::KEY_CAPTURE => 'Sunday 10pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        'Stilhe' => [self::KEY_CAPTURE => 'Sunday 11pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Parturi' => [self::KEY_CAPTURE => 'Monday 12am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        'Aylus' => [self::KEY_CAPTURE => 'Monday 1am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
    ];

    protected static array $routes = [
        'Barasa' => ['Bolari', 'Brijac', 'Burran'],
        'Brellan' => ['Duportas', 'Ber\'Tho', 'Bimasa'],
        'Corva' => ['Crios', 'Roshar', 'Avansa'],
        'Mak\'ala' => ['Zhian', 'Triss', 'Hoobishan'],
        'Nyrheimur' => ['Vantar', 'Eldur', 'Hrojost'],
        'Tholus' => ['Abilakk', 'Anzat', 'Tezera'],
        'Abilakk' => ['Tholus', 'Lenara', 'Thosz'],
        'Adia' => ['Temeri', 'Tezera', 'Crios'],
        'Anzat' => ['Tholus', 'Parturi', 'Tazolka'],
        'Aylus' => ['Duportas', 'Thosz', 'Tazolka'],
        'Beku' => ['Bimasa', 'Gelida', 'Brijac'],
        'Ber\'Tho' => ['Tazolka', 'Duportas', 'Brellan', 'Zamaro'],
        'Bimasa' => ['Brellan', 'Zamaro', 'Gelida', 'Beku'],
        'Duportas' => ['Nujord', 'Aylus', 'Ber\'Tho', 'Brellan'],
        'Gelida' => ['Saldeti', 'Bimasa', 'Beku'],
        'Nujord' => ['Hrojost', 'Framtid', 'Duportas'],
        'Saldeti' => ['Zamaro', 'Gelida', 'Brijac'],
        'Tazolka' => ['Aylus', 'Anzat', 'Ber\'Tho'],
        'Temeri' => ['Perim', 'Ezla', 'Adia'],
        'Tezera' => ['Vemira', 'Tigan', 'Tholus', 'Adia'],
        'Thosz' => ['Abilakk', 'Aylus', 'Eldur'],
        'Zamaro' => ['Ber\'Tho', 'Bimasa', 'Saldeti'],
        'Aonad' => ['Otima', 'Ruhe', 'Comst'],
        'Avansa' => ['Corva', 'Roshar', 'Ruhe', 'Otima'],
        'Comst' => ['Thaylen', 'Burran', 'Aonad'],
        'Crios' => ['Adia', 'Qeyma', 'Stilhe','Corva'],
        'Eldur' => ['Klefaski', 'Nyrheimur', 'Hrojost', 'Thosz'],
        'Framtid' => ['Innlasn', 'Hrojost', 'Nujord'],
        'Helvi' => ['Zhian', 'Klefaski', 'Lenara'],
        'Hrojost' => ['Nyrheimur', 'Framtid', 'Nujord', 'Eldur'],
        'Innlasn' => ['Tefkari', 'Vantar', 'Framtid'],
        'Klefaski' => ['Vantar', 'Helvi', 'Eldur'],
        'Otima' => ['Avansa', 'Ruhe', 'Aonad'],
        'Roshar' => ['Corva', 'Avansa', 'Thaylen', 'Stilhe'],
        'Ruhe' => ['Avansa', 'Otima', 'Aonad'],
        'Tefkari' => ['Innlasn', 'Vantar', 'Zhian'],
        'Thaylen' => ['Burran', 'Roshar', 'Comst'],
        'Vantar' => ['Tefkari', 'Innlasn', 'Klefaski', 'Nyrheimur'],
        'Asiti' => ['Parturi', 'Kolava', 'Qeyma'],
        'Bolari' => ['Kolava', 'Parturi', 'Brijac', 'Barasa'],
        'Brijac' => ['Bolari', 'Saldeti', 'Beku', 'Barasa'],
        'Burran' => ['Stilhe', 'Thaylen', 'Comst', 'Barasa'],
        'Ezla' => ['Hoobishan', 'Perim', 'Temeri'],
        'Hoobishan' => ['Mak\'ala', 'Perim', 'Ezla', 'Vemira'],
        'Kolava' => ['Qeyma', 'Asiti', 'Bolari'],
        'Lenara' => ['Triss', 'Helvi', 'Abilakk'],
        'Parturi' => ['Anzat', 'Bolari', 'Asiti'],
        'Perim' => ['Hoobishan', 'Ezla', 'Temeri'],
        'Qeyma' => ['Crios', 'Asiti', 'Kolava'],
        'Stilhe' => ['Roshar', 'Crios', 'Burran'],
        'Tigan' => ['Vemira', 'Triss', 'Tezera'],
        'Triss' => ['Mak\'ala', 'Zhian', 'Lenara', 'Tigan'],
        'Vemira' => ['Hoobishan', 'Tigan', 'Tezera'],
        'Zhian' => ['Tefkari', 'Helvi', 'Triss', 'Mak\'ala'],
    ];

    public static function getTerritoryRoutes(): array {
        return self::$routes;
    }
    public static function getTerritoryData(): array {
        return self::$territories;
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function getCapture($territory): string {
        return self::getKeyValue($territory, self::KEY_CAPTURE);
    }

    public static function getParticle($territory): string {
        return ucwords(self::getKeyValue($territory, self::KEY_PARTICLE)) . ' Particle';
    }

    /**
     * @param $territory
     *
     * @return string
     */
    public static function getLevel($territory): string {
        return self::getKeyValue($territory, self::KEY_LEVEL);
    }

    /**
     * @param $territory
     * @param $key
     * @return string
     * @throws InvalidArgumentException
     */
    protected static function getKeyValue($territory, $key): string {
        $territory = trim($territory);
        if(!isset(self::$territories[$territory])) throw new InvalidArgumentException("Territory '{$territory}' could not be found in Territory List");
        return self::$territories[$territory][$key];
    }

    /**
     * @param $level
     *
     * @return int Territory Defense Time in minutes
     */
    public static function defenseTime($level): int {
        return match ($level) {
            self::LEVEL_1_STAR => 30,
            self::LEVEL_2_STAR => 45,
            default => 60,
        };
    }
}