<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartAllCams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start-all-cams';

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
        $cams = [

            'cam1' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/101',
            'cam2' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/201',
            'cam3' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/301',
            'cam4' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/401',
            'cam5' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/501',
            'cam6' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/601',
            'cam6' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/701',
            'cam6' => 'rtsp://admin:BlueOceanFoods@192.168.110.181/streaming/channels/801',
        ];

        foreach ($cams as $name => $url) {
            $outputPath = public_path("stream/{$name}/index.m3u8");

            // Buat folder jika belum ada
            if (!file_exists(dirname($outputPath))) {
                mkdir(dirname($outputPath), 0777, true);
            }

            //  $cmd = "start  /B cmd /c ffmpeg -i {$url} -fflags flush_packets -max_delay 5 -flags -global_header " .
            //            "-hls_time 5 -hls_list_size 3 -vcodec copy -y {$outputPath}";

            $cmd = "start /B cmd /c ffmpeg -i {$url} -fflags flush_packets -max_delay 5 -flags -global_header " .
                "-hls_time 5 -hls_list_size 3 -vcodec copy -y {$outputPath}";
            pclose(popen($cmd, "r"));
            $this->info("Streaming started for {$name}");
        }
    }
}
