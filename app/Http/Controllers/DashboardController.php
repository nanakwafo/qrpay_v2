<?php

namespace App\Http\Controllers;


use App\Models\Transaction;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;
use App\Helpers\Stripeuser;
use stdClass;
use function Aws\dir_iterator;

class DashboardController extends Controller
{
    //

    public function index($platformId)
    {
        $accountId = Stripeuser::getaccountId($platformId);
        $recentTransaction = Transaction::where('accountId', $accountId)->orderBy('id', 'desc')->take(5)->get();
        return view('userpanel.dashboard', [
            'platformId' => $platformId,
            'recentTransaction' => $recentTransaction ,
            'details' => $this->profileDetails($platformId),
            'userOnboardStatus'=>$this->userOnboardStatus($platformId)
        ]);
    }

    public function getstatistics(Request $request)
    {
        $startDate = $request->date_start;
        $endDate = $request->date_end;
        $platformId = $request->platformId;
        $accountId = Stripeuser::getaccountId($platformId);
        $datasetDay = [];
        $datasetWeek = [];
        $datasetMonth = [];
        $data = Transaction::whereDate('created_at', '>=', Carbon::parse($startDate)->format('Y-m-d'))
            ->whereDate('created_at', '<=', Carbon::parse($endDate)->format('Y-m-d'))->where('accountId',$accountId)
            ->get();


        switch ($request->type) {
            case 'day':
                return $this->getExtratedDayDataset($data, $datasetDay);
                break;
            case 'week':
                return $this->getExtratedWeekDataset($accountId, $datasetWeek, $startDate, $endDate);
                break;
            case 'month':
                return $this->getExtratedMonthDataset($data, $datasetMonth);
                break;
            default:
                return $this->getExtratedDayDataset($data, $datasetDay);

        }

    }

    public function getExtratedDayDataset($data, array $datasetDay): array
    {
        $objectMon = new stdClass();
        $objectTue = new stdClass();
        $objectWed = new stdClass();
        $objectThu = new stdClass();
        $objectFri = new stdClass();
        $objectSat = new stdClass();
        $objectSun = new stdClass();

        //monday
        $totalAmountMon = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('l') == 'Monday') {
                $totalAmountMon = $totalAmountMon + $d->amount;
            }
        }
        $objectMon->y = $totalAmountMon / 100;
        $objectMon->label = "Mon";
        array_push($datasetDay, $objectMon);

        //tuesday
        $totalAmountTue = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('l') == 'Tuesday') {
                $totalAmountTue = $totalAmountTue + $d->amount;
            }
        }
        $objectTue->y = $totalAmountTue / 100;
        $objectTue->label = "Tue";
        array_push($datasetDay, $objectTue);

        //wednesday
        $totalAmountWed = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('l') == 'Wednesday') {
                $totalAmountWed = $totalAmountWed + $d->amount;
            }
        }
        $objectWed->y = $totalAmountWed / 100;
        $objectWed->label = "Wed";
        array_push($datasetDay, $objectWed);

        //thursday
        $totalAmountThu = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('l') == 'Thursday') {
                $totalAmountThu = $totalAmountThu + $d->amount;
            }
        }
        $objectThu->y = $totalAmountThu / 100;
        $objectThu->label = "Thu";
        array_push($datasetDay, $objectThu);

        //Friday
        $totalAmountFri = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('l') == 'Friday') {
                $totalAmountFri = $totalAmountFri + $d->amount;
            }
        }
        $objectFri->y = $totalAmountFri / 100;
        $objectFri->label = "Fri";
        array_push($datasetDay, $objectFri);

        //saturday
        $totalAmountSat = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('l') == 'Saturday') {
                $totalAmountSat = $totalAmountSat + $d->amount;
            }
        }
        $objectSat->y = $totalAmountSat / 100;
        $objectSat->label = "Sat";
        array_push($datasetDay, $objectSat);


        //sunday
        $totalAmountSun = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('l') == 'Sunday') {
                $totalAmountSun = $totalAmountSun + $d->amount;
            }
        }
        $objectSun->y = $totalAmountSun / 100;
        $objectSun->label = "Sun";
        array_push($datasetDay, $objectSun);


        return $datasetDay;
    }

    public function getExtratedWeekDataset($accountId, array $datasetWeek, $startDate, $endDate): array
    {


        $signupweek = date("W", strtotime($startDate));
        $year = date("Y", strtotime($startDate));
        $currentweek = date("W");

        for ($i = $signupweek; $i <= $currentweek; $i++) {
            $result = $this->getWeek($i, $year);
            //echo "Week:" . $i . " Start date:" . $result['start'] . " End date:" . $result['end'] . "<br>";
                 if($result['end'] <=  Carbon::parse($endDate)->format('Y-m-d')){
                     $week = new stdClass();
                     $week->y =  $this->summe($result['start'],$result['end'],$accountId);
                     $week->label = 'week'.$i;
                     array_push($datasetWeek, $week);
                 }
        }


        return $datasetWeek;
    }

    public function getExtratedMonthDataset($data, array $datasetMonth): array
    {
        $objectJan = new stdClass();
        $objectFeb = new stdClass();
        $objectMar = new stdClass();
        $objectApr = new stdClass();
        $objectMay = new stdClass();
        $objectJun = new stdClass();
        $objectJul = new stdClass();
        $objectAug = new stdClass();
        $objectSep = new stdClass();
        $objectOct = new stdClass();
        $objectNov = new stdClass();
        $objectDec = new stdClass();

        //January
        $totalAmountJan = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'January') {
                $totalAmountJan = $totalAmountJan + $d->amount;
            }
        }
        $objectJan->y = $totalAmountJan / 100;
        $objectJan->label = "Jan";
        array_push($datasetMonth, $objectJan);

        //February
        $totalAmountFeb = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'February') {
                $totalAmountFeb = $totalAmountFeb + $d->amount;
            }
        }
        $objectFeb->y = $totalAmountFeb / 100;
        $objectFeb->label = "Feb";
        array_push($datasetMonth, $objectFeb);

        //March
        $totalAmountMar = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'March') {
                $totalAmountMar = $totalAmountMar + $d->amount;
            }
        }
        $objectMar->y = $totalAmountMar / 100;
        $objectMar->label = "Mar";
        array_push($datasetMonth, $objectMar);

        //April
        $totalAmountApr = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'April') {
                $totalAmountApr = $totalAmountApr + $d->amount;
            }
        }
        $objectApr->y = $totalAmountApr / 100;
        $objectApr->label = "Apr";
        array_push($datasetMonth, $objectApr);

        //May
        $totalAmountMay = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'May') {
                $totalAmountMay = $totalAmountMay + $d->amount;
            }
        }
        $objectMay->y = $totalAmountMay / 100;
        $objectMay->label = "May";
        array_push($datasetMonth, $objectMay);

        //June
        $totalAmountJun = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'June') {
                $totalAmountJun = $totalAmountJun + $d->amount;
            }
        }
        $objectJun->y = $totalAmountJun / 100;
        $objectJun->label = "Jun";
        array_push($datasetMonth, $objectJun);


        //July
        $totalAmountJul = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'July') {
                $totalAmountJul = $totalAmountJul + $d->amount;
            }
        }
        $objectJul->y = $totalAmountJul / 100;
        $objectJul->label = "Jul";
        array_push($datasetMonth, $objectJul);



        //August
        $totalAmountAug = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'August') {
                $totalAmountAug = $totalAmountAug + $d->amount;
            }
        }
        $objectAug->y = $totalAmountAug / 100;
        $objectAug->label = "Aug";
        array_push($datasetMonth, $objectAug);


        //September
        $totalAmountSep = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'September') {
                $totalAmountSep = $totalAmountSep + $d->amount;
            }
        }
        $objectSep->y = $totalAmountSep / 100;
        $objectSep->label = "Sep";
        array_push($datasetMonth, $objectSep);



        //October
        $totalAmountOct = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'October') {
                $totalAmountOct = $totalAmountOct + $d->amount;
            }
        }
        $objectOct->y = $totalAmountOct / 100;
        $objectOct->label = "Oct";
        array_push($datasetMonth, $objectOct);



        //November
        $totalAmountNov = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'November') {
                $totalAmountNov = $totalAmountNov + $d->amount;
            }
        }
        $objectNov->y = $totalAmountNov / 100;
        $objectNov->label = "Nov";
        array_push($datasetMonth, $objectNov);



        //December
        $totalAmountDec = 0;
        foreach ($data as $d) {
            if (Carbon::parse($d->created_at)->format('F') == 'December') {
                $totalAmountDec = $totalAmountDec + $d->amount;
            }
        }
        $objectDec->y = $totalAmountDec / 100;
        $objectDec->label = "Dec";
        array_push($datasetMonth, $objectDec);

        return $datasetMonth;
    }


    public function getWeek($week, $year)
    {
        $dto = new DateTime();
        $result['start'] = $dto->setISODate($year, $week, 0)->format('Y-m-d');
        $result['end'] = $dto->setISODate($year, $week, 6)->format('Y-m-d');
        return $result;
    }

    public function summe($startDate, $endDate,$accountId){
       $test = DB::table('transactions')
            ->whereDate('created_at', '>=', Carbon::parse($startDate)->format('Y-m-d'))
            ->whereDate('created_at', '<=', Carbon::parse($endDate)->format('Y-m-d'))->where('accountId',$accountId)
            ->get();
       $mysum =0;
       foreach ($test as $e){
           $mysum =$mysum + $e->amount ;

       }
       return $mysum / 100;
    }


}
