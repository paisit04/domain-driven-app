<?php

namespace Claim\Submission\Domain\Contracts;

use Claim\Submission\Domain\Models\Claim;
use Claim\Submission\Domain\Contracts\ClaimSpecificationInterface;

interface ClaimRepositoryInterface
{
    public function query(ClaimSpecificationInterface $specification);
}
