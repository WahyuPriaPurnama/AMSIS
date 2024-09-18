<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotTelegramController extends Controller
{
    public function data()
    {
        $d = DB::table('vehicles')->where('jenis_kendaraan', 'Toyota Starlet')->first();
        echo $d->jenis_kendaraan;
    }
    public function setWebhook()
    {
        $response = Telegram::setWebhook(['url' => env('TELEGRAM_WEBHOOK_URL')]);
        dd($response);
    }

    public function commandHandlerWebHook()
    {

        $updates = Telegram::commandsHandler(true);
        $chat_id = $updates->getChat()->getId();
        $username = $updates->getChat()->getFirstName();
        $chat = $updates->getMessage()->getText();

        if (strtolower($chat) === 'halo') {

            return Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => 'Halo ' . $username . ' selamat sore'
            ]);
        } elseif (strtolower($chat) === 'mobil') {
            $d = DB::table('vehicles')->get();
            return Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => $d
            ]);
        }
    }
}
