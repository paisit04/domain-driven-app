<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Claim\Submission\Domain\Models\CptCode;

class CptCodeCombo extends Model
{
    public $table = 'cpt_code_combos';

    protected $guarded = ['id'];

    public function cptCodes()
    {
        return $this->belongsToMany(CptCode::class, 'cpt_code_combo_lookup');
    }
}
