<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    /**
     * @var table
     */
    protected $table = 'user_social_accounts';

    /**
     * @var timestamps
     */
    public $timestamps = false;

    /**
     * @var
     */
    protected $fillable = [
        'user_id', 'provider', 'uid_provider',
    ];
}
