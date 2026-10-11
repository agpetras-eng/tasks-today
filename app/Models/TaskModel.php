<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table         = 'tasks';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    // Only the tasks whose task_date is today
    public function getTodayTasks()
    {
        $today = date('Y-m-d');

        return $this->where('task_date', $today)->findAll();
    }

    // Every task, ordered by date
    public function getAllTasks()
    {
        return $this->orderBy('task_date', 'ASC')
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }
}
