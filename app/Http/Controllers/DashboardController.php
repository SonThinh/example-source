<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
use DateInterval;
use DatePeriod;

class DashboardController extends ApiController
{
    public function index(Request $request)
    {
        $displayType = $request->display_type;
        if (!in_array($displayType, ['monthly', 'daily'])) {
            $displayType = 'monthly';
        }
        $from = '';
        $to = '';
        if ($request->search_datetime) {
            $datetimes = explode(' - ', $request->search_datetime);
            $from = strtotime($datetimes[0]);
            $to = strtotime($datetimes[1] . '+1 day');
        }

        if (!is_int($from) || !is_int($to)) {
            switch ($displayType) {
                case 'monthly':
                    $from = date('U', strtotime(date('Y-m-01') . ' -2 month'));
                    $to = date('U', strtotime(date('Y-m-01') . ' +1 month'));
                    break;
                default:
                    $from = date('U', strtotime('-1 months'));
                    $to = date('U', strtotime('+1 days'));
            }
        }

        // Define the x axis of the graph displayed on the dashboard
        $label = [];
        $start = new DateTime(date('Y-m-d', $from));
        switch ($displayType) {
            case 'monthly':
                $interval = new DateInterval('P1M');
                $sqlDateFormat = '%Y-%m';
                $displayFormat = 'Y-m';
                break;
            default:
                $interval = new DateInterval('P1D');
                $sqlDateFormat = '%Y-%m-%d';
                $displayFormat = 'Y-m-d';
        }
        $end = new DateTime(date('Y-m-d', $to));
        $period = new DatePeriod($start, $interval, $end);
        foreach ($period as $dt) {
            $label[] = $dt->format('U');
        }
        $userSum = [];
        foreach ($label as $date) {
            $needle = date($displayFormat, $date);
            $userSum['statistics'][$needle] = User::query()->countUser($needle, $sqlDateFormat);
        }
        $userSum['total_user'] = User::query()->count();
        return $this->httpOK($userSum);
    }
}
