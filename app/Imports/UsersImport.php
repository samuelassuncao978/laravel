<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            "first_name" => $row["first_name"],
            "last_name" => $row["last_name"],
            "email" => $row["email"],
            "password" => "",
        ]);
    }

    public function rules(): array
    {
        return [
            "email" => "email|unique:users",
        ];
    }
}
