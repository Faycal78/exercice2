<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function index()
    {
        $tasks = Task::all();
        return view('dashboard', ['tasks' => $tasks]);
    }


    protected $fillable = [
        'title', 'description' ];
}
