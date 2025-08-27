<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Division;
use App\Models\Position;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = DB::table('employees')
            ->select('divisi', 'departemen', 'seksi', 'posisi')
            ->whereNotNull('divisi')
            ->whereNotNull('departemen')
            ->whereNotNull('seksi')
            ->whereNotNull('posisi')
            ->distinct()
            ->get();

        foreach ($employees as $e) {
            // Division
            $division = Division::firstOrCreate([
                'name' => trim($e->divisi),
            ]);

            // Department (linked to Division)
            $department = Department::firstOrCreate([
                'name' => trim($e->departemen),
                'division_id' => $division->id,
            ]);

            // Section (linked to Department)
            $section = Section::firstOrCreate([
                'name' => trim($e->seksi),
                'department_id' => $department->id,
            ]);

            // Position (linked to Section)
            $position = Position::firstOrCreate([
                'name' => trim($e->posisi),
                'section_id' => $section->id,
            ]);
        }
    }
}
