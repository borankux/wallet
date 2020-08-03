<?php


namespace App\Services;


use App\Models\Bank;
use App\Models\Card;

class CardService extends BaseService
{

    /**
     * @param $bankId
     * @param array $params
     * @return Bank|\Illuminate\Database\Eloquent\Model
     */
    public function addCard($bankId, $params = [])
    {
        return Bank::create($params);
    }


    /**
     * @return Card[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getCards()
    {
        return Card::all()->map(function (Card $card) {
            return $card;
        });
    }

    /**
     * @param $cardId
     * @return bool|string|null
     */
    public function deleteCard($cardId)
    {
        try {
            return Bank::findOrFail($cardId)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * @param $cardId
     * @param array $params
     * @return bool
     */
    public function updateCard($cardId, $params = [])
    {
        return Bank::findOrFail($cardId)->update($params);
    }
}