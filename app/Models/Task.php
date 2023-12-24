<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Specify the fillable fields to protect against mass assignment
    protected $fillable = ['title', 'description', 'long_description'];

    // Alternatively, use guarded to specify fields that should not be mass assignable
    // protected $guarded = ['password'];

    /**
     * Toggle the completion status of the task.
     *
     * @return void
     */
    public function toggleComplete()
    {
        // Invert the 'completed' attribute and save the changes
        $this->completed = !$this->completed;
        $this->save();
    }
}
