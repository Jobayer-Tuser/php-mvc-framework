<?php

namespace App\Models;

use Provider\Handlers\Eloquent;

class Admin extends Eloquent
{
    protected static $table = "admins";
}