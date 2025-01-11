<?php
use App\Livewire\HomePage;
use App\Livewire\RoomSearch;
use Illuminate\Support\Facades\Route;
use App\Livewire\Reservations\DueRooms;
use App\Livewire\Reservations\CreateRooms;
use App\Livewire\Reservations\Reservations;
use App\Livewire\Reservations\ReservedRooms;
use App\Livewire\Reservations\AvailableRooms;
use App\Livewire\Reservations\HomeCreateRooms;
use App\Livewire\Reservations\ReservationFeeds;
use App\Livewire\Reservations\CreateReservation;
use App\Livewire\Reservations\UpdateReservation;
use App\Livewire\Reservations\CreateRoomCategory;
use App\Livewire\Reservations\CheckoutReservation;
use App\Livewire\Reservations\CreateRoomAllocation;
use App\Livewire\Reservations\HomeCreateRoomCategory;
use App\Livewire\Reservations\HomeCreateRoomAllocation;
use App\Http\Controllers\PaymentController; //handle Payment API(paystack)

 Route::get('/', HomePage::class);

 // Reservations module
 Route::post('/bookings/room-search', RoomSearch::class);
 Route::get('/reservations/reservations', Reservations::class);
 Route::get('/reservations/create-reservation/{category_id}/{nor}/{checkin}/{checkout}', CreateReservation::class)->name('create-reservation');
 Route::get('/reservations/checkout-reservation/{reservation_id}', CheckoutReservation::class)->name('checkout-reservation');
 Route::get('/reservations/update-reservation/{reservation_id}', UpdateReservation::class)->name('update-reservation');
 //Route::get('/search-reservation', searchReservation::class);
 Route::get('/reservations/create-rooms', CreateRooms::class)->name('create-rooms');
 Route::get('/reservations/home-create-rooms', HomeCreateRooms::class)->name('home-create-rooms');
 Route::get('/reservations/room-allocation', CreateRoomAllocation::class)->name('home-room-allocation');
 Route::get('/reservations/home-room-allocation', HomeCreateRoomAllocation::class)->name('home-room-allocation');
 Route::get('/reservations/create-room-category', CreateRoomCategory::class)->name('home-room-category');
 Route::get('/reservations/home-create-room-category', HomeCreateRoomCategory::class)->name('home-create-room-category');
 Route::get('/reservations/available-rooms', AvailableRooms::class)->name('available-rooms');
 Route::get('/reservations/reserved-rooms', ReservedRooms::class)->name('reserved-rooms');
 Route::get('/reservations/due-rooms', DueRooms::class)->name('due-rooms');
 Route::get('/reservations/reservation-feeds', ReservationFeeds::class)->name('reservation-feeds');

  //Routes for paystack Payments gateway


    //Routes for paystack Payments
    Route::get('/pay/{amount}/{email}/{reference}', [PaymentController::class,'pay'])->name('pay'); // reference-reservation ID


    Route::get('/payment/callback',[PaymentController::class, 'handleGatewayCallback'])->name('reservations.comfirm');
    // http://reservations.vinehousegroup.com/comfirm


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
