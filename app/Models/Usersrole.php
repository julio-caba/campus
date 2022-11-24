<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersrole extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'usersroles';

    protected $fillable = ['nombre','rol'];
	
}
