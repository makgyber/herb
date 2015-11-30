<?php
/**
 * Created by PhpStorm.
 * User: jammer
 * Date: 30/11/15
 * Time: 8:06 PM
 */

namespace App\Models;


class Calendar
{

    const DEFAULT_FORMAT = 'D m-d';

    public static function getInclusiveDates($start, $end, $format = null)
    {
        $newFormat = self::DEFAULT_FORMAT;
        if ($format) {
            $newFormat = $format;
        }
        $dstart = new \DateTime($start);
        $interval = $dstart->diff(new \DateTime($end))->format('%a');

        $output = [];
        for( $ctr = 0; $ctr <= $interval; $ctr++) {
            $caldate = $dstart->format($newFormat);
            array_push($output, $caldate);
            $dstart->add(new \DateInterval('P1D'));
        }
        return $output;
    }

}