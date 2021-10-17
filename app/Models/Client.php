<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string middle_name
 * @property string last_name
 * @property array courses
 * @property float total_deb
 */
class Client extends Model
{
    protected $fillable = ['id', 'name' , 'middle_name', 'last_name', 'courses', 'total_deb'];
}
