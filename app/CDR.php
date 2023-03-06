<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class CDR extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cdr';
}
