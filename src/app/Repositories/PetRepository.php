<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class PetRepository
{
    const PAGINATED_RECORDS = 10;

    /**
     * @param $id
     * @return Pet
     * Finds an existing pet
     */
    public function find($id): Pet
    {
        return Pet::findOrFail($id);
    }

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

    /**
     * @param $id
     * @param $data
     * @return void
     * Updates an already existing pet
     */
    public function updatePet($id, $data): void
    {
        $pet = $this->find($id);
        $pet->update($data);
    }
}
