<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moduleDashboard = Module::updateOrCreate(['name' => 'Dashboard Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'dashboard',
        ]);

        /*Role module Permission*/
        $moduleRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'View',
            'slug' => 'roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Create',
            'slug' => 'roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Edit',
            'slug' => 'roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Delete',
            'slug' => 'roles.destroy',
        ]);

        /*User Module Permission*/
        $moduleUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'View',
            'slug' => 'users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Create',
            'slug' => 'users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Edit',
            'slug' => 'users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Delete',
            'slug' => 'users.destroy',
        ]);

        /*Backups Module Permission*/
        $backupModule = Module::updateOrCreate(['name' => 'System Backups']);
        Permission::updateOrCreate([
            'module_id' => $backupModule->id,
            'name' => 'View',
            'slug' => 'backup.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $backupModule->id,
            'name' => 'Create',
            'slug' => 'backup.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $backupModule->id,
            'name' => 'Download Backup',
            'slug' => 'backup.download',
        ]);
        Permission::updateOrCreate([
            'module_id' => $backupModule->id,
            'name' => 'Delete',
            'slug' => 'backup.destroy',
        ]);

        /*Log Module Permission*/
        $moduleUser = Module::updateOrCreate(['name' => 'User Activity Logs']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'View Logs',
            'slug' => 'logs.show',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Delete Log',
            'slug' => 'logs.delete',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Download Logs',
            'slug' => 'logs.download',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Delete All Logs',
            'slug' => 'logs.destroy',
        ]);


        /*Slider Module Permission*/
        $moduleSlider = Module::updateOrCreate(['name' => 'Slider Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleSlider->id,
            'name' => 'View',
            'slug' => 'slider.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleSlider->id,
            'name' => 'Create',
            'slug' => 'slider.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleSlider->id,
            'name' => 'Edit',
            'slug' => 'slider.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleSlider->id,
            'name' => 'Delete',
            'slug' => 'slider.destroy',
        ]);


        /*Journal Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Journal Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'journal.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'journal.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'journal.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'journal.destroy',
        ]);


        /*Journal Volume Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Journal Volume Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'volume-journal.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'volume-journal.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'volume-journal.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'volume-journal.destroy',
        ]);

        /*Volume Issue Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Volume Issue Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'volume-issue.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'volume-issue.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'volume-issue.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'volume-issue.destroy',
        ]);


        /*Overview Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Settings Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'settings.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'settings.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'settings.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'settings.destroy',
        ]);

        /*Report Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Report Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'report.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'report.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'report.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'report.destroy',
        ]);

        /*Report Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Gallery Category Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'gallery-category.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'gallery-category.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'gallery-category.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'gallery-category.destroy',
        ]);
        /*Report Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Gallery Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'gallery.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'gallery.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'gallery.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'gallery.destroy',
        ]);
        /*Brand Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Brand Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'brand.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'brand.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'brand.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'brand.destroy',
        ]);
        /*News Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'News Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'news.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'news.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'news.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'news.destroy',
        ]);
        /*About us Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'About Us Management']);

        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'about.create',
        ]);

        /*Page Title Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Page Title Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'page-title.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Create',
            'slug' => 'page-title.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Edit',
            'slug' => 'page-title.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'page-title.destroy',
        ]);


        /*Page Title Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Subscribe Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'subscribe.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'subscribe.destroy',
        ]);

        /*Page Title Module Permission*/
        $moduleForm = Module::updateOrCreate(['name' => 'Message Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'View',
            'slug' => 'message.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleForm->id,
            'name' => 'Delete',
            'slug' => 'message.destroy',
        ]);
    }
}
