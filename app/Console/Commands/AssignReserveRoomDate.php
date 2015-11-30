<?php

namespace App\Console\Commands;

use App\Models\ReservedRoomDate;
use Illuminate\Console\Command;
use DB;

class AssignReserveRoomDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'herb:assign.room.date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save room per calendar date in tracker table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('memory_limit', '512M');
        $reserveRoom= DB::select('select * from reserve_rooms');
        foreach($reserveRoom as $rr) {
            $dates = $this->getDates($rr->checkin, $rr->checkout);


            foreach($dates as $date) {
                if ($date == $rr->checkin) {
                    $modifier = 'i';
                } elseif ($date == $rr->checkout) {
                    $modifier = 'o';
                } else {
                    $modifier = '';
                }
                $data = [
                    'reserve_room_id' => $rr->rr_id,
                    'room_id' => $rr->room_id,
                    'status' => $rr->status,
                    'cal_date' => $date,
                    'modifier' => $modifier
                ];
                var_dump($data);
                ReservedRoomDate::firstOrCreate($data);
            }

        }
        $this->info( "done");
    }


    public function getDates($in, $out) {
        if ($in > $out) return [];

        $cin = new \DateTime($in);
        $cout = new \DateTime($out);
        $output = [];
        while($cin->diff($cout)->format('%a')) {
            $output[] .= $cin->format('Y-m-d');
            $cin->add(new \DateInterval('P1D'));
        };
        $output[] = $out;
        return $output;
    }
}
