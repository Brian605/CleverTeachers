<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IntakeController;
use App\Http\Controllers\Navigator;
use App\Http\Controllers\PastPaperController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudyModeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitMarksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[Navigator::class,'dashboard'])->middleware('auth');
Route::get('/listing',[Navigator::class,'courses'])->middleware('auth');
Route::get('/categories',[Navigator::class,'categories'])->middleware('auth');
Route::get('/courses/new',[Navigator::class,'newCourse'])->middleware('auth');
Route::get('/units',[Navigator::class,'units'])->middleware('auth');
Route::get('/login',[Navigator::class,'loginPage']);
Route::get('/reset',[Navigator::class,'requestPage']);
Route::get('/events',[Navigator::class,'events'])->middleware('auth');
Route::get('/blog',[Navigator::class,'blogs'])->middleware('auth');
Route::get('/events/new',[Navigator::class,'newEvent'])->middleware('auth');
Route::get('/blogs/new',[Navigator::class,'newBlog'])->middleware('auth');
Route::get('/teachers/new',[Navigator::class,'newTeacher'])->middleware('auth');
Route::get('/lecturers',[Navigator::class,'teachers'])->middleware('auth');
Route::get('/semesters',[Navigator::class,'semesters'])->middleware('auth');
Route::get('/downloads',[Navigator::class,'downloads'])->middleware('auth');
Route::get('/pastpapers',[Navigator::class,'pastPapers'])->middleware('auth');
Route::get('/careers',[Navigator::class,'careers'])->middleware('auth');
Route::get('/careers/new',[Navigator::class,'newCareer'])->middleware('auth');
Route::get('/gallery',[Navigator::class,'gallery'])->middleware('auth');
Route::get('/intakes',[Navigator::class,'intakes'])->middleware('auth');
Route::get('/exams',[Navigator::class,'exams'])->middleware('auth');
Route::get('/modes',[Navigator::class,'modes'])->middleware('auth');
Route::get('/applications',[Navigator::class,'applications'])->middleware('auth');
Route::get('/students',[Navigator::class,'students'])->middleware('auth');
Route::get('/applications/details/{id}',[Navigator::class,'applicationDetails'])->middleware('auth');
Route::get('/applications/accept/{id}',[ApplicantController::class,'accept'])->middleware('auth');
Route::get('/applications/delete/{id}',[ApplicantController::class,'delete'])->middleware('auth');

Route::get('/careers/delete/{id}',[CareerController::class,'deleteCareer'])->middleware('auth');
Route::get('/categories/remove/{id}',[CategoryController::class,'removeCategory'])->middleware('auth');
Route::get('/course/deactivate/{id}',[CourseController::class,'deactivate'])->middleware('auth');
Route::get('/course/activate/{id}',[CourseController::class,'activateC'])->middleware('auth');
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');
Route::get('/events/deactivate/{id}',[EventController::class,'deactivate'])->middleware('auth');
Route::get('/events/activate/{id}',[EventController::class,'activate'])->middleware('auth');
Route::get('/events/delete/{id}',[EventController::class,'delete'])->middleware('auth');
Route::get('/blogs/delete/{id}',[BlogController::class,'delete'])->middleware('auth');
Route::get('/department/course/{dep}',[CourseController::class,'departmentCourses'])->middleware('auth');
Route::get('/semesters/activate/{dep}',[SemesterController::class,'activate'])->middleware('auth');
Route::get('/semesters/deactivate/{dep}',[SemesterController::class,'deactivate'])->middleware('auth');
Route::get('/downloads/delete/{id}',[DownloadsController::class,'deleteDownload'])->middleware('auth');
Route::get('/reset-password/{token}',[Navigator::class,'passwordReset'] )->name('password.reset');
Route::get('/pastpapers/delete/{id}',[PastPaperController::class,'deletePaper'])->middleware('auth');
Route::get('/gallery/remove/{id}',[GalleryController::class,'deleteGallery'])->middleware('auth');
Route::get('/intakes/activate/{dep}',[IntakeController::class,'activate'])->middleware('auth');
Route::get('/intakes/deactivate/{dep}',[IntakeController::class,'deactivate'])->middleware('auth');
Route::get('/examiners/remove/{id}',[ExaminerController::class,'deleteExaminer'])->middleware('auth');
Route::get('/modes/remove/{id}',[StudyModeController::class,'deleteMode'])->middleware('auth');

Route::post('/blog/create',[BlogController::class,'createBlog'])->middleware('auth');
Route::post('/category/create',[CategoryController::class,'createCategory'])->middleware('auth');
Route::post('/category/change',[CategoryController::class,'changeCategory'])->middleware('auth');
Route::post('/system/files/add',[CourseController::class,'uploadTaskFile']);
Route::post('/system/files/delete',[CourseController::class,'removeTaskFile']);
Route::post('/course/create',[CourseController::class,'createCourse'])->middleware('auth');
Route::post('/login',[AuthController::class,'loginUser']);
Route::post('/forgotpassword',[AuthController::class,'forgotPassword']);
Route::post('/resetpassword',[AuthController::class,'resetPassword'])->name('password.update');
Route::post('/events/create',[EventController::class,'newEvent'])->middleware('auth');
Route::post('/teachers/create',[TeacherController::class,'createTeacher'])->middleware('auth');
Route::post('/semester/create',[SemesterController::class,'createSemester'])->middleware('auth');
Route::post('/download/create',[DownloadsController::class,'createDownload'])->middleware('auth');
Route::post('/pastpapers/create',[PastPaperController::class,'createPastPaper'])->middleware('auth');
Route::post('/careers/create',[CareerController::class,'createCareer'])->middleware('auth');
Route::post('/gallery/create',[GalleryController::class,'createGallery'])->middleware('auth');
Route::post('/gallery/change',[GalleryController::class,'editCaption'])->middleware('auth');
Route::post('/intake/create',[IntakeController::class,'createIntake'])->middleware('auth');
Route::post('/examiners/create',[ExaminerController::class,'createExaminer'])->middleware('auth');
Route::post('/modes/create',[StudyModeController::class,'addMode']);
Route::post('/unit/create',[UnitController::class,'addUnit']);
Route::post('/marks/create',[UnitMarksController::class,'addMarks']);
