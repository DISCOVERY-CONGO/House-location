<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enums\ReservationEnum;
use App\Mail\ReservationCancelEmail;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use LaravelIdea\Helper\App\Models\_IH_Reservation_C;

class ReservationCommand extends Command
{
    protected $signature = 'reservation:cancel';

    protected $description = 'Remove all bookin not confirmed';

    public function handle()
    {
        $date = Carbon::yesterday();

        $reservations = $this->getLastedReservation($date);

        if ($reservations->count() > 0) {
            foreach ($reservations as $reservation) {
                if ($reservation->user) {
                    $this->senMailToCustomer($reservation);
                } else {
                    $reservation->forceDelete();
                    $this->error("Supprimer pour les utilisateurs n'ayant un compte");
                }
            }
            $this->info('La reservation  a ete supprimer');
        } else {
            $this->error('Aucune reservation disponible pour cette date');
        }
    }

    private function senMailToCustomer(mixed $reservation): void
    {
        if ($reservation) {
            Mail::to($reservation->user->email)
                ->send(new ReservationCancelEmail($reservation));
            $reservation->forceDelete();
        }
    }

    public function getLastedReservation(Carbon $date): array|_IH_Reservation_C|Collection
    {
        return Reservation::query()
            ->whereDate('created_at', $date)
            ->where('status', '=', ReservationEnum::PENDING_RESERVATION)
            ->get();
    }
}
