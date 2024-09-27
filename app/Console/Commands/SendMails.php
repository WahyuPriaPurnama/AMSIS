<?php

namespace App\Console\Commands;

use App\Mail\MyTestMail;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = Employee::all();

        foreach ($data as $d) {
            $time = Carbon::now()->diffInDays($d->akhir_kontrak);
            if ($time == 30 or $time == 15 or $time == 7) {

                $mailData = [
                    'title' => 'Reminder Sisa Kontrak ' . $d->nama,
                    'body' => "Dengan Email ini kami menginformasikan bahwa karyawan dengan nama " . $d->nama . " dari plant " . $d->subsidiary->name . " memiliki sisa masa kontrak " . $time . " hari lagi."
                ];

                Mail::to(['wahyupriapurnama@gmail.com', 'hrdmgr@amsgroup.co.id', 'hrd@eln.amsgroup.co.id'])->send(new MyTestMail($mailData));
            }
        }
        return 0;
    }
}