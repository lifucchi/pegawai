<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // error_log($this)
        return [
            'id' => $this->id,
            'nip' => $this->nip,
            'nama' => $this->nama,
            'tempatlahir' => $this->tempatlahir,
            'alamat' => $this->alamat,
            'tanggallahir' => $this->tanggallahir->format('Y-m-d'), // Adjust date format as needed
            'kelamin' => $this->kelamin,
            'npwp' => $this->npwp,
            'nohp' => $this->nohp,
            'unitkerja' => $this->unitkerja,
            'tempattugas' => $this->tempattugas,
            'namajabatan' => $this->namajabatan,
            'foto' => $this->foto,
            'echelon' => new EchelonResource($this->whenLoaded('echelon')),
            'group' => new GroupResource($this->whenLoaded('group')),
            'echelon_id' => $this->echelon_id, // Assuming you have a relationship defined
            'group_id' => $this->group_id, // Assuming you have a relationship defined
            'religion_id' => $this->religion_id, // Assuming you have a relationship defined
            'religion' => new ReligionResource($this->whenLoaded('religion')), 
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Adjust date format as needed
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), // Adjust date format as needed
        ];
    }
}
