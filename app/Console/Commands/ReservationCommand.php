<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enums\ReservationEnum;
use App\Mail\ReservationCancelEmail;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use LaravelIdea\Helper\App\Models\_IH_Reservation_C;
use LaravelIdea\Helper\App\Models\_IH_Reservation_QB;

class ReservationCommand extends Command
{
    protected $signature = 'reservation:cancel';

    protected $description = 'Command description';

    public function handle()
    {
        $date = Carbon::yesterday();

        $reservations = $this->getLastedReservation($date);

        if ($reservations->count() > 0) {
            foreach ($reservations as $key => $reservation) {
                if ($reservation->user) {
                    $this->senMailToCustomer($reservation);
                } else {
                    $reservation->forceDelete();
                    $this->error("Supprimer pour les utilisateurs n'ayant un compte");
                }
            }
            $this->info("La reservation  a ete supprimer");
        } else {
            $this->error("Aucune reservation disponible pour cette date");
        }
    }

    private function senMailToCustomer(mixed $reservation): void
    {
        Mail::to($reservation->user->email)
            ->send(new ReservationCancelEmail($reservation));
        if ($reservation) {
            $reservation->forceDelete();
        }
    }

    /**
     * @param Carbon $date
     * @return Reservation[]|Builder[]|Collection|_IH_Reservation_C|_IH_Reservation_QB[]
     */
    public function getLastedReservation(Carbon $date): array|_IH_Reservation_C|Collection
    {
        return Reservation::query()
            ->select([
                'id',
                'user_id',
                'status',
                'messages',
                'created_at',
                'updated_at',
                'client_id'
            ])
            ->whereDate('created_at', $date)
            ->where('status', '=', ReservationEnum::PENDING_RESERVATION)
            ->get();
    }
}
