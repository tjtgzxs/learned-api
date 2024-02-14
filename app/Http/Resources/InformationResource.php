<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $list=parent::toArray($request);
        $list['created_at']=$this->created_at->format('d/m/Y');
        $list['category_name']=$this->category->name;
        $list['category_color']=$this->category->color;
        return  $list;

    }
}
