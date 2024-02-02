<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'document', 'token', 'homologated', 'date_homologated'
    ];
}
