<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserController;



Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::post('/contact', [PageController::class, 'store'])->name('contact.store');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('admin/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
    //About Routes
    Route::get('/admin/abouts', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::patch('/admin/abouts', [AboutController::class, 'update'])->name('abouts.update');
    //Medias Routes
    Route::get('/admin/medias', [MediaController::class, 'index'])->name('medias.index');
    Route::post('/admin/medias', [MediaController::class, 'store'])->name('medias.store');
    Route::delete('/admin/medias{id}', [MediaController::class, 'destroy'])->name('medias.destroy');
    //Services Routes
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::post('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::patch('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
    //skills Routes
    Route::get('/admin/skills', [SkillController::class, 'index'])->name('admin.skills.index');
    Route::post('/admin/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::patch('/admin/skills/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('/admin/skills/{skill}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');
    //Education Routes
    Route::get('/admin/educations', [EducationController::class, 'index'])->name('admin.educations.index');
    Route::post('/admin/educations', [EducationController::class, 'store'])->name('admin.educations.store');
    Route::patch('/admin/educations/{id}', [EducationController::class, 'update'])->name('admin.educations.update');
    Route::delete('/admin/educations/{id}', [EducationController::class, 'destroy'])->name('admin.educations.destroy');
    //Experience Routes
    Route::get('/admin/experiences', [ExperienceController::class, 'index'])->name('admin.experiences.index');
    Route::post('/admin/experiences', [ExperienceController::class, 'store'])->name('admin.experiences.store');
    Route::patch('/admin/experiences/{id}', [ExperienceController::class, 'update'])->name('admin.experiences.update');
    Route::delete('/admin/experiences/{id}', [ExperienceController::class, 'destroy'])->name('admin.experiences.destroy');

    //Projects Routes
    Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects/create', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::patch('/admin/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    //Testimonial Routes
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/admin/testimonials/create', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::patch('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
    //Messages Routes
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/{id}', [MessageController::class, 'edit'])->name('admin.messages.edit');
    Route::patch('/admin/messages/{id}', [MessageController::class, 'update_status'])->name('admin.messages.update_status');
    Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
    //Users Routes
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::patch('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    //Login and Logout
    
});
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/{any}', function() {
    return view('notFoundPage');
})->where('any','.*');