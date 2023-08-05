<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ObatHerbal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The roles that belong to the ObatHerbal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pendaftaran(): BelongsToMany
    {
        return $this->belongsToMany(Pendaftaran::class, 'pendaftaran_obats');
    }
}
