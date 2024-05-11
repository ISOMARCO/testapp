<?php
namespace App\Enums;
enum Country : string
{
    case AZ = 'Azərbaycan';
    case TR = 'Türkiyə';
    case RU = 'Rusiya';
    case US = 'Amerika';
    case DE = 'Almaniya';
    case FR = 'Fransa';
    case CN = 'Çin';
    case JP = 'Yaponiya';
    case KR = 'Cənubi Koreya';
    case BR = 'Braziliya';
    case GB = 'Böyük Britaniya';
    case IT = 'İtaliya';
    case ES = 'İspaniya';
    case CA = 'Kanada';
    case AU = 'Avstraliya';
    case IN = 'Hindistan';
    case ID = 'İndoneziya';
    case PK = 'Pakistan';

    public static function fromName(string $name): string
    {
        $name = strtoupper($name);
        foreach (self::cases() as $status) {
            if( $name === $status->name ){
                return $status->value;
            }
        }
        return $name;
    }
}
