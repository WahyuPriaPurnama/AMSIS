<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class EmployeeChart extends Component
{
    public $ams, $eln1, $eln2, $bofi, $hk, $rmm;

    public function mount($ams, $eln1, $eln2, $bofi, $hk, $rmm)
    {
        $this->ams = $ams;
        $this->eln1 = $eln1;
        $this->eln2 = $eln2;
        $this->bofi = $bofi;
        $this->hk = $hk;
        $this->rmm = $rmm;
    }

    public function render()
    {
        return view('livewire.dashboard.employee-chart');
    }
}
