<?php

use App\Http\Controllers\ApaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPublicationController;
use App\Http\Controllers\UserResearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Auth::routes(['register'=>false]);
//Language Translation
Route::get('index/{locale}', [HomeController::class, 'lang']);

//Update User Details
Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');
Route::get('admin/{any}', [HomeController::class, 'index'])->name('index');


/*
|--------------------------------------------------------------------------
| Main page Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'root'])->name('root');

Route::get('contact-us', [SinglePageController::class, 'contact'])->name('contact');

Route::get('vc-secretariat', [SinglePageController::class, 'chancellor'])->name('chancellor');
Route::get('treasurer', [SinglePageController::class, 'treasurer'])->name('treasurer');
Route::get('overview', [SinglePageController::class, 'overview'])->name('overview');
Route::get('at-a-glance', [SinglePageController::class, 'glance'])->name('glance');
Route::get('resource', [SinglePageController::class, 'resources'])->name('resources');
Route::get('organogram', [SinglePageController::class, 'organogram'])->name('organogram');
Route::get('act', [SinglePageController::class, 'act'])->name('act');
Route::get('gallery', [SinglePageController::class, 'gallery'])->name('gallery');
Route::get('campus', [SinglePageController::class, 'campus'])->name('campus');
Route::get('monogram', [SinglePageController::class, 'monogram'])->name('monogram');
Route::get('citizen-charter', [SinglePageController::class, 'citizen'])->name('citizen');
Route::get('undergraduate', [SinglePageController::class, 'undergraduate'])->name('undergraduate');
Route::get('postgraduate', [SinglePageController::class, 'postgraduate'])->name('postgraduate');
Route::get('central-library', [SinglePageController::class, 'library'])->name('library');
Route::get('career', [SinglePageController::class, 'career'])->name('career');
Route::get('tuition-fees', [SinglePageController::class, 'tuition'])->name('tuition');
Route::get('transportation', [SinglePageController::class, 'transportation'])->name('transportation');


Route::get('journal', [FrontController::class, 'journal'])->name('journal.index');
Route::get('journal/{journal_slug}', [FrontController::class, 'journal_show'])->name('journal.show');
Route::get('journal/volume/{volume_slug}', [FrontController::class, 'volume_journal_show'])->name('volume.journal.show');
Route::get('journal/volume/{id}/details', [FrontController::class, 'volume_read'])->name('volume.journal.read');

Route::get('publications', [FrontController::class, 'publication'])->name('publications');
Route::get('department-publications', [FrontController::class, 'department_publication'])->name('department-publications');
Route::get('research/{slug?}', [FrontController::class, 'research'])->name('research');
Route::get('faculties', [FrontController::class, 'faculties'])->name('faculties');
Route::get('institutes', [FrontController::class, 'institutes'])->name('institutes');
Route::get('departments', [FrontController::class, 'departments'])->name('departments');
Route::get('offices', [FrontController::class, 'offices'])->name('offices');
Route::get('facilities', [FrontController::class, 'facility'])->name('facility');
Route::get('academic-calender', [FrontController::class, 'calender'])->name('calender');
Route::get('official-forms', [FrontController::class, 'forms'])->name('forms');
Route::get('departmental-forms', [FrontController::class, 'departmental_forms'])->name('departmental-forms');
Route::get('scholarship', [FrontController::class, 'scholarship'])->name('scholarship');

Route::get('notice-board/{type?}', [FrontController::class, 'notice_index'])->name('notice.index');
Route::get('notice/{notice_slug}', [FrontController::class, 'notice_show'])->name('notice.show');
Route::get('news', [FrontController::class, 'news_index'])->name('news.index');
Route::get('news/{news_slug}', [FrontController::class, 'news_show'])->name('news.show');
Route::get('events', [FrontController::class, 'event_index'])->name('event.index');
Route::get('event/{event_slug}', [FrontController::class, 'event_show'])->name('event.show');
Route::get('seminars', [FrontController::class, 'seminar_index'])->name('seminar.index');
Route::get('seminar/{seminar_slug}', [FrontController::class, 'seminar_show'])->name('seminar.show');
Route::get('research-activities', [FrontController::class, 'activity_index'])->name('activity.index');
Route::get('research-activity/{activity_slug}', [FrontController::class, 'activity_show'])->name('activity.show');
Route::get('academic-program', [FrontController::class, 'program_index'])->name('program.index');
Route::get('academic-program/{program_slug}', [FrontController::class, 'program_show'])->name('program.show');
Route::get('alumni', [FrontController::class, 'alumni_index'])->name('alumni.index');
Route::get('alumni/{alumni_slug}', [FrontController::class, 'alumni_show'])->name('alumni.show');


Route::get('faculty/{slug}', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('faculty/{slug}/message-from-dean', [FacultyController::class, 'message'])->name('faculty.message');


/*APA routes*/
Route::get('apa', [ApaController::class, 'index'])->name('apa');
Route::get('apa/content/{slug}', [ApaController::class, 'content'])->name('apa.content');
Route::get('apa/about', [ApaController::class, 'about'])->name('apa.about');
Route::get('apa/contact', [ApaController::class, 'contact'])->name('apa.contact');
Route::get('apa/download', [ApaController::class, 'download'])->name('apa.download');

Route::post('apa/lang-change', [ApaController::class, 'langChange'])->name('apa.change');

/*
|--------------------------------------------------------------------------
| user routes start
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::post('password-update', [UserController::class, 'password_update'])->name('user.password.update');
Route::post('education-update', [UserController::class, 'education_update'])->name('user.education.update');
Route::get('education-delete/{id}', [UserController::class, 'education_delete'])->name('user.education.delete');
Route::post('experience-update', [UserController::class, 'experience_update'])->name('user.experience.update');
Route::get('experience-delete/{id}', [UserController::class, 'experience_delete'])->name('user.experience.delete');
Route::post('award-update', [UserController::class, 'award_update'])->name('user.award.update');
Route::get('award-delete/{id}', [UserController::class, 'award_delete'])->name('user.award.delete');
Route::post('social-update', [UserController::class, 'social_update'])->name('user.social.update');
Route::post('teaching-update', [UserController::class, 'teaching_update'])->name('user.teaching.update');
Route::post('resource-update', [UserController::class, 'resource_update'])->name('user.resource.update');
Route::get('resource-delete/{id}', [UserController::class, 'resource_delete'])->name('user.resource.delete');
Route::post('basic-update', [UserController::class, 'basic_update'])->name('user.basic.update');

Route::post('initiative-update', [UserController::class, 'initiative_update'])->name('user.initiative.update');

Route::get('publication/create', [UserPublicationController::class, 'create'])->name('user.publication.create');
Route::post('publication/store', [UserPublicationController::class, 'store'])->name('user.publication.store');
Route::get('publication/{id}/show', [UserPublicationController::class, 'show'])->name('user.publication.show');
Route::get('publication/{id}/edit', [UserPublicationController::class, 'edit'])->name('user.publication.edit');
Route::put('publication/{id}/update', [UserPublicationController::class, 'update'])->name('user.publication.update');
Route::delete('publication/{id}/destroy', [UserPublicationController::class, 'destroy'])->name('user.publication.destroy');

Route::get('research-project/create', [UserResearchController::class, 'create'])->name('user.research.create');
Route::post('research-project/store', [UserResearchController::class, 'store'])->name('user.research.store');
Route::get('research-project/{id}/show', [UserResearchController::class, 'show'])->name('user.research.show');
Route::get('research-project/{id}/edit', [UserResearchController::class, 'edit'])->name('user.research.edit');
Route::put('research-project/{id}/update', [UserResearchController::class, 'update'])->name('user.research.update');
Route::delete('research-project/{id}/destroy', [UserResearchController::class, 'destroy'])->name('user.research.destroy');






/*
|--------------------------------------------------------------------------
| Department page Routes
|--------------------------------------------------------------------------
*/

Route::get('department/{slug}', [DepartmentController::class, 'index'])->name('department.index');
Route::get('department/{slug}/newses', [DepartmentController::class, 'news_index'])->name('department.news.index');
Route::get('department/{slug}/news/{news_slug}', [DepartmentController::class, 'news_show'])->name('department.news.show');
//Route::get('department/{slug}/events', [DepartmentController::class, 'event_index'])->name('department.event.index');
//Route::get('department/{slug}/event/{event_slug}', [DepartmentController::class, 'event_show'])->name('department.event.show');
Route::get('department/{slug}/seminars', [DepartmentController::class, 'seminar_index'])->name('department.seminar.index');
Route::get('department/{slug}/seminar/{event_slug}', [DepartmentController::class, 'seminar_show'])->name('department.seminar.show');
Route::get('department/{slug}/notices/{type?}', [DepartmentController::class, 'notice_index'])->name('department.notice.index');
Route::get('department/{slug}/notice/{notice_slug}', [DepartmentController::class, 'notice_show'])->name('department.notice.show');

Route::get('department/{slug}/academic-program/{program_slug}', [DepartmentController::class, 'program_show'])->name('department.program.show');

Route::get('department/{slug}/alumni', [DepartmentController::class, 'alumni_index'])->name('department.alumni.index');
Route::get('department/{slug}/alumni/{alumni_slug}', [DepartmentController::class, 'alumni_show'])->name('department.alumni.show');

Route::get('department/{slug}/publication', [DepartmentController::class, 'publication'])->name('department.publication.index');
Route::get('department/{slug}/research', [DepartmentController::class, 'research'])->name('department.research.index');
Route::get('department/{slug}/message-from-head', [DepartmentController::class, 'message'])->name('department.message');
Route::get('department/{slug}/mission-vision', [DepartmentController::class, 'mission'])->name('department.mission');
Route::get('department/{slug}/citizen-charter', [DepartmentController::class, 'citizen'])->name('department.citizen');
Route::get('department/{slug}/contact', [DepartmentController::class, 'contact'])->name('department.contact');

Route::get('department/{slug}/faculty-members', [DepartmentController::class, 'professor'])->name('department.professor.index');
Route::get('department/{slug}/officer', [DepartmentController::class, 'officer'])->name('department.officer.index');
Route::get('department/{slug}/staff', [DepartmentController::class, 'staff'])->name('department.staff.index');
Route::get('department/{slug}/profile/{user_id}', [DepartmentController::class, 'profile'])->name('department.profile.show');


/*
|--------------------------------------------------------------------------
| Institute page Routes
|--------------------------------------------------------------------------
*/

Route::get('institute/{slug}', [InstituteController::class, 'index'])->name('institute.index');
Route::get('institute/{slug}/newses', [InstituteController::class, 'news_index'])->name('institute.news.index');
Route::get('institute/{slug}/news/{news_slug}', [InstituteController::class, 'news_show'])->name('institute.news.show');
Route::get('institute/{slug}/alumni', [InstituteController::class, 'alumni_index'])->name('institute.alumni.index');
Route::get('institute/{slug}/alumni/{alumni_slug}', [InstituteController::class, 'alumni_show'])->name('institute.alumni.show');
//Route::get('institute/{slug}/events', [InstituteController::class, 'event_index'])->name('institute.event.index');
//Route::get('institute/{slug}/event/{event_slug}', [InstituteController::class, 'event_show'])->name('institute.event.show');
Route::get('institute/{slug}/seminars', [InstituteController::class, 'seminar_index'])->name('institute.seminar.index');
Route::get('institute/{slug}/seminar/{event_slug}', [InstituteController::class, 'seminar_show'])->name('institute.seminar.show');
Route::get('institute/{slug}/notices/{type?}', [InstituteController::class, 'notice_index'])->name('institute.notice.index');
Route::get('institute/{slug}/notice/{notice_slug}', [InstituteController::class, 'notice_show'])->name('institute.notice.show');

Route::get('institute/{slug}/academic-program/{program_slug}', [InstituteController::class, 'program_show'])->name('institute.program.show');

Route::get('institute/{slug}/publication', [InstituteController::class, 'publication'])->name('institute.publication.index');
Route::get('institute/{slug}/research', [InstituteController::class, 'research'])->name('institute.research.index');
Route::get('institute/{slug}/message-from-head', [InstituteController::class, 'message'])->name('institute.message');
Route::get('institute/{slug}/mission-vision', [InstituteController::class, 'mission'])->name('institute.mission');
Route::get('institute/{slug}/citizen-charter', [InstituteController::class, 'citizen'])->name('institute.citizen');
Route::get('institute/{slug}/contact', [InstituteController::class, 'contact'])->name('institute.contact');

Route::get('institute/{slug}/professor-and-lecturer', [InstituteController::class, 'professor'])->name('institute.professor.index');
Route::get('institute/{slug}/officer', [InstituteController::class, 'officer'])->name('institute.officer.index');
Route::get('institute/{slug}/staff', [InstituteController::class, 'staff'])->name('institute.staff.index');
Route::get('institute/{slug}/profile/{user_id}', [InstituteController::class, 'profile'])->name('institute.profile.show');



/*
|--------------------------------------------------------------------------
| Office page Routes
|--------------------------------------------------------------------------
*/
Route::get('office/{slug}', [OfficeController::class, 'index'])->name('office.index');
Route::get('office/{slug}/notices', [OfficeController::class, 'notice_index'])->name('office.notice.index');
Route::get('office/{slug}/notice/{notice_slug}', [OfficeController::class, 'notice_show'])->name('office.notice.show');
Route::get('office/{slug}/contact', [OfficeController::class, 'contact'])->name('office.contact');
Route::get('office/{slug}/citizen-charter', [OfficeController::class, 'citizen'])->name('office.citizen');
Route::get('office/{slug}/forms', [OfficeController::class, 'forms'])->name('office.forms');
Route::get('office/{slug}/gallery', [OfficeController::class, 'gallery'])->name('office.gallery');

Route::get('office/{slug}/message-from-head', [OfficeController::class, 'message'])->name('office.message');
Route::get('office/{slug}/mission-vision', [OfficeController::class, 'mission'])->name('office.mission');

Route::get('office/{slug}/events', [OfficeController::class, 'event_index'])->name('office.events.index');
Route::get('office/{slug}/event/{event_slug}', [OfficeController::class, 'event_show'])->name('office.event.show');

Route::get('office/{slug}/recent-projects', [OfficeController::class, 'project_index'])->name('office.project.index');
Route::get('office/{slug}/recent-projects/{project_slug}', [OfficeController::class, 'project_show'])->name('office.project.show');

Route::get('office/{slug}/officer', [OfficeController::class, 'officer'])->name('office.officer.index');
Route::get('office/{slug}/staff', [OfficeController::class, 'staff'])->name('office.staff.index');
Route::get('office/{slug}/former-head', [OfficeController::class, 'former'])->name('office.former.index');
Route::get('office/{slug}/profile/{user_id}', [OfficeController::class, 'profile'])->name('office.profile.show');


