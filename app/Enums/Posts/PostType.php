<?php


namespace App\Enums\Posts;


use BenSampo\Enum\Enum;

final class PostType extends Enum
{
    const POST = 'post';
    const NEW = 'new';
    const BANNER = 'banner';
}
