<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class orderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);


$data= [

'title'=>$this->title,

'content'=>$this->content,



];

if (auth()->user()->role=='admin') {
    $data['createdBy']= [
            'userName'=>$this->createdBy->name,
            'userEmail'=>$this->createdBy->email,
    ];
}
return $data;
}

}

