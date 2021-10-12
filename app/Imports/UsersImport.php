<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

use Hash;
class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    private $rows = 0;

    public function model(array $row)
    {
        ++$this->rows;

        return new User([
            'pfNumber'=>$row['PF_NUMBER'],
            'firstname'=>$row['FIRST_NAME'],
            'middlename'=>$row['MIDDLE_NAME'],
            'surname'=>$row['SURNAME'],
            'department'=>$row['DEPARTMENT'],
            'password'=>Hash::make($row['PF_NUMBER']),
        ]);
            
        }

        public function rules(): array
    {
        return [
            '*.PF_NUMBER' => ['required', 'integer', 'min:100', 'max:9999', 'unique:users,pfNumber'],
            '*.FIRST_NAME' => ['required', 'string'],
            '*.MIDDLE_NAME' => ['required', 'string'],
            '*.SURNAME' => ['required', 'string'],
            '*.DEPARTMENT' => ['required', 'string', 'min:3', 'max:50'],
        ];
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }


}
