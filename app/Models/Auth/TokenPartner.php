<?php

namespace App\Models\Auth;

use App\Shared\Trait\Slack;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TokenPartner extends Model
{
    use HasFactory, Notifiable, Slack;

    protected $fillable = [
        'name', 'document', 'token', 'homologated', 'date_homologated'
    ];
}
