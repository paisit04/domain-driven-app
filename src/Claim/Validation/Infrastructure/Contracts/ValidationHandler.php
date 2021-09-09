<?php
namespace Claim\Validation\Infrastructure\Contracts;

interface ValidationHandler
{
    public function handleError($error);
    public function validate();
    public function getModel();
}
