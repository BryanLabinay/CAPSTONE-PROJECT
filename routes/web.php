<?php

use App\Mail\ClinicMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\LandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminCTRL;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\User\AppointmentCTRL;
use App\Http\Controllers\Admin\ActivityLogCTRL;
use App\Http\Controllers\Admin\AddActivityCTRL;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\MedicalCertCTRL;
use App\Http\Controllers\User\NotificationCTRL;
use App\Http\Controllers\Admin\AdminProfileCTRL;
use App\Http\Controllers\Admin\CloseAppointment;
use App\Http\Controllers\Admin\ConsultationCTRL;
use App\Http\Controllers\Navigation\UserNavCTRL;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PatientsRecordCTRL;
use App\Http\Controllers\Admin\SetAppointmentCTRL;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\ExportAppointmentController;


Route::get('/', [LandingPage::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [HomeController::class, 'auth'])
    ->middleware(['auth'])->name('home');

// Chat system

Route::get('/chat/admin', [ChatController::class, 'chatWithAdmin'])->name('chat.admin');
Route::get('/chat/list', [ChatController::class, 'showchat'])->name('chat.list');
Route::get('/chat/user/{userId}', [ChatController::class, 'chatWithUser'])->name('chat.user');
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');

Route::get('chat/list/latest', [ChatController::class, 'showchatLatest'])->name('chat.list.latest');

Route::get('/chat/fetch/{admin_id}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');

Route::get('/admin/chat/fetch/{userId}', [ChatController::class, 'fetchMessages'])->name('admin.chat.fetch');
Route::post('/admin/chat/send', [ChatController::class, 'sendMessage'])->name('admin.chat.send');
// Route::get('/chat', [ChatController::class, 'auth'])->middleware(['auth'])->name('chat.auth');
// // Admin Chat
// Route::get('/Admin/Chat', [ChatController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.chat');
// //
Route::get('/Message', [ChatController::class, 'userChat'])->name('user.chat');

// User profile
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/Profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/Profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/Profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Edit Profile
    // Route::get('/Profile-Update/{id}', [ProfileController::class, 'updateProfile'])->name('update.prof');
});

Route::post('/notifications/{id}/read', [NotificationController::class, 'markNotificationAsRead']);
Route::get('/notifications/unread-count', [NotificationController::class, 'getUnreadCount'])->name('notifications.unread-count');



// User Navigation
Route::middleware(['auth', 'user'])->controller(UserNavCTRL::class)->group(function () {
    // Home
    Route::get('/Home', 'home')->name('dashboard');

    Route::get('/Doctor&Staff', 'doctorstaff')->name('doctor.staff');
    Route::get('/Services/{service}', 'services')->name('services');
    Route::get('/Appointment', 'appointment')->name('Add-Appointment');
    Route::get('/Calendar', 'calendar')->name('user-calendar');

    // News & Updates
    Route::get('/Events', 'events')->name('events');
    Route::get('/View/{id}/Events', 'eventView')->name('event.view');
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
    Route::get('/Follow-Up', [AppointmentController::class, 'followUp'])->name('followUp.appointment');
    Route::get('/Cancelled', [AppointmentController::class, 'cancelled'])->name('cancelled.appointment');
    Route::post('/appointments/{id}/close', [CloseAppointment::class, 'closeAppointment'])->name('appointments.close');
    Route::delete('/delete-appointment/{appointment_id}', [AppointmentController::class, 'destroy'])->name('appointment.delete');

    Route::post('/approvedStatus/{id}', [AppointmentCTRL::class, 'approvedStatus']);
    Route::post('/canceledStatus/{id}', [AppointmentCTRL::class, 'canceledStatus']);
    // Search
    Route::get('/appointments/search', [AppointmentController::class, 'searchByName'])->name('appointments.search');
    Route::get('/appointments/filter', [AppointmentController::class, 'filterByDate'])->name('appointments.filter');
    Route::get('/appointments/today', [AppointmentController::class, 'showTodayAppointments'])->name('appointments.today');
});

// Patient Record
Route::middleware(['auth', 'admin'])->prefix('Patients-Record')->group(function () {
    Route::get('/List', [PatientsRecordCTRL::class, 'index'])->name('patient-index');
    Route::get('/patient/{id}', [PatientsRecordCTRL::class, 'edit'])->name('patient.show');
    // Search
    Route::get('/patients/filter', [PatientsRecordCTRL::class, 'patientsFilter'])->name('patients.filter');
    Route::get('/patients/today', [PatientsRecordCTRL::class, 'showTodaypatients'])->name('patients.today');
    Route::get('/patients/search', [PatientsRecordCTRL::class, 'searchByName'])->name('patients.search');
    Route::post('/patient/email', [EmailController::class, 'send_email'])->name('patient-email');
});



Route::post('/notifications/{id}/read', [NotificationsController::class, 'markAsRead'])->name('notif');


// Add Activity
Route::middleware(['auth', 'admin'])->prefix('Add-Activity')->group(function () {
    // Events
    Route::get('/Event', [AddActivityCTRL::class, 'addevent'])->name('add.event');
    Route::post('/Event', [AddActivityCTRL::class, 'storeEvent'])->name('store.event');
    // View Event
    Route::get('/Event/{id}/view', [AddActivityCTRL::class, 'viewEvent'])->name('view.event');
    // Edit Event
    Route::get('/Event/{id}/edit', [AddActivityCTRL::class, 'editEvent'])->name('edit.event');
    // Event Update
    Route::put('/Event/{id}', [AddActivityCTRL::class, 'updateEvent'])->name('update.event');
    // Event Delete
    Route::delete('/Event/delete/{id}', [AddActivityCTRL::class, 'deleteEvent'])->name('delete.event');

    // Employee
    Route::get('/Employee/Doctor', [AddActivityCTRL::class, 'addDoctor'])->name('add.doctor');
    Route::get('/Employee/Staff', [AddActivityCTRL::class, 'addStaff'])->name('add.staff');
    Route::post('/upload-Doctor', [AddActivityCTRL::class, 'uploadDoctor'])->name('upload-doctor');
    // Edit
    Route::get('/edit/{id}/information', [AddActivityCTRL::class, 'editInfo'])->name('edit.info');
    // Update
    Route::put('/Info/{id}', [AddActivityCTRL::class, 'infoUpdate'])->name('info.update');
    // Delete
    Route::delete('/delete/{id}/information', [AddActivityCTRL::class, 'destroyInfo'])->name('info.destroy');


    // Blog
    Route::get('/Blog', [AddActivityCTRL::class, 'blog'])->name('blog');
    Route::post('/Blog', [AddActivityCTRL::class, 'storeBlog'])->name('store.blog');
    // View Blog
    Route::get('/Blog/{id}/view', [AddActivityCTRL::class, 'viewBlog'])->name('view.blog');
    // Edit Blog
    Route::get('/Blog/{id}/edit', [AddActivityCTRL::class, 'editBlog'])->name('edit.blog');
    //  Update Blog
    Route::put('/Blog/{id}', [AddActivityCTRL::class, 'updateBlog'])->name('update.blog');
    // Delete Blog
    Route::delete('/Blog/delete/{id}', [AddActivityCTRL::class, 'deleteBlog'])->name('delete.blog');

    // Service
    Route::get('/Service', [AddActivityCTRL::class, 'service'])->name('add.service');
    Route::post('/Service', [AddActivityCTRL::class, 'serviceStore'])->name('service.store');
    Route::get('/Service-view/{id}', [AddActivityCTRL::class, 'serviceView'])->name('service.view');
    // Service Edit
    Route::get('/Service/{id}/edit', [AddActivityCTRL::class, 'serviceEdit'])->name('service.edit');
    // Service Update
    Route::put('/Service/{id}', [AddActivityCTRL::class, 'serviceUpdate'])->name('service.update');
    // Service Delete
    Route::delete('/Service/delete/{id}', [AddActivityCTRL::class, 'serviceDelete'])->name('service.delete');

    // Contact
    Route::get('/Contact', [AddActivityCTRL::class, 'contact'])->name('add-contact');
    Route::post('/Contact', [AddActivityCTRL::class, 'contactStore'])->name('contact.store');
    Route::get('/Contact-view/{id}', [AddActivityCTRL::class, 'contactView'])->name('contact.view');
    // Contact Edit
    Route::get('/Contact/{id}/edit', [AddActivityCTRL::class, 'contactEdit'])->name('contact.edit');
    // Contact Update
    Route::put('/Contact/{id}', [AddActivityCTRL::class, 'contactUpdate'])->name('contact.update');
    // Contact Delete
    Route::delete('/Contact/delete/{id}', [AddActivityCTRL::class, 'contactDelete'])->name('contact.delete');

    // CONSULTATION
    Route::get('/Index/Consultation', [ConsultationCTRL::class, 'index'])->name('index.consultation');
    Route::post('/Store/Consultation', [ConsultationCTRL::class, 'store'])->name('store.consultation');
    Route::get('/Show/{id}/Consulation', [ConsultationCTRL::class, 'show'])->name('show.consultation');
    Route::get('/Edit/{id}/Consultation', [ConsultationCTRL::class, 'edit'])->name('edit.consultation');
    Route::put('/Update/{id}/Consultation', [ConsultationCTRL::class, 'update'])->name('update.consultation');
    Route::delete('/Delete/{id}/Consultation', [ConsultationCTRL::class, 'destroy'])->name('delete.consultation');
});

Route::middleware(['auth', 'admin'])->prefix('Close-Appointment')->group(function () {
    Route::get('Close/Appointment', [CloseAppointment::class, 'index'])->name('index');
});


Route::middleware(['auth', 'admin'])->prefix('Set-Appointment')->group(function () {
    Route::get('Set/Appointment', [SetAppointmentCTRL::class, 'index'])->name('index');
    // Use a more descriptive URL for rescheduling the appointment
    Route::post('reschedule/{id}', [SetAppointmentCTRL::class, 'store'])->name('appointments.reschedule');
});




// Export Excel
Route::middleware(['auth', 'admin'])->prefix('Export')->group(function () {
    Route::post('/AppointmentRecord', [ExportAppointmentController::class, 'ExportAppointmentExcel'])->name('export.excel');
    Route::post('/ApprovedAppointmentRecord', [ExportAppointmentController::class, 'ExportApprovedAppointmentExcel'])->name('export.approved.excel');
    Route::post('/PendingAppointmentRecord', [ExportAppointmentController::class, 'ExportPendingAppointmentExcel'])->name('export.pending.excel');
    Route::post('/RejectedAppointmentRecord', [ExportAppointmentController::class, 'ExportRejectedAppointmentExcel'])->name('export.rejected.excel');
    Route::post('/PatientRecord', [ExportAppointmentController::class, 'ExportPatientRecords'])->name('export.patient.excel');
    Route::get('/Export-All-Appointment-Pdf', [ExportAppointmentController::class, 'ExportAllAppointmentPdf'])->name('export.allrecord.pdf');
    Route::get('/Export-Approved-Appointment-Pdf', [ExportAppointmentController::class, 'ExportApprovedAppointmentPdf'])->name('export.approvedrecord.pdf');
    Route::get('/Export-Cancelled-Appointment-Pdf', [ExportAppointmentController::class, 'ExportCancelledAppointmentPdf'])->name('export.cancelledrecord.pdf');
    Route::get('/Export-Pending-Appointment-Pdf', [ExportAppointmentController::class, 'ExportPendingAppointmentPdf'])->name('export.pendingrecord.pdf');
    Route::get('/Reports-Appointment-Pdf', [ExportAppointmentController::class, 'reports'])->name('export.reports.pdf');
    // Patient Record
    Route::get('/Patients-Records.Pdf', [ExportAppointmentController::class, 'patientsRecordPdf'])->name('patients.record.pdf');
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
    // EMAIL
    Route::get('/email', [EmailController::class, 'index'])->name('index.email');
    Route::post('/send-email', [EmailController::class, 'create'])->name('send.email');
});



// ? END ADMIN ROUTE




require __DIR__ . '/auth.php';
