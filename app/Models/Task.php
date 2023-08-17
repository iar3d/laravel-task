<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Comment
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $status
 * @property \Carbon\Carbon $deadline
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at

*/
class Task extends Model
{
  protected $table = "tasks";
  protected $fillable = ['title', 'description','status', 'deadline'];
  use HasFactory;
}
