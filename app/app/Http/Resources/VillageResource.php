<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VillageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'idVillage' => $this->idVillage,
            'idPlayer' => $this->idPlayer,
            'Xcoordinate' => $this->Xcoordinate,
            'Ycoordinate' => $this->Ycoordinate,
            'villageName' => $this->villageName,
            'capital' => $this->capital
        ];
    }
}
