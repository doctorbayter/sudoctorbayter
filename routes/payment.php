<?php


use App\Http\Controllers\PaymentController;
use App\Http\Livewire\PlanCheckout;
use App\Http\Livewire\ProductPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('{plan}/checkout', PlanCheckout::class )->withoutMiddleware(['auth'])->name('checkout');

Route::get('{plan}/pay', ProductPay::class )->withoutMiddleware(['auth'])->name('pay');

Route::get('{plan}/pay/paypal', [PaymentController::class, 'paypal'] )->middleware(['auth' , 'verified'])->name('paypal');
Route::get('{plan}/pay/paypal/response', [PaymentController::class, 'responsePaypal'] )->middleware(['auth' , 'verified'])->name('paypal.response');
Route::post('/pay/paypal/approved', [PaymentController::class, 'approvedPaypal'] )->withoutMiddleware(['auth'])->name('paypal.approved');

Route::post('{plan}/pay/payu', [PaymentController::class, 'payu'] )->middleware(['auth' , 'verified'])->name('payu');
Route::get('{plan}/pay/payu/response', [PaymentController::class, 'responsePayu'] )->middleware(['auth' , 'verified'])->name('payu.response');
Route::post('pay/payu/approved', [PaymentController::class, 'approvedPayu'] )->withoutMiddleware(['auth'])->name('payu.approved');

Route::post('{plan}/pay/epayco', [PaymentController::class, 'epayco'] )->middleware(['auth' , 'verified'])->name('epayco');
Route::get('{plan}/pay/epayco/response', [PaymentController::class, 'responseEpayco'] )->middleware(['auth' , 'verified'])->name('epayco.response');
Route::post('pay/epayco/approved', [PaymentController::class, 'approvedEpayco'] )->withoutMiddleware(['auth'])->name('epayco.approved');

Route::get('{plan}/pay/stripe/approved', [PaymentController::class, 'approvedStripe'] )->withoutMiddleware(['auth'])->name('stripe.approved');
