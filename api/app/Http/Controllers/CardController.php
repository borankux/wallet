<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCardRequest;
use App\Http\Requests\DeleteCardRequest;
use App\Http\Requests\UpdateCardRequest;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function getCards()
    {
        return $this->cardService->getCards();
    }

    public function addCard(AddCardRequest $request, $bankId)
    {
        return $this->cardService->addCard($bankId, $request->validated());
    }

    public function updateCard(UpdateCardRequest $request, $cardId)
    {
        return $this->cardService->updateCard($cardId, $request->validated());
    }

    public function deleteCard(DeleteCardRequest $request, $cardId)
    {
        return $this->cardService->deleteCard($cardId);
    }

}
