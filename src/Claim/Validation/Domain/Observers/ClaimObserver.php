<?php
namespace Claim\Validation\Domain\Observers;

use Claim\Submission\Domain\Models\Claim;

/*
 * It doesn't feel right to do this
 */
class ClaimObserver
{
    const DOS_MAX_AGE = '1 year';
    public function saving(Claim $claim)
    {
        $dos = new \DateTIme($claim->dos);
        $expiration = new \DateTime(static::DOS_MAX_AGE);
        if ($dos > $expiration) {
            throw new DateOfServiceExpiredException();
        } else {
            return true;
        }
    }

    /* additional class methods pertaining to the fired model event*/
    public function creating(Claim $claim)
    {
        // some other broad-scoped validation checks
        // occurring on a create + save operation
    }
}
