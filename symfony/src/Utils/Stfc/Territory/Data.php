<?php

namespace App\Utils\Stfc\Territory;

use Exception;
use InvalidArgumentException;

class Data {
    const TERRITORY_CAPTURE = 'capture';
    const TERRITORY_LEVEL = 'level';

    const TERRITORY_LEVEL_1_STAR = '*';
    const TERRITORY_LEVEL_2_STAR = '**';
    const TERRITORY_LEVEL_3_STAR = '***';

    protected static array $territories = [
        'Hoobishan' => [self::TERRITORY_CAPTURE => 'Monday 5pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Zhian' => [self::TERRITORY_CAPTURE => 'Monday 6pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Crios' => [self::TERRITORY_CAPTURE => 'Monday 7pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Bolari' => [self::TERRITORY_CAPTURE => 'Monday 8pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Roshar' => [self::TERRITORY_CAPTURE => 'Monday 9pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Bimasa' => [self::TERRITORY_CAPTURE => 'Monday 10pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Duportas' => [self::TERRITORY_CAPTURE => 'Monday 11pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Eldur' => [self::TERRITORY_CAPTURE => 'Tuesday 12am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Abilakk' => [self::TERRITORY_CAPTURE => 'Tuesday 1am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],

        'Adia' => [self::TERRITORY_CAPTURE => 'Wednesday 4pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Otima' => [self::TERRITORY_CAPTURE => 'Wednesday 5pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Perim' => [self::TERRITORY_CAPTURE => 'Wednesday 6pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Thaylen' => [self::TERRITORY_CAPTURE => 'Wednesday 7pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Asiti' => [self::TERRITORY_CAPTURE => 'Wednesday 8pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Tefkari' => [self::TERRITORY_CAPTURE => 'Wednesday 9pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Nujord' => [self::TERRITORY_CAPTURE => 'Wednesday 10pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Zamaro' => [self::TERRITORY_CAPTURE => 'Wednesday 11pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Thosz' => [self::TERRITORY_CAPTURE => 'Thursday 12am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Lenara' => [self::TERRITORY_CAPTURE => 'Thursday 1am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],

        'Vantar' => [self::TERRITORY_CAPTURE => 'Thursday 5pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Avansa' => [self::TERRITORY_CAPTURE => 'Thursday 6pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Burran' => [self::TERRITORY_CAPTURE => 'Thursday 7pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Triss' => [self::TERRITORY_CAPTURE => 'Thursday 8pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Brijac' => [self::TERRITORY_CAPTURE => 'Thursday 9pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Hrojost' => [self::TERRITORY_CAPTURE => 'Thursday 10pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Tezera' => [self::TERRITORY_CAPTURE => 'Thursday 11pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Anzat' => [self::TERRITORY_CAPTURE => 'Friday 12am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],
        'Ber\'Tho' => [self::TERRITORY_CAPTURE => 'Friday 1mm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_2_STAR],

        'Comst' => [ self::TERRITORY_CAPTURE => 'Friday 4pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Framtid' => [ self::TERRITORY_CAPTURE => 'Friday 5pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Ruhe' => [ self::TERRITORY_CAPTURE => 'Friday 6pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Saldeti' => [ self::TERRITORY_CAPTURE => 'Friday 7pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Ezla' => [ self::TERRITORY_CAPTURE => 'Friday 8pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Kolava' => [ self::TERRITORY_CAPTURE => 'Friday 9pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Beku' => [ self::TERRITORY_CAPTURE => 'Friday 10pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Klefaski' => [ self::TERRITORY_CAPTURE => 'Friday 11pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Tazolka' => [ self::TERRITORY_CAPTURE => 'Saturday 12am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Tigan' => [ self::TERRITORY_CAPTURE => 'Saturday 1am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],

        'Mak\'ala' => [self::TERRITORY_CAPTURE => 'Saturday 8pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_3_STAR],
        'Corva' => [self::TERRITORY_CAPTURE => 'Saturday 9pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_3_STAR],
        'Nyrheimur' => [self::TERRITORY_CAPTURE => 'Saturday 10pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_3_STAR],
        'Barasa' => [self::TERRITORY_CAPTURE => 'Saturday 11pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_3_STAR],
        'Tholus' => [self::TERRITORY_CAPTURE => 'Sunday 12am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_3_STAR],
        'Brellan' => [self::TERRITORY_CAPTURE => 'Sunday 1am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_3_STAR],

        'Qeyma' => [self::TERRITORY_CAPTURE => 'Sunday 4pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Gelida' => [self::TERRITORY_CAPTURE => 'Sunday 5pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Innlasn' => [self::TERRITORY_CAPTURE => 'Sunday 6pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Vemira' => [self::TERRITORY_CAPTURE => 'Sunday 7pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Helvi' => [self::TERRITORY_CAPTURE => 'Sunday 8pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Aonad' => [self::TERRITORY_CAPTURE => 'Sunday 9pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Temeri' => [self::TERRITORY_CAPTURE => 'Sunday 10pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Stilhe' => [self::TERRITORY_CAPTURE => 'Sunday 11pm UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Parturi' => [self::TERRITORY_CAPTURE => 'Monday 12am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
        'Aylus' => [self::TERRITORY_CAPTURE => 'Monday 1am UTC', self::TERRITORY_LEVEL => self::TERRITORY_LEVEL_1_STAR],
    ];

    /**
     * @throws Exception
     */
    public static function getCapture($territory): string {
        $territory = trim($territory);
        if(!isset(self::$territories[$territory])) throw new InvalidArgumentException("Territory '{$territory}' could not be found in Territory List");
        return self::$territories[$territory][self::TERRITORY_CAPTURE];
    }

    /**
     * @param $territory
     *
     * @return string
     */
    public static function getLevel($territory): string {
        $territory = trim($territory);
        if(!isset(self::$territories[$territory])) throw new InvalidArgumentException("Territory '{$territory}' could not be found in Territory List");
        return self::$territories[$territory][self::TERRITORY_LEVEL];
    }

    /**
     * @param $level
     *
     * @return int
     */
    public static function defenseTime($level): int {
        return match ($level) {
            self::TERRITORY_LEVEL_1_STAR => 30,
            self::TERRITORY_LEVEL_2_STAR => 45,
            default => 60,
        };
    }
}