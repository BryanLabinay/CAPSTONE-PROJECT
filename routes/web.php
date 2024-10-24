<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminCTRL;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AppointmentCTRL;
use App\Http\Controllers\Admin\ActivityLogCTRL;
use App\Http\Controllers\Admin\AddActivityCTRL;
use App\Http\Controllers\Admin\MedicalCertCTRL;
use App\Http\Controllers\User\NotificationCTRL;
use App\Http\Controllers\Admin\ActivityListCTRL;
use App\Http\Controllers\Admin\AdminProfileCTRL;
use App\Http\Controllers\Navigation\UserNavCTRL;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PatientsRecordCTRL;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ExportAppointmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'auth'])
    ->middleware(['auth'])->name('home');


// User profile
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// User Navigation
Route::middleware(['auth', 'user'])->controller(UserNavCTRL::class)->group(function () {
    Route::get('/Doctor&Staff', 'doctorstaff')->name('doctor.staff');
    Route::get('/Services', 'services')->name('services');
    Route::get('/Appointment', 'appointment')->name('Add-Appointment');
    Route::get('/Calendar', 'calendar')->name('user-calendar');
    Route::get('/Events', 'events')->name('events');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Appointment Route
Route::middleware(['auth', 'user'])->controller(AppointmentCTRL::class)->group(function () {
    Route::get('Appointment-List', 'index')->name('Appointment-List');
    Route::post('Appointment', 'store')->name('add.appointment');
    Route::get('/Edit-Appointment/{appointment_id}', 'edit')->name('Edit-Appointment');
    Route::put('/update-appointment/{appointment_id}', 'update')->name('update.appointment');
    Route::delete('/delete-appointment/{appointment_id}', 'destroy')->name('delete.appointment');
});

// User Notification
Route::middleware(['auth', 'user'])->prefix('Notification')->group(function () {
    Route::get('/notif', [NotificationCTRL::class, 'notification'])->name('notification');
});




// ? ADMIN ROUTE

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.dash');


Route::middleware(['auth', 'admin'])->prefix('Admin')->group(function () {
    Route::get('/profile/edit', [AdminProfileCTRL::class, 'edit'])->name('admin.profile.edit');
    Route::post('/profile/update', [AdminProfileCTRL::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile/delete', [AdminProfileCTRL::class, 'destroy'])->name('admin.profile.destroy');
    Route::get('/Calendars', [AdminCTRL::class, 'calendar'])->name('calendar');
});

// Admin Navigation
Route::prefix('Admin')->group(function () {});

// Appointment-List
Route::middleware(['auth', 'admin'])->prefix('Appointment-List')->group(function () {
    Route::get('/All', [AppointmentController::class, 'appointmentlist'])->name('all-appointment');
    Route::get('/Pending', [AppointmentController::class, 'pending'])->name('pending.appointment');
    Route::get('/Approved', [AppointmentController::class, 'approved'])->name('approved.appointment');
    Route::get('/Cancelled', [AppointmentController::class, 'cancelled'])->name('cancelled.appointment');
    Route::delete('/delete-appointment/{appointment_id}', [AppointmentController::class, 'destroy'])->name('appointment.delete');

    Route::post('/approvedStatus/{id}', [AppointmentCTRL::class, 'approvedStatus']);
    Route::post('/canceledStatus/{id}', [AppointmentCTRL::class, 'canceledStatus']);

    Route::get('/appointments/search', [AppointmentController::class, 'searchByName'])->name('appointments.search');
    Route::get('/appointments/filter', [AppointmentController::class, 'filterByDate'])->name('appointments.filter');
    Route::get('/appointments/today', [AppointmentController::class, 'showTodayAppointments'])->name('appointments.today');
});

// Patient Record
Route::middleware(['auth', 'admin'])->prefix('Patients-Record')->group(function () {
    Route::get('/List', [PatientsRecordCTRL::class, 'index'])->name('patient-index');
    Route::get('/patient/{id}', [PatientsRecordCTRL::class, 'edit'])->name('patient.show');
});


// Add Activity
Route::middleware(['auth', 'admin'])->prefix('Add-Activity')->group(function () {
    // Events
    Route::get('/Event', [AddActivityCTRL::class, 'addevent'])->name('add.event');
    Route::post('/Event', [AddActivityCTRL::class, 'storeevent'])->name('store.event');
    // Employee
    Route::get('/Employee/Doctor', [AddActivityCTRL::class, 'addDoctor'])->name('add.doctor');
    Route::get('/Employee/Staff', [AddActivityCTRL::class, 'addStaff'])->name('add.staff');
    Route::post('/upload-Doctor', [AddActivityCTRL::class, 'uploadDoctor'])->name('upload-doctor');
    // Blog
    Route::get('/Blog', [AddActivityCTRL::class, 'blog'])->name('blog');
    Route::post('/Blog', [AddActivityCTRL::class, 'storeBlog'])->name('store.blog');
    // Service
    Route::get('/Service', [AddActivityCTRL::class, 'service'])->name('add.service');
    Route::post('/Service', [AddActivityCTRL::class, 'serviceStore'])->name('service.store');
    // Contact
    Route::get('/Contact', [AddActivityCTRL::class, 'contact'])->name('add-contact');
    Route::post('/Contact', [AddActivityCTRL::class, 'contactStore'])->name('contact.store');
});

// Activity List
Route::middleware(['auth', 'admin'])->prefix('Activity-List')->group(function () {
    Route::get('/Event', [ActivityListCTRL::class, 'eventlist'])->name('event-list');
    Route::get('/events/{event_id}/edit', [ActivityListCTRL::class, 'eventEdit'])->name('event.edit');
    Route::put('/events/{event_id}/update', [ActivityListCTRL::class, 'eventUpdate'])->name('event.update');
    Route::delete('/Delete-Event/{event_id}', [ActivityListCTRL::class, 'deleteEvent'])->name('delete-event');
    // Employee List
    Route::get('/Employee/Doctor-List', [ActivityListCTRL::class, 'doctorList'])->name('doctor.list');
    Route::get('/Employee/Staff-List', [ActivityListCTRL::class, 'staffList'])->name('staff.list');
    // Blog List
    Route::get('/Blog-List', [ActivityListCTRL::class, 'blogList'])->name('blog.list');
    // Service List
    Route::get('/Service-List', [ActivityListCTRL::class, 'serviceList'])->name('service.list');
    // Contact List
    Route::get('/Contact-List', [ActivityListCTRL::class, 'contactList'])->name('contact.list');
});

// Export Excel
Route::middleware(['auth', 'admin'])->prefix('Export')->group(function () {
    Route::post('/AppointmentRecord', [ExportAppointmentController::class, 'ExportAppointmentExcel'])->name('export.excel');
    Route::post('/ApprovedAppointmentRecord', [ExportAppointmentController::class, 'ExportApprovedAppointmentExcel'])->name('export.approved.excel');
    Route::post('/RejectedAppointmentRecord', [ExportAppointmentController::class, 'ExportRejectedAppointmentExcel'])->name('export.rejected.excel');
    Route::get('/Export-All-Appointment-Pdf', [ExportAppointmentController::class, 'ExportAllAppointmentPdf'])->name('export.allrecord.pdf');
    Route::get('/Export-Approved-Appointment-Pdf', [ExportAppointmentController::class, 'ExportApprovedAppointmentPdf'])->name('export.approvedrecord.pdf');
    Route::get('/Export-Cancelled-Appointment-Pdf', [ExportAppointmentController::class, 'ExportCancelledAppointmentPdf'])->name('export.cancelledrecord.pdf');
    Route::get('/Reports-Appointment-Pdf', [ExportAppointmentController::class, 'reports'])->name('export.reports.pdf');
});

// Other Navigation
Route::middleware(['auth', 'admin'])->group(function () {
    // Activity Log
    Route::get('/Activity-Logs', [ActivityLogCTRL::class, 'index'])->name('admin-activity-logs');
    // Medical Certificate
    Route::get('/Medical-Certificate', [MedicalCertCTRL::class, 'medicalcertificate'])->name('medical-certificate');
    // web.php
Route::get('/fetch-patient-names', [MedicalCertCTRL::class, 'fetchPatientNames'])->name('fetch.patient.names');

    Route::post('/Medical-Certificate-pdf', [MedicalCertCTRL::class, 'MedicalCertificatePDF'])->name('medical-certificate-pdf');
    // Search Patient
    // Route::get('/search/patient', [MedicalCertCTRL::class, 'searchPatient'])->name('search.patient');
    // Message
    Route::get('/Message', [MessageController::class, 'index']);
});



// ? END ADMIN ROUTE




require __DIR__ . '/auth.php';
