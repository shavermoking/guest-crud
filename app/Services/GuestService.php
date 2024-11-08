<?php

namespace App\Services;

use App\Contracts\IGuest;
use App\Http\Requests\CreateGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Propaganistas\LaravelPhone\PhoneNumber;


class GuestService implements IGuest
{

    public function getGuests(int $perPage = 10): LengthAwarePaginator
    {
        return Guest::query()->paginate($perPage);
    }

    public function getGuestById(int $id): Guest
    {
        return Guest::query()->findOrFail($id);
    }

    public function createGuest(CreateGuestRequest $request)
    {
        $country = $request->input('country');
        if (empty($country) && $request->filled('phone')) {
            $phoneNumber = new PhoneNumber($request->input('phone'));
            $country = $phoneNumber->getCountry();
        }

        $guestData = $request->validated();
        $guestData['country'] = $country;

        return Guest::query()->create((array)$guestData);
    }

    public function updateGuest(int $id, UpdateGuestRequest $request)
    {

        $guest = Guest::query()->findOrFail($id);

        $guest->update($request->validated());

        return $guest;

    }

    public function deleteGuest(int $id): void
    {
        $guest = Guest::query()->findOrFail($id);
        $guest->delete();
    }
}
