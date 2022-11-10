<?php

namespace App\Exports;

use App\Models\Umkm;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;



class UmkmExport implements FromView

{
  

 

    public function view(): View
    
    {
        return view('admin.export_umkm', [
            'umkm' => Umkm::all()
        ]);
    }
}
