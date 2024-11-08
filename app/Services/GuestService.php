<?php

namespace App\Services;

use App\Contracts\IGuest;
use App\Http\Requests\CreateGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

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
        return Guest::query()->create($request->validated());
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
