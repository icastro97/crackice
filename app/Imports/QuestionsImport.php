<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'question' => $row[0],
            'id_level' => $row[1],
            'id_category' => $row[2],
        ]);
    }
}
