<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class LinkType extends Enum
{
    const DEFAULT = 1;
    const INFORMATION = 2;
    const SOCIAL = 3;
    const EMOTION = 4;

    public static function getDescription($value): string
    {
        if ($value === self::DEFAULT) {
            return '默认分类';
        }
        if ($value === self::INFORMATION) {
            return '新闻资讯';
        }
        if ($value === self::SOCIAL) {
            return '社交媒体';
        }
        if ($value === self::EMOTION) {
            return '情感交友';
        }
        return parent::getDescription($value);
    }

    public static function getValue(string $key): int
    {
        if ($key === '默认分类') {
            return self::DEFAULT;
        }
        if ($key === '新闻资讯') {
            return self::INFORMATION;
        }
        if ($key === '社交媒体') {
            return self::SOCIAL;
        }
        if ($key === '情感交友') {
            return self::EMOTION;
        }
        return parent::getValue($key);
    }
}
