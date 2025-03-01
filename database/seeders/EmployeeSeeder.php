<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Spatie\Permission\Models\Role;

class EmployeeSeeder extends Seeder
{
    protected $fillable = [
        'name',
        'password',
    ];
    public function run()
{
    $admin = Employee::create([
        'name' => 'Admin',
        'password' => bcrypt('admin123'),
    ]);
    $admin->assignRole('admin');

    $employee = Employee::create([
        'name' => 'Employee',
        'password' => bcrypt('employee123'),
    ]);
    $employee->assignRole('employee');
}

}