<?php

namespace App\Contracts;

use App\Http\Requests\GuestRequest;

interface IGuest
{
    public function getGuests();

    public function getGuestById(int $id);

    public function createGuest(GuestRequest $request);

    public function updateGuest(int $id, GuestRequest $request);

    public function deleteGuest(int $id);
}
