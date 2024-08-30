<?php

namespace App\Repositories;

use App\Models\Pet;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class PetRepository
{
    const PAGINATED_RECORDS = 10;

    /**
     * @param array $data
     * @return Pet
     * Creates a new pet
     */
    public function create(array $data): Pet
    {
        return auth()->user()->pets()->create($data);
    }

    /**
     * @param Pet $pet
     * @param array $data
     * @return Pet
     */
    public function update(Pet $pet, array $data): Pet{
        $pet->update($data);
        $pet->refresh();
        return $pet;
    }

    /**
     * @param String|null $species
     * @param String|null $status
     * @return LengthAwarePaginator
     * Lists all pets for the authenticated user, also handles filter for species and status
     */
    public function listPets(?String $species, ?String $status): LengthAwarePaginator
    {
        $query = auth()->user()->pets();
        if($species){
            $query->where('species', $species);
        }
        if($status){
            $query->where('status', $status);
        }
        return $query->paginate(self::PAGINATED_RECORDS);
    }
}
