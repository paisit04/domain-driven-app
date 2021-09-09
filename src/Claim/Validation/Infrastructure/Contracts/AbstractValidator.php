<?php
namespace Claim\Validation\Infrastructure\Validators;

use Claim\Validation\Infrastructure\Contracts\ValidationHandler;

abstract class AbstractValidator
{
    private $validationHandler;
    public function __construct(ValidationHandler $validationHandler)
    {
        $this->validationHandler = $validationHandler;
    }
    public function handleError($error)
    {
        $this->validationHandler->handleError($error);
    }
    abstract public function validate();
    abstract public function getModel();
}
