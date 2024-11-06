<?php

namespace App\Contracts;

interface IGuest
{
    public function getGuests();

    public function getGuestById(int $id);

    public function createGuest();

    public function updateGuest();

    public function deleteGuest(int $id);
}
