<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetStoreRequest;
use App\Http\Requests\PetUpdateRequest;
use App\Models\Pet;
use App\Services\PetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PetController extends Controller
{
    public function __construct(protected PetService $petService){
    }

    public function show(Request $request, Pet $pet){
        $this->petService->authorizeOwner($pet);
        return view('pets.show', ['pet' => $pet]);
    }
    public function index(Request $request){
        $pets = $this->petService->getPetList($request->get('species'), $request->get('status'));
        return view('pets.index', compact('pets'));
    }

    public function store(PetStoreRequest $request)
    {
        $this->petService->createPet($request->validated());
        return redirect(route('pets.index'));
    }

    public function update(PetUpdateRequest $request, Pet $pet){
        $this->petService->authorizeOwner($pet);
        $this->petService->updatePet($pet, $request->all());
        return back();
    }

    public function destroy(Request $request, Pet $pet){
        $this->petService->authorizeOwner($pet);
        $this->petService->deletePet($pet);
        return back();
    }

    public function create(){
        return view('pets.create');
    }

    public function edit(Pet $pet){
        $this->petService->authorizeOwner($pet);
        return view('pets.edit', ['pet' => $pet]);
    }
}
