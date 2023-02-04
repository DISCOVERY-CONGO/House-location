<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Contracts\NotificationRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class NotificationAdminController extends Controller
{
    public function __construct(protected readonly NotificationRepositoryInterface $repository)
    {
    }

    public function index(): Renderable
    {
        $notifications = $this->repository->getNotifications();

        return view('backend.domain.notifications.index', compact('notifications'));
    }

    public function readNotification(string $id)
    {
        $notifications = $this->repository->getNotifications();

        foreach ($notifications as $notification) {
            $notify = $notification->where('id', $id)->first();
            $notify->markAsRead();

            return response()->json([
                'success' => 'Data is successfully added',
                'notifications' => $notifications,
            ]);
        }
    }

    public function markAllReads(): RedirectResponse
    {
        $this->repository->marReadNotification();

        return back();
    }

    public function delete(int $key): RedirectResponse
    {
        $this->repository->deleteNotification($key);

        return back();
    }
}
