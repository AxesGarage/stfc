<?php

namespace App\Utils\Stfc;

class Status {

    const ALLIANCE_STATUS_SELF = -2;
    CONST ALLIANCE_STATUS_NEUTRAL = -1;
    CONST ALLIANCE_STATUS_ALLIED = 1;
    const ALLIANCE_STATUS_FRIENDLY = 2;
    const ALLIANCE_STATUS_CIVIL = 3;
    const ALLIANCE_STATUS_CAUTION = 4;
    const ALLIANCE_STATUS_UNFRIENDLY = 5;
    const ALLIANCE_STATUS_ENEMY = 6;

    protected function __construct(){}

    public static function getStatus($AllianceStatus): string {
        switch ($AllianceStatus){
            case self::ALLIANCE_STATUS_NEUTRAL: return 'Neutral';
            case self::ALLIANCE_STATUS_SELF: return 'Our Alliance';
            case self::ALLIANCE_STATUS_ALLIED: return 'Allied';
            case self::ALLIANCE_STATUS_FRIENDLY: return 'Friendly';
            case self::ALLIANCE_STATUS_CIVIL: return 'Civil';
            case self::ALLIANCE_STATUS_CAUTION: return 'Caution';
            case self::ALLIANCE_STATUS_UNFRIENDLY: return 'UnFriendly';
            case self::ALLIANCE_STATUS_ENEMY: return 'Enemy';
            default: return '';
        }
    }

}