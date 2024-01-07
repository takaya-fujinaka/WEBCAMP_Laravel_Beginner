<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedTask extends \App\Models\Task
{
    use HasFactory;
    /**
     * 複数代入不可能な属性
     */
     protected $guarded = [];
     /**
      * 「重要度」用の定数
      */
      const PRIORITY_VALUE = [
          1 => '低い',
          2 => '普通',
          3 => '高い',
      ];
      public function getPriorityString()
      {
          return $this::PRIORITY_VALUE[ $this->priority] ??'';
      }
}
