<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Terapi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_terapi', 'harga', 'gambar'];

    /**
     * The pendaftaran that belong to the Terapi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pendaftaran(): BelongsToMany
    {
        return $this->belongsToMany(Pendaftaran::class, 'pendaftaran_terapis');
    }
}
