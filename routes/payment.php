<?php


use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('{plan}/checkout', [PaymentController::class, 'checkout'] )->middleware(['auth' , 'verified'])->name('checkout');

Route::get('{plan}/pay/paypal', [PaymentController::class, 'paypal'] )->middleware(['auth' , 'verified'])->name('paypal'); 
Route::get('{plan}/pay/paypal/response', [PaymentController::class, 'responsePaypal'] )->middleware(['auth' , 'verified'])->name('paypal.response');
Route::post('/pay/paypal/approved', [PaymentController::class, 'approvedPaypal'] )->withoutMiddleware(['auth'])->name('paypal.approved');

Route::post('{plan}/pay/payu', [PaymentController::class, 'payu'] )->middleware(['auth' , 'verified'])->name('payu');
Route::get('{plan}/pay/payu/response', [PaymentController::class, 'responsePayu'] )->middleware(['auth' , 'verified'])->name('payu.response');
Route::post('pay/payu/approved', [PaymentController::class, 'approvedPayu'] )->withoutMiddleware(['auth'])->name('payu.approved');

Route::post('{plan}/pay/epayco', [PaymentController::class, 'epayco'] )->middleware(['auth' , 'verified'])->name('epayco');
Route::get('{plan}/pay/epayco/response', [PaymentController::class, 'responseEpayco'] )->middleware(['auth' , 'verified'])->name('epayco.response');
Route::post('pay/epayco/approved', [PaymentController::class, 'approvedEpayco'] )->withoutMiddleware(['auth'])->name('epayco.approved');

Route::get('x/faseuno', [PaymentController::class, 'faseuno'] )->withoutMiddleware(['auth'])->name('faseuno.add');
Route::get('x/fasedos', [PaymentController::class, 'fasedos'] )->withoutMiddleware(['auth'])->name('fasedos.add');
Route::get('x/fasecuatro', [PaymentController::class, 'fasecuatro'] )->withoutMiddleware(['auth'])->name('fasecuatro.add');
Route::get('x/subs', [PaymentController::class, 'subs'] )->withoutMiddleware(['auth'])->name('subs.add');
Route::get('x/sql', [PaymentController::class, 'sql'] )->withoutMiddleware(['auth'])->name('sql.add');
Route::get('x/users', [PaymentController::class, 'users'] )->withoutMiddleware(['auth'])->name('users.add');
Route::get('x/add/{email}/{plan}/{whatsapp}', [PaymentController::class, 'add'] )->withoutMiddleware(['auth'])->name('add.add');
Route::get('x/fase/{email}/{fase}/', [PaymentController::class, 'fase'] )->withoutMiddleware(['auth'])->name('fase.add');
Route::get('x/query', [PaymentController::class, 'query'] )->withoutMiddleware(['auth'])->name('query.add');
