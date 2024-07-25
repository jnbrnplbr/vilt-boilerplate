<?php

namespace Database\Seeders;

use App\Models\Utilities\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->truncate();

        $modules_lists = [
            "Dashboard" => [
                "is_a_menu"     => 1,
                "description"   => "Dashboard", 
                "code"          => "DB",
                "permission"   => 'dashboard',
                "parent"        => null,
                "icon"          => "mdiMonitor",  
                "permalink"     => "dashboard",
                "root"          => "dashboard",
                "children"      => [],
            ],
            "Developers Option" => [ 
                "is_a_menu"     => 1,
                "description"   => "Developers Option", 
                "code"          => "DO",
                "permission"    => 'do.menu',
                "parent"        => null,
                "icon"          => "mdiCodeBraces", 
                "permalink"     => "",
                "root"          => "developers", 
                "children" =>
                    [
                        [
                            "is_a_menu"     => 1,
                            "description"   => "Components",
                            "code"          => "DO100000", 
                            "permission"    => "components.menu",
                            "parent"        => null,
                            "icon"          => "",  
                            "permalink"     => "",
                            "root"          => "developers/components", 
                            "children" => [
                                [
                                    "is_a_menu"     => 1,
                                    "description"   => "Auto Complete",
                                    "code"          => "DO100001", 
                                    "permission"    => "autocomplete",
                                    "parent"        => null,
                                    "icon"          => "",  
                                    "permalink"     => "autocompletes", 
                                    "root"          => "developers/components",  
                                    "children"      => []
                                ],
                                [
                                    "is_a_menu"     => 1,
                                    "description"   => "Data Tables",
                                    "code"          => "DO100002", 
                                    "permission"    => "datatables",
                                    "parent"        => null,
                                    "icon"          => "",  
                                    "permalink"     => "datatables", 
                                    "root"          => "developers/components",  
                                    "children"      => []
                                ],
                            ]
                        ]
                    ]
            ]
        ];



        $parent = array_keys($modules_lists);
        foreach ($parent as $value) {
            $main = $modules_lists[$value];
            $parent_id = Module::create([
                    "is_a_menu"     => $main["is_a_menu"],
                    "description"   => $main["description"], 
                    "code"          => $main["code"],
                    "permission"   =>  $main["permission"],
                    "parent"        => $main["parent"], 
                    "icon"          => $main["icon"], 
                    "permalink"     => $main["permalink"], 
                    "root"          => $main["root"] ?? "",
                    "created_by"    => 1
                ])->id;


            if (sizeof($main["children"])) {
                foreach ($main["children"] as $child) {
                    $this->saveChildren($child, $parent_id);
                }
            }
        }
        
    }

    private function saveChildren($child, $parent_id)
    {
        $pid = Module::create([
                "is_a_menu"     => $child["is_a_menu"],
                "description"   => $child["description"], 
                "code"          => $child["code"],
                "permission"    => $child["permission"],
                "icon"          => $child["icon"], 
                "permalink"     => $child["permalink"], 
                "root"          => $child["root"] ?? "",
                "created_by"    => 1,
                "parent"        => $parent_id, 
            ])->id;

        if (isset($child['children']) && sizeof($child['children']) > 0) {
            foreach ($child['children'] as $value) {
                $this->saveChildren($value, $pid);
                // $pid = Transaction::create(["icon" => $child["icon"], "transaction_code" => $child["code"], "permalink" => $child["permalink"], "description" => $child["description"], "parent_id" => $parent_id, "created_by" => Authorization::first()])->id;  
            }
        }
    }
}
