<?php
declare(strict_types=1);

namespace App\Repository\Admins;

use App\Contracts\UserRepositoryInterface;
use App\Enums\UserRoleEnum;
use App\Models\User;
use App\Traits\ImageUploader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{
    use ImageUploader;

    public function getContents(): Collection|array
    {
        return User::query()
            ->where('role_id', '!=', UserRoleEnum::ADMINS)
            ->with(['commissioner', 'reservations'])
            ->get();
    }

    public function show(string $key): Model|Builder|null
    {
        $user = $this->getUser(key: $key);
        return $user->load(['commissioner', 'reservations']);
    }

    public function deleted(string $key): Model|Builder|null
    {
        $user = $this->getUser(key: $key);
        if ($user->images) $this->removePathOfImages($user);
        $user->delete();
        toast("Client supprimer avec success", 'success');
        return $user;
    }

    private function getUser(string $key): null|Builder|Model
    {
        return User::query()
            ->where('key', '=', $key)
            ->where('role_id', '!=', UserRoleEnum::ADMINS)
            ->first();
    }
}
