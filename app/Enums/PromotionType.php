<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 *
 */
final class PromotionType extends Enum
{

    const TopBar = 1;
    const RightBar = 2;
    const BottomBar = 3;
    const LeftBar = 4;

    public static function getDescription($value): string
    {
        if ($value === self::TopBar) {
            return '头部';
        }
        if ($value === self::RightBar) {
            return '右侧';
        }
        if ($value === self::BottomBar) {
            return '底部';
        }
        if ($value === self::LeftBar) {
            return '左侧';
        }
        return parent::getDescription($value);
    }

    public static function getValue(string $key): int
    {
        if ($key === '头部') {
            return self::TopBar;
        }
        if ($key === '右侧') {
            return self::RightBar;
        }
        if ($key === '底部') {
            return self::BottomBar;
        }
        if ($key === '左侧') {
            return self::LeftBar;
        }
        return parent::getValue($key);
    }
}
