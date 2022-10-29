<?php

declare(strict_types=1);

namespace App\Repository\Backend\Booking;

use App\Enums\ReservationEnum;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use LaravelIdea\Helper\App\Models\_IH_Reservation_QB;

class BookingChartRepository
{
    public function getBookingConfirmed(): array
    {
        $reservations = $this->getReservations()
            ->where('status', '=', ReservationEnum::CONFIRMED_RESERVATION)
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $data = [];

        foreach ($reservations as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);

        return $data;
    }

    public function getBookingUnConfirmed(): array
    {
        $resultats = $this->getReservations()
            ->where('status', '=', ReservationEnum::PENDING_RESERVATION)
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $data = [];

        foreach ($resultats as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);

        return $data;
    }


    private function getReservations(): Builder|_IH_Reservation_QB
    {
        return Reservation::query()
            ->select(
                \DB::raw("COUNT(*) as count"),
                \DB::raw("DAYNAME(created_at) as day_name"),
                \DB::raw("DAY(created_at) as day")
            );
    }
}
