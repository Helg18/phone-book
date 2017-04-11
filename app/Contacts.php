<?php

namespace phonebook;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'contact', 'phone', 'website',
    ];


}
