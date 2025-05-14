<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListUser extends Model
{
    protected $table = "list";

    protected $fillable = [
        "user_id",
        "name",
        "value",
        "pay_type",
        "installments",
        "pay_on",
        "is_paid",
    ];
}
