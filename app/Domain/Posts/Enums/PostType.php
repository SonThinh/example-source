<?php


namespace App\Domain\Posts\Enums;


use BenSampo\Enum\Enum;

final class PostType extends Enum
{
    const NEW = 'new';
    const BANNER = 'banner';
}
