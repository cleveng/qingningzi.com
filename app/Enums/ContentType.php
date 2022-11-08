<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ContentType extends Enum
{

    const DEFAULT = 0;
    const ARTICLE = 1;
    const MEDIUM = 2;
    const IMAGE = 3;
    const VIDEO = 4;
    const MOOD = 5;
    const IDOL = 6;

    public static function getDescription($value): string
    {
        if ($value === self::ARTICLE) {
            return '文章';
        }
        if ($value === self::MEDIUM) {
            return '附件';
        }
        if ($value === self::IMAGE) {
            return '图片';
        }
        if ($value === self::VIDEO) {
            return '视频';
        }
        if ($value === self::MOOD) {
            return '情感';
        }
        if ($value === self::IDOL) {
            return '人物';
        }
        return parent::getDescription($value);
    }

    public static function getValue(string $key): int
    {
        if ($key === '文章') {
            return self::ARTICLE;
        }
        if ($key === '附件') {
            return self::MEDIUM;
        }
        if ($key === '图片') {
            return self::IMAGE;
        }
        if ($key === '视频') {
            return self::VIDEO;
        }
        if ($key === '情感') {
            return self::MOOD;
        }
        if ($key === '人物') {
            return self::IDOL;
        }
        return parent::getValue($key);
    }
}
