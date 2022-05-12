<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WithdrawController;

Route::redirect('login', 'authentication/login');
Route::redirect('/', 'dashboard/index');
Route::redirect('/admin', 'admin/dashboard/index');
Route::redirect('logout', 'authentication/logout');
Route::prefix('/authentication')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginReq'])->name('loginReq');
    Route::get('/register/{username?}', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'registerReq'])->name('registerReq');
    Route::get('/reset', [UserController::class, 'reset'])->name('reset');
    Route::get('/update', [UserController::class, 'update'])->name('update');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/index', [dashboard::class, 'index'])->name('dashboard');
    Route::get('/payment/profile', [PaymentController::class, 'profile'])->name('payment.profile');
    Route::get('/profile/refers', [ProfileController::class, 'refers'])->name('profile.refers');
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('/profile/password', [ProfileController::class, 'passwordReq'])->name('profile.passwordReq');
    Route::resource('profile', ProfileController::class);
    Route::resource('donation', DonationController::class);
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::get('/wallet/edit', [WalletController::class, 'edit'])->name('wallet.edit');
    Route::post('/wallet', [WalletController::class, 'store'])->name('wallet.store');
    Route::resource('withdraw', WithdrawController::class);
    Route::post('/attatchmentReq', [AttachmentController::class, 'attatchmentReq'])->name('user.attatchmentReq');
    Route::post('/attatchmentSenderReq', [AttachmentController::class, 'attatchmentSenderReq'])->name('user.sender.attatchmentReq');
    Route::get('/donations', [HistoryController::class, 'donations'])->name('user.donations');
    Route::get('/withdraws', [HistoryController::class, 'withdraws'])->name('user.withdraws');
    Route::get('/profits', [HistoryController::class, 'profits'])->name('user.profits');
    Route::get('/collectCommission', [dashboard::class, 'collectCommission'])->name('user.collectCommission');
});


Route::redirect('admin/login', 'authentication/login');
Route::prefix('admin/authentication')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'loginReq'])->name('admin.loginReq');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});


Route::prefix('admin/dashboard')->middleware(['admin'])->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/userSuspend/{user}', [AdminController::class, 'userSuspend'])->name('admin.userSuspend');
    Route::get('/userActive/{user}', [AdminController::class, 'userActive'])->name('admin.userActive');
    Route::get('/plans', [AdminController::class, 'plans'])->name('admin.plans');
    Route::get('/donation', [AdminController::class, 'donation'])->name('admin.donation');
    Route::get('/wallets', [AdminController::class, 'wallets'])->name('admin.wallets');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    Route::get('/attached', [AdminController::class, 'attached'])->name('admin.attached');
    Route::get('/bridge', [AdminController::class, 'bridge'])->name('admin.bridge');
    Route::get('/withdraw', [AdminController::class, 'withdraw'])->name('admin.withdraw');
    Route::get('/attachment', [AdminController::class, 'attachment'])->name('admin.attachment');
    Route::get('/reAttachment', [AdminController::class, 'reAttachment'])->name('admin.reAttachment');
    Route::post('/reAttachmentReq/{id}', [AdminController::class, 'reAttachmentReq'])->name('admin.reAttachmentReq');
    
    Route::post('/attachment/{id}', [AdminController::class, 'attachmentReq'])->name('admin.attachmentReq');
    Route::get('/blockchain', [BlockchainController::class, 'index'])->name('blockchain');
    Route::post('/balanceAdd', [AdminController::class, 'balanceAdd'])->name('balanceAdd');
    Route::post('/donationAdd', [AdminController::class, 'donationAdd'])->name('donationAdd');
    
});