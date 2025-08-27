<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Division;
use App\Models\Position;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationalMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = DB::table('employees')->get();

        foreach ($employees as $e) {
            $division = Division::where('name', trim($e->divisi))->first();
            $department = Department::where('name', trim($e->departemen))->first();
            $section = Section::where('name', trim($e->seksi))->first();
            $position = Position::where('name', trim($e->posisi))->first();

            DB::table('employees')
                ->where('id', $e->id)
                ->update([
                    'division_id' => $division?->id,
                    'department_id' => $department?->id,
                    'section_id' => $section?->id,
                    'position_id' => $position?->id,
                ]);
        }
    }
}
