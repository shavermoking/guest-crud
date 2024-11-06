<?php

namespace App\Services;

use App\Contracts\IGuest;
use App\Models\Guest;

class GuestService implements IGuest
{

    public function getGuests(int $perPage = 10)
    {
        return Guest::paginate($perPage);
    }

    public function getGuestById(int $id)
    {
        return Guest::find($id);
    }

    public function createGuest()
    {
        // TODO: Implement createGuest() method.
    }

    public function updateGuest()
    {
        // TODO: Implement updateGuest() method.
    }

    public function deleteGuest(int $id)
    {
        // TODO: Implement deleteGuest() method.
    }
}
