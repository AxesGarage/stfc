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

    const TERRITORY_HOOBISHAN = 'Hoobishan';
    const TERRITORY_ZHIAN = 'Zhian';
    const TERRITORY_CRIOS = 'Crios';
    const TERRITORY_BOLARI = 'Bolari';
    const TERRITORY_ROSHAR = 'Roshar';
    const TERRITORY_BIMASA = 'Bimasa';
    const TERRITORY_DUPORTAS = 'Duportas';
    const TERRITORY_ELDUR = 'Eldur';
    const TERRITORY_ABILAKK = 'Abilakk';
    const TERRITORY_ADIA = 'Adia';
    const TERRITORY_OTIMA = 'Otima';
    const TERRITORY_PERIM = 'Perim';
    const TERRITORY_THAYLEN = 'Thaylen';
    const TERRITORY_ASITI = 'Asiti';
    const TERRITORY_TEFKARI = 'Tefkari';
    const TERRITORY_NUJORD = 'Nujord';
    const TERRITORY_ZAMARO = 'Zamaro';
    const TERRITORY_THOSZ = 'Thosz';
    const TERRITORY_LENARA = 'Lenara';
    const TERRITORY_VANTAR = 'Vantar';
    const TERRITORY_AVANSA = 'Avansa';
    const TERRITORY_BURRAN = 'Burran';
    const TERRITORY_TRISS = 'Triss';
    const TERRITORY_BRIJAC = 'Brijac';
    const TERRITORY_HROJOST = 'Hrojost';
    const TERRITORY_TEZERA = 'Tezera';
    const TERRITORY_ANZAT = 'Anzat';
    const TERRITORY_BERTHO = 'Ber\'Tho';
    const TERRITORY_COMST = 'Comst';
    const TERRITORY_FRAMTID = 'Framtid';
    const TERRITORY_RUHE = 'Ruhe';
    const TERRITORY_SALDETI = 'Saldeti';
    const TERRITORY_EZLA = 'Ezla';
    const TERRITORY_KOLAVA = 'Kolava';
    const TERRITORY_BEKU = 'Beku';
    const TERRITORY_KLEFASKI = 'Klefaski';
    const TERRITORY_TAZOLKA = 'Tazolka';
    const TERRITORY_TIGAN = 'Tigan';
    const TERRITORY_MAKALA = 'Mak\'ala';
    const TERRITORY_CORVA = 'Corva';
    const TERRITORY_NYRHEIMUR = 'Nyrheimur';
    const TERRITORY_BARASA = 'Barasa';
    const TERRITORY_THOLUS = 'Tholus';
    const TERRITORY_BRELLAN = 'Brellan';
    const TERRITORY_QEYMA = 'Qeyma';
    const TERRITORY_GELIDA = 'Gelida';
    const TERRITORY_INNLASN = 'Innlasn';
    const TERRITORY_VEMIRA = 'Vemira';
    const TERRITORY_HELVI = 'Helvi';
    const TERRITORY_AONAD = 'Aonad';
    const TERRITORY_TEMERI = 'Temeri';
    const TERRITORY_STILHE = 'Stilhe';
    const TERRITORY_PARTURI = 'Parturi';
    const TERRITORY_AYLUS = 'Aylus';


    protected static array $territories = [
        self::TERRITORY_HOOBISHAN => [self::KEY_CAPTURE => 'Monday 5pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_ZHIAN => [self::KEY_CAPTURE => 'Monday 6pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_CRIOS => [self::KEY_CAPTURE => 'Monday 7pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_BOLARI => [self::KEY_CAPTURE => 'Monday 8pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_ROSHAR => [self::KEY_CAPTURE => 'Monday 9pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_BIMASA => [self::KEY_CAPTURE => 'Monday 10pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_DUPORTAS => [self::KEY_CAPTURE => 'Monday 11pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_ELDUR => [self::KEY_CAPTURE => 'Tuesday 12am UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_ABILAKK => [self::KEY_CAPTURE => 'Tuesday 1am UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],

        self::TERRITORY_ADIA => [self::KEY_CAPTURE => 'Wednesday 4pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_OTIMA => [self::KEY_CAPTURE => 'Wednesday 5pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_PERIM => [self::KEY_CAPTURE => 'Wednesday 6pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_THAYLEN => [self::KEY_CAPTURE => 'Wednesday 7pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_ASITI => [self::KEY_CAPTURE => 'Wednesday 8pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_TEFKARI => [self::KEY_CAPTURE => 'Wednesday 9pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_NUJORD => [self::KEY_CAPTURE => 'Wednesday 10pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_ZAMARO => [self::KEY_CAPTURE => 'Wednesday 11pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_THOSZ => [self::KEY_CAPTURE => 'Thursday 12am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_LENARA => [self::KEY_CAPTURE => 'Thursday 1am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],

        self::TERRITORY_VANTAR => [self::KEY_CAPTURE => 'Thursday 5pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_AVANSA => [self::KEY_CAPTURE => 'Thursday 6pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_BURRAN => [self::KEY_CAPTURE => 'Thursday 7pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_TRISS => [self::KEY_CAPTURE => 'Thursday 8pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_BRIJAC => [self::KEY_CAPTURE => 'Thursday 9pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_HROJOST => [self::KEY_CAPTURE => 'Thursday 10pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_TEZERA => [self::KEY_CAPTURE => 'Thursday 11pm UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_ANZAT => [self::KEY_CAPTURE => 'Friday 12am UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_BERTHO => [self::KEY_CAPTURE => 'Friday 1am UTC', self::KEY_LEVEL => self::LEVEL_2_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],

        self::TERRITORY_COMST => [self::KEY_CAPTURE => 'Friday 4pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_FRAMTID => [self::KEY_CAPTURE => 'Friday 5pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_RUHE => [self::KEY_CAPTURE => 'Friday 6pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_SALDETI => [self::KEY_CAPTURE => 'Friday 7pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_EZLA => [self::KEY_CAPTURE => 'Friday 8pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_KOLAVA => [self::KEY_CAPTURE => 'Friday 9pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_BEKU => [self::KEY_CAPTURE => 'Friday 10pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_KLEFASKI => [self::KEY_CAPTURE => 'Friday 11pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_TAZOLKA => [self::KEY_CAPTURE => 'Saturday 12am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_TIGAN => [self::KEY_CAPTURE => 'Saturday 1am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],

        self::TERRITORY_MAKALA => [self::KEY_CAPTURE => 'Saturday 8pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        self::TERRITORY_CORVA => [self::KEY_CAPTURE => 'Saturday 9pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        self::TERRITORY_NYRHEIMUR => [self::KEY_CAPTURE => 'Saturday 10pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        self::TERRITORY_BARASA => [self::KEY_CAPTURE => 'Saturday 11pm UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        self::TERRITORY_THOLUS => [self::KEY_CAPTURE => 'Sunday 12am UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],
        self::TERRITORY_BRELLAN => [self::KEY_CAPTURE => 'Sunday 1am UTC', self::KEY_LEVEL => self::LEVEL_3_STAR, self::KEY_PARTICLE => self::PARTICLE_METREON],

        self::TERRITORY_QEYMA => [self::KEY_CAPTURE => 'Sunday 4pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_GELIDA => [self::KEY_CAPTURE => 'Sunday 5pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_INNLASN => [self::KEY_CAPTURE => 'Sunday 6pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_VEMIRA => [self::KEY_CAPTURE => 'Sunday 7pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_HELVI => [self::KEY_CAPTURE => 'Sunday 8pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_AONAD => [self::KEY_CAPTURE => 'Sunday 9pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_QUANTUM],
        self::TERRITORY_TEMERI => [self::KEY_CAPTURE => 'Sunday 10pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
        self::TERRITORY_STILHE => [self::KEY_CAPTURE => 'Sunday 11pm UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_PARTURI => [self::KEY_CAPTURE => 'Monday 12am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_SURAX],
        self::TERRITORY_AYLUS => [self::KEY_CAPTURE => 'Monday 1am UTC', self::KEY_LEVEL => self::LEVEL_1_STAR, self::KEY_PARTICLE => self::PARTICLE_PHANTOM],
    ];

    protected static array $routes = [
        self::TERRITORY_BARASA => [self::TERRITORY_BOLARI, self::TERRITORY_BRIJAC, self::TERRITORY_BURRAN],
        self::TERRITORY_BRELLAN => [self::TERRITORY_DUPORTAS, self::TERRITORY_BERTHO, self::TERRITORY_BIMASA],
        self::TERRITORY_CORVA => [self::TERRITORY_CRIOS, self::TERRITORY_ROSHAR, self::TERRITORY_AVANSA],
        self::TERRITORY_MAKALA => [self::TERRITORY_ZHIAN, self::TERRITORY_TRISS, self::TERRITORY_HOOBISHAN],
        self::TERRITORY_NYRHEIMUR => [self::TERRITORY_VANTAR, self::TERRITORY_ELDUR, self::TERRITORY_HROJOST],
        self::TERRITORY_THOLUS => [self::TERRITORY_ABILAKK, self::TERRITORY_ANZAT, self::TERRITORY_TEZERA],
        self::TERRITORY_ABILAKK => [self::TERRITORY_THOLUS, self::TERRITORY_LENARA, self::TERRITORY_THOSZ],
        self::TERRITORY_ADIA => [self::TERRITORY_TEMERI, self::TERRITORY_TEZERA, self::TERRITORY_CRIOS],
        self::TERRITORY_ANZAT => [self::TERRITORY_THOLUS, self::TERRITORY_PARTURI, self::TERRITORY_TAZOLKA],
        self::TERRITORY_AYLUS => [self::TERRITORY_DUPORTAS, self::TERRITORY_THOSZ, self::TERRITORY_TAZOLKA],
        self::TERRITORY_BEKU => [self::TERRITORY_BIMASA, self::TERRITORY_GELIDA, self::TERRITORY_BRIJAC],
        self::TERRITORY_BERTHO => [self::TERRITORY_TAZOLKA, self::TERRITORY_DUPORTAS, self::TERRITORY_BRELLAN, self::TERRITORY_ZAMARO],
        self::TERRITORY_BIMASA => [self::TERRITORY_BRELLAN, self::TERRITORY_ZAMARO, self::TERRITORY_GELIDA, self::TERRITORY_BEKU],
        self::TERRITORY_DUPORTAS => [self::TERRITORY_NUJORD, self::TERRITORY_AYLUS, self::TERRITORY_BERTHO, self::TERRITORY_BRELLAN],
        self::TERRITORY_GELIDA => [self::TERRITORY_SALDETI, self::TERRITORY_BIMASA, self::TERRITORY_BEKU],
        self::TERRITORY_NUJORD => [self::TERRITORY_HROJOST, self::TERRITORY_FRAMTID, self::TERRITORY_DUPORTAS],
        self::TERRITORY_SALDETI => [self::TERRITORY_ZAMARO, self::TERRITORY_GELIDA, self::TERRITORY_BRIJAC],
        self::TERRITORY_TAZOLKA => [self::TERRITORY_AYLUS, self::TERRITORY_ANZAT, self::TERRITORY_BERTHO],
        self::TERRITORY_TEMERI => [self::TERRITORY_PERIM, self::TERRITORY_EZLA, self::TERRITORY_ADIA],
        self::TERRITORY_TEZERA => [self::TERRITORY_VEMIRA, self::TERRITORY_TIGAN, self::TERRITORY_THOLUS, self::TERRITORY_ADIA],
        self::TERRITORY_THOSZ => [self::TERRITORY_ABILAKK, self::TERRITORY_AYLUS, self::TERRITORY_ELDUR],
        self::TERRITORY_ZAMARO => [self::TERRITORY_BERTHO, self::TERRITORY_BIMASA, self::TERRITORY_SALDETI],
        self::TERRITORY_AONAD => [self::TERRITORY_OTIMA, self::TERRITORY_RUHE, self::TERRITORY_COMST],
        self::TERRITORY_AVANSA => [self::TERRITORY_CORVA, self::TERRITORY_ROSHAR, self::TERRITORY_RUHE, self::TERRITORY_OTIMA],
        self::TERRITORY_COMST => [self::TERRITORY_THAYLEN, self::TERRITORY_BURRAN, self::TERRITORY_AONAD],
        self::TERRITORY_CRIOS => [self::TERRITORY_ADIA, self::TERRITORY_QEYMA, self::TERRITORY_STILHE, self::TERRITORY_CORVA],
        self::TERRITORY_ELDUR => [self::TERRITORY_KLEFASKI, self::TERRITORY_NYRHEIMUR, self::TERRITORY_HROJOST, self::TERRITORY_THOSZ],
        self::TERRITORY_FRAMTID => [self::TERRITORY_INNLASN, self::TERRITORY_HROJOST, self::TERRITORY_NUJORD],
        self::TERRITORY_HELVI => [self::TERRITORY_ZHIAN, self::TERRITORY_KLEFASKI, self::TERRITORY_LENARA],
        self::TERRITORY_HROJOST => [self::TERRITORY_NYRHEIMUR, self::TERRITORY_FRAMTID, self::TERRITORY_NUJORD, self::TERRITORY_ELDUR],
        self::TERRITORY_INNLASN => [self::TERRITORY_TEFKARI, self::TERRITORY_VANTAR, self::TERRITORY_FRAMTID],
        self::TERRITORY_KLEFASKI => [self::TERRITORY_VANTAR, self::TERRITORY_HELVI, self::TERRITORY_ELDUR],
        self::TERRITORY_OTIMA => [self::TERRITORY_AVANSA, self::TERRITORY_RUHE, self::TERRITORY_AONAD],
        self::TERRITORY_ROSHAR => [self::TERRITORY_CORVA, self::TERRITORY_AVANSA, self::TERRITORY_THAYLEN, self::TERRITORY_STILHE],
        self::TERRITORY_RUHE => [self::TERRITORY_AVANSA, self::TERRITORY_OTIMA, self::TERRITORY_AONAD],
        self::TERRITORY_TEFKARI => [self::TERRITORY_INNLASN, self::TERRITORY_VANTAR, self::TERRITORY_ZHIAN],
        self::TERRITORY_THAYLEN => [self::TERRITORY_BURRAN, self::TERRITORY_ROSHAR, self::TERRITORY_COMST],
        self::TERRITORY_VANTAR => [self::TERRITORY_TEFKARI, self::TERRITORY_INNLASN, self::TERRITORY_KLEFASKI, self::TERRITORY_NYRHEIMUR],
        self::TERRITORY_ASITI => [self::TERRITORY_PARTURI, self::TERRITORY_KOLAVA, self::TERRITORY_QEYMA],
        self::TERRITORY_BOLARI => [self::TERRITORY_KOLAVA, self::TERRITORY_PARTURI, self::TERRITORY_BRIJAC, self::TERRITORY_BARASA],
        self::TERRITORY_BRIJAC => [self::TERRITORY_BOLARI, self::TERRITORY_SALDETI, self::TERRITORY_BEKU, self::TERRITORY_BARASA],
        self::TERRITORY_BURRAN => [self::TERRITORY_STILHE, self::TERRITORY_THAYLEN, self::TERRITORY_COMST, self::TERRITORY_BARASA],
        self::TERRITORY_EZLA => [self::TERRITORY_HOOBISHAN, self::TERRITORY_PERIM, self::TERRITORY_TEMERI],
        self::TERRITORY_HOOBISHAN => [self::TERRITORY_MAKALA, self::TERRITORY_PERIM, self::TERRITORY_EZLA, self::TERRITORY_VEMIRA],
        self::TERRITORY_KOLAVA => [self::TERRITORY_QEYMA, self::TERRITORY_ASITI, self::TERRITORY_BOLARI],
        self::TERRITORY_LENARA => [self::TERRITORY_TRISS, self::TERRITORY_HELVI, self::TERRITORY_ABILAKK],
        self::TERRITORY_PARTURI => [self::TERRITORY_ANZAT, self::TERRITORY_BOLARI, self::TERRITORY_ASITI],
        self::TERRITORY_PERIM => [self::TERRITORY_HOOBISHAN, self::TERRITORY_EZLA, self::TERRITORY_TEMERI],
        self::TERRITORY_QEYMA => [self::TERRITORY_CRIOS, self::TERRITORY_ASITI, self::TERRITORY_KOLAVA],
        self::TERRITORY_STILHE => [self::TERRITORY_ROSHAR, self::TERRITORY_CRIOS, self::TERRITORY_BURRAN],
        self::TERRITORY_TIGAN => [self::TERRITORY_VEMIRA, self::TERRITORY_TRISS, self::TERRITORY_TEZERA],
        self::TERRITORY_TRISS => [self::TERRITORY_MAKALA, self::TERRITORY_ZHIAN, self::TERRITORY_LENARA, self::TERRITORY_TIGAN],
        self::TERRITORY_VEMIRA => [self::TERRITORY_HOOBISHAN, self::TERRITORY_TIGAN, self::TERRITORY_TEZERA],
        self::TERRITORY_ZHIAN => [self::TERRITORY_TEFKARI, self::TERRITORY_HELVI, self::TERRITORY_TRISS, self::TERRITORY_MAKALA],
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
     * @return string[]
     */
    public static function getRoutes($territory): array {
        if (!isset(self::$routes[$territory])) throw new InvalidArgumentException("Territory '{$territory}' could not be found in Routes List");
        return self::$routes[$territory];
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
     *
     * @return string
     * @throws InvalidArgumentException
     */
    protected static function getKeyValue($territory, $key): string {
        $territory = trim($territory);
        if (!isset(self::$territories[$territory])) throw new InvalidArgumentException("Territory '{$territory}' could not be found in Territory List");
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