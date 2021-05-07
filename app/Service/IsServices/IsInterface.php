<?php
namespace App\Service\IsServices;


interface IsInterface
{
    public function isMultiple(): ?string;
    public function isEqual(): ?string;

}