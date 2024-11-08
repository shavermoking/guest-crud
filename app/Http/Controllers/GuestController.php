<?php

namespace App\Http\Controllers;

use App\Contracts\IGuest;
use App\Http\Requests\CreateGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;

class GuestController extends Controller
{
    public IGuest $guestService;
    public function __construct()
    {
        $this->guestService = App::make(IGuest::class);
    }

    public function index(): JsonResponse
    {
        $guests = $this->guestService->getGuests();
        return response()->json($guests);
    }

    public function show(int $id): JsonResponse
    {
        $guest = $this->guestService->getGuestById($id);
        return response()->json($guest);
    }

    public function store(CreateGuestRequest $request): Application|RedirectResponse|Redirector|JsonResponse
    {

        $guest = $this->guestService->createGuest($request);
        return response()->json($guest, 201);
    }

    public function update(int $id, UpdateGuestRequest $request): JsonResponse
    {
        $guest = $this->guestService->updateGuest($id, $request);
        return response()->json($guest);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->guestService->deleteGuest($id);
        return response()->json(['message' => 'Guest successfully deleted']);
    }
}
