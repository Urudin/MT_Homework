<?php

namespace App\Services;

use App\Models\Pet;
use App\Repositories\PetRepository;
use Illuminate\Support\Facades\Gate;

class PetService
{
    public function __construct(protected PetRepository $petRepository){}

    public function createPet(array $data)
    {
        // Validate, sanitize, send welcome email, etc.
        return $this->petRepository->create($data);
    }

    public function deletePet(Pet $pet){
        return $pet->delete();
    }

    public function updatePet(Pet $pet, array $data){
        $pet->update($data);
    }

    public function getPetList(?String $species, ?String $status){
        return $this->petRepository->listPets($species, $status);
    }

    public function authorizeOwner(Pet $pet) :void{
        if (! Gate::allows('owns-pet', $pet)) {
            abort(403);
        }
    }
}
