<?php

namespace App\Contracts;

use App\Http\Requests\CreateGuestRequest;
use App\Http\Requests\UpdateGuestRequest;

interface IGuest
{
    public function getGuests();

    public function getGuestById(int $id);

    public function createGuest(CreateGuestRequest $request);

    public function updateGuest(int $id, UpdateGuestRequest $request);

    public function deleteGuest(int $id);
}
