<?php

namespace App\Services\DishubKota;

use App\Models\Master\Perusahaan;

class PerusahaanService
{
    public function getModel(){
        return Perusahaan::with('provinsi', 'kota', 'user');
    }
    public function getDatatable($request, $meta)
    {
        $query = $this->getModel();

        if ($request->search !== null) {
            $query->where(function($query) use ($request) {
                $columns = ['nama', 'nib'];
                foreach ($columns as $key => $column) {
                    $query->orWhereRaw("LOWER(".$column.") LIKE ?", "%".trim(strtolower($request->search))."%");
                }
            });
        }

        $query = $query->orderBy('created_at', $meta['orderBy']);

        $data = $query->paginate($meta['limit']);
        $meta = [
            'total'        => $data->total(),
            'count'        => $data->count(),
            'per_page'     => $data->perPage(),
            'current_page' => $data->currentPage(),
            'total_pages'  => $data->lastPage()
        ];

        return ['data' => $data->toArray()['data'], 'meta' => $meta];
    }

    public function getDetailByID($id)
    {
        return $this->getModel()->where('id', $id)->first();
    }

    public function store($request)
    {
        $data = new Perusahaan();
        $data = $this->setContent($data, $request);
        $data->save();
        return $data;
    }

    public function update($id, $request)
    {
        $update = $this->getDetailByID($id);
        $update = $this->setContent($update, $request);
        $update->update();
        return $update;
    }

    public function delete($id)
    {
        $data = $this->getDetailByID($id);
        $data->delete();
        $data->save();
        return $data ?? [];
    }

    public function setContent($data, $request){
        $data->nama = $request->nama ?? $data->nama;
        $data->nib = $request->nib ?? $data->nib;
        $data->alamat = $request->alamat ?? $data->alamat;
        $data->provinsi_id = $request->provinsi_id ?? $data->provinsi_id;
        $data->kota_id = $request->kota_id ?? $data->kota_id;
        $data->nama_pimpinan = $request->nama_pimpinan ?? $data->nama_pimpinan;
        $data->email = $request->email ?? $data->email;
        $data->no_telpon_perusahaan = $request->no_telpon_perusahaan ?? $data->no_telpon_perusahaan;
        $data->no_telpon_penanggung_jawab = $request->no_telpon_penanggung_jawab ?? $data->no_telpon_penanggung_jawab;
        $data->nomor_npwp = $request->nomor_npwp ?? $data->nomor_npwp;
        $data->jenis_angkutan_id = $request->jenis_angkutan_id ?? $data->jenis_angkutan_id;
        $data->no_sk_izin_penyelenggaraan = $request->no_sk_izin_penyelenggaraan ?? $data->no_sk_izin_penyelenggaraan;
        $data->tanggal_sk_terbit = $request->tanggal_sk_terbit ?? $data->tanggal_sk_terbit;
        $data->tanggal_sk_expired = $request->tanggal_sk_expired ?? $data->tanggal_sk_expired;
        return $data;
    }
}
