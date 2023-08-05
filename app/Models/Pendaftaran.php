<?php

namespace App\Models;

use App\MOdels\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pasien(){
        return $this->BelongsTo(Pasien::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obat yang dimiliki pendaftaran ini
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function obat(): BelongsToMany
    {
        return $this->belongsToMany(ObatHerbal::class, 'pendaftaran_obats');
    }

    /**
     * The terapi that belong to the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function terapi(): BelongsToMany
    {
        return $this->belongsToMany(Terapi::class, 'pendaftaran_terapis');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($pendaftaran) {
            // Hapus semua entri pivot yang terhubung dengan pendaftaran yang dihapus
            $pendaftaran->obat()->detach();
            $pendaftaran->terapi()->detach();
        });
    }
}
