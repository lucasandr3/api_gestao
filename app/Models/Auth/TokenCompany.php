<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenCompany extends Model
{
    use HasFactory;

    protected $fillable = ['token_partner_id', 'token'];
}
