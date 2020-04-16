<?php


namespace App\Domain\Support\Interfaces;


interface AuthInterface
{
    public function isAdmin(): bool;
}
