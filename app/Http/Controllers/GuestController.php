<?php

namespace App\Http\Controllers;

use App\Contracts\IGuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GuestController extends Controller
{
    public IGuest $guestService;
    public function __construct()
    {
        $this->guestService = App::make(IGuest::class);
    }

    public function getGuests()
    {
        return $this->guestService->getGuests();
    }

    public function getGuestById(int $id)
    {
        return $this->guestService->getGuestById($id);
    }
}
