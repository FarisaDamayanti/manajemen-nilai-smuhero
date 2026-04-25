<?php

namespace App\Observers;

use App\Models\Nilai;
use App\Models\Siswa;

class NilaiObserver
{
    /**
     * Handle the Nilai "created" event.
     */
    public function saved(Nilai $nilai): void
    {
        $this->updated($nilai->id_siswa);
    }

    /**
     * Handle the Nilai "updated" event.
     */
    public function updated($id_siswa): void
    {
        $rata = Nilai::where('id_siswa', $id_siswa)->avg('nilai');

        Siswa::where('id', $id_siswa)->update([
            'nilai_rata' => round($rata, 2)
        ]);
    }

    /**
     * Handle the Nilai "deleted" event.
     */
    public function deleted(Nilai $nilai): void
    {
        $this->updated($nilai->id_siswa);
    }

    /**
     * Handle the Nilai "restored" event.
     */
    public function restored(Nilai $nilai): void
    {
        //
    }

    /**
     * Handle the Nilai "force deleted" event.
     */
    public function forceDeleted(Nilai $nilai): void
    {
        //
    }
}
