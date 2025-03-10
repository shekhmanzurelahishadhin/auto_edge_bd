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
use App\Http\Controllers\Admin\PageTitleController;
use App\Http\Controllers\Admin\AuctionCategoryController;
use App\Http\Controllers\Admin\AboutAuctionController;
use App\Http\Controllers\Admin\BiddingResultController;
use App\Http\Controllers\Admin\AuctionGradeController;
use App\Http\Controllers\Admin\AuctionSheetController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Admin\FuelTypeController;
use App\Http\Controllers\Admin\VehicleController;



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
Route::get('getModelByBrandId', [ModelController::class, 'getModelByBrandId'])->name('getModelByBrandId');

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

Route::resource('model', ModelController::class);
Route::post('model/trash/{id}', [ModelController::class, 'trash'])->name('model.trash');
Route::get('model/restore/{id}', [ModelController::class, 'restore'])->name('model.restore');

Route::resource('year', YearController::class);
Route::post('year/trash/{id}', [YearController::class, 'trash'])->name('year.trash');
Route::get('year/restore/{id}', [YearController::class, 'restore'])->name('year.restore');

Route::resource('fuel-type', FuelTypeController::class);
Route::post('fuel-type/trash/{id}', [FuelTypeController::class, 'trash'])->name('fuel-type.trash');
Route::get('fuel-type/restore/{id}', [FuelTypeController::class, 'restore'])->name('fuel-type.restore');

Route::resource('vehicle', VehicleController::class);
Route::post('vehicle/trash/{id}', [VehicleController::class, 'trash'])->name('vehicle.trash');
Route::get('vehicle/restore/{id}', [VehicleController::class, 'restore'])->name('vehicle.restore');

Route::get('about', [AboutUsController::class, 'create'])->name('about.create');
Route::post('about-store', [AboutUsController::class, 'store'])->name('about.store');

Route::resource('news', NewsController::class);
Route::post('news/trash/{id}', [NewsController::class, 'trash'])->name('news.trash');
Route::get('news/restore/{id}', [NewsController::class, 'restore'])->name('news.restore');

Route::resource('page-title', PageTitleController::class);
Route::post('page-title/trash/{id}', [PageTitleController::class, 'trash'])->name('page-title.trash');
Route::get('page-title/restore/{id}', [PageTitleController::class, 'restore'])->name('page-title.restore');

Route::get('subscribe', [SettingController::class, 'subscribe'])->name('subscribe.index');
Route::delete('subscribe/{subscribe}', [SettingController::class, 'subscribeDestroy'])->name('subscribe.destroy');

Route::get('message', [SettingController::class, 'message'])->name('message.index');
Route::delete('message/{message}', [SettingController::class, 'messageDestroy'])->name('message.destroy');
Route::get('message/{message}', [SettingController::class, 'messageShow'])->name('message.show');

Route::resource('auction-category', AuctionCategoryController::class);
Route::post('auction-category/trash/{id}', [AuctionCategoryController::class, 'trash'])->name('auction-category.trash');
Route::get('auction-category/restore/{id}', [AuctionCategoryController::class, 'restore'])->name('auction-category.restore');

Route::get('auction-about', [AboutAuctionController::class, 'create'])->name('auction-about.create');
Route::post('auction-about-store', [AboutAuctionController::class, 'store'])->name('auction-about.store');

Route::resource('bidding-result', BiddingResultController::class);
Route::post('bidding-result/trash/{id}', [BiddingResultController::class, 'trash'])->name('bidding-result.trash');
Route::get('bidding-result/restore/{id}', [BiddingResultController::class, 'restore'])->name('bidding-result.restore');

Route::resource('auction-grade', AuctionGradeController::class);
Route::post('auction-grade/trash/{id}', [AuctionGradeController::class, 'trash'])->name('auction-grade.trash');
Route::get('auction-grade/restore/{id}', [AuctionGradeController::class, 'restore'])->name('auction-grade.restore');

Route::resource('auction-sheet', AuctionSheetController::class);
Route::post('auction-sheet/trash/{id}', [AuctionSheetController::class, 'trash'])->name('auction-sheet.trash');
Route::get('auction-sheet/restore/{id}', [AuctionSheetController::class, 'restore'])->name('auction-sheet.restore');

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
