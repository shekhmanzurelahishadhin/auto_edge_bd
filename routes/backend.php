<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserLogActivityController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\JournalVolumeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VolumeIssueController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\NewsController;



//Language Translation

Route::group(['middleware' => 'superAdmin'], function () {

    Route::get('admin/{locale}', [DashboardController::class, 'lang']);

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class); /*admin users controller route*/


    /*backup route start*/
    Route::get('backup', [BackupController::class, 'index'])->name('backup.index');
    Route::get('backup/create', [BackupController::class, 'create'])->name('backup.create');
    Route::get('backup/download/{file_name?}', [BackupController::class, 'download'])->name('backup.download');
    Route::get('backup/delete/{file_name?}', [BackupController::class, 'delete'])->where('file_name',
        '(.*)')->name('backup.delete');

    Route::get('user-log', [UserLogActivityController::class, 'logActivity'])->name('show.log');
    Route::get('user-log/delete/{id}', [UserLogActivityController::class, 'logDelete'])->name('delete.log');
    Route::get('user-log/pdf', [UserLogActivityController::class, 'logPDF'])->name('log.pdf');
    Route::post('user-log/delete', [UserLogActivityController::class, 'deleteAllLog'])->name('delete.all.log');
});
/* --------------------------------------
super admin routes end
-----------------------------------------*/


Route::get('user/{id}/profile', [UserProfileController::class, 'index'])->name('userProfile.edit');
Route::post('password/update', [UserProfileController::class, 'password_update'])->name('password.update');


Route::get('user/profile', [AdminProfileController::class, 'index'])->name('adminProfile.index');
Route::put('user/profile/update', [AdminProfileController::class, 'update'])->name('adminProfile.update');






Route::resource('slider', SliderController::class);
Route::post('slider/trash/{id}', [SliderController::class, 'trash'])->name('slider.trash');
Route::get('slider/restore/{id}', [SliderController::class, 'restore'])->name('slider.restore');

Route::resource('gallery-category', GalleryCategoryController::class);
Route::post('gallery-category/trash/{id}', [GalleryCategoryController::class, 'trash'])->name('gallery-category.trash');
Route::get('gallery-category/restore/{id}', [GalleryCategoryController::class, 'restore'])->name('gallery-category.restore');

Route::resource('gallery', GalleryController::class);
Route::post('gallery/trash/{id}', [GalleryController::class, 'trash'])->name('gallery.trash');
Route::get('gallery/restore/{id}', [GalleryController::class, 'restore'])->name('gallery.restore');

Route::resource('brand', BrandController::class);
Route::post('brand/trash/{id}', [BrandController::class, 'trash'])->name('brand.trash');
Route::get('brand/restore/{id}', [BrandController::class, 'restore'])->name('brand.restore');

Route::get('about', [AboutUsController::class, 'create'])->name('about.create');
Route::post('about-store', [AboutUsController::class, 'store'])->name('about.store');

Route::resource('news', NewsController::class);
Route::post('news/trash/{id}', [NewsController::class, 'trash'])->name('news.trash');
Route::get('news/restore/{id}', [NewsController::class, 'restore'])->name('news.restore');

Route::resource('journal', JournalController::class);
Route::post('journal/trash/{id}', [JournalController::class, 'trash'])->name('journal.trash');
Route::get('journal/restore/{id}', [JournalController::class, 'restore'])->name('journal.restore');

Route::resource('volume-journal', JournalVolumeController::class);
Route::post('volume-journal/trash/{id}', [JournalVolumeController::class, 'trash'])->name('volume-journal.trash');
Route::get('volume-journal/restore/{id}', [JournalVolumeController::class, 'restore'])->name('volume-journal.restore');
Route::get('get-volume', [JournalVolumeController::class, 'get_volume'])->name('get-volume');

Route::resource('volume-issue', VolumeIssueController::class);
Route::post('volume-issue/trash/{id}', [VolumeIssueController::class, 'trash'])->name('volume-issue.trash');
Route::get('volume-issue/restore/{id}', [VolumeIssueController::class, 'restore'])->name('volume-issue.restore');
Route::get('get-issue', [VolumeIssueController::class, 'get_issue'])->name('get-issue');


//Organogram start
Route::get('logo/create', [SettingController::class, 'logo_create'])->name('logo.create');
Route::post('logo/store', [SettingController::class, 'logo_store'])->name('logo.store');
//Organogram end

//Act & Rules start
Route::get('act-rule/create', [SettingController::class, 'act_rule_create'])->name('act-rule.create');
Route::post('act-rule/store', [SettingController::class, 'act_rule_store'])->name('act-rule.store');
//Act & Rules end

//Act & Rules start
Route::get('map-details/create', [SettingController::class, 'map_details_create'])->name('map-details.create');
Route::post('map-details/store', [SettingController::class, 'map_details_store'])->name('map-details.store');
//Act & Rules end

//Website contact start
Route::get('website-contact/create', [SettingController::class, 'website_contact_create'])->name('website-contact.create');
Route::post('website-contact/store', [SettingController::class, 'website_contact_store'])->name('website-contact.store');
//Website contact end

//Website Links start
Route::get('website-links/create', [SettingController::class, 'website_links_create'])->name('website-links.create');
Route::post('website-links/store', [SettingController::class, 'website_links_store'])->name('website-links.store');
//Website Links end
//report start
//Route::get('report/index', [ReportController::class, 'report_index'])->name('report.index');
//Route::post('report/download', [ReportController::class, 'report_download'])->name('report.download');
//report end

/* --------------------------------------
department and institute admin routes
-----------------------------------------*/
