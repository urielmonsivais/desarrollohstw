<?php

namespace App\Http\Controllers;

use App\BankLoan;
use App\CreditBureau;
use App\CreditCard;
use App\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.pages.dashboard');
    }


    public function profile()
    {
        $user = Auth::user();
        return view('admin.components.profile', compact('user'));
    }


    public function customers()
    {
        $user = Auth::user();
        $customers = Customer::all();
        return view('admin.components.customers', compact('user', 'customers'));
    }


    public function saveLoan(Request $r)
    {

        $data = $r->all();

        $loan = new BankLoan();
        $loan->amount = $data['amount'];
        $loan->application_date = date('Y-m-d');
        $loan->status = 'OK';
        $loan->description = '--';
        $loan->user_id = $data['user_id'];
        $loan->customer_id = $data['customer_id'];
        $loan->payment_deadline = $data['payment_deadline'];
        $loan->save();

        return redirect('/asignar-prestamo-cliente');
    }


    public function storeCustomer(Request $r)
    {
        $customer = new Customer($r->all());
        $customer->save();

        $buro = new CreditBureau();


        $d = rand(1, 3);

        switch ($d) {
            case 1:
                $buro->description = 'Apto para asignar prestamo o tarjetas!';
                $buro->state = 'SUCCESS';
                break;
            case 2:
                $buro->description = 'Cliente con prestamos rezagados!';
                $buro->state = 'WARNING';
                break;
            case 3:
                $buro->description = 'No apto para asignar prestamo o tarjetas!';
                $buro->state = 'DANGER';
                break;
        }

        $buro->customer_id = $customer->id;
        $buro->save();


        return redirect('/gestion-de-clientes');
    }


    public function updateCustomer(Request $r)
    {


        $id = $r->customerId;
        $data = $r->all();
        $data['id'] = $id;
        //unset($data['_token']);
        //unset($data['customerId']);
        $c = Customer::find($id);
        $c->update($data);

        //return dd($c->toArray());



        return redirect('/gestion-de-clientes');
    }


    public function saveCard(Request $r)
    {
        $data = $r->all();
        $data['description'] = 'E,';
        $data['due_date'] = date('Y-m-d');
        $card = new CreditCard($data);
        $card->save();

        return redirect('/asignar-tarjeta-cliente');
    }


    public function setState($id, $state)
    {

        $card = CreditCard::find($id);
        $card->description = $state;
        $card->update();

        return redirect('/asignar-tarjeta-cliente');
    }



    public function checkCustomer(Request $r)
    {
        $customers = Customer::all();
        $cards = CreditCard::all();
        $num = '';

        for ($i = 0; $i < 16; $i++) {
            $d = rand(0, 9);
            $num = $num . $d;
        }




        $data = $r->all();
        $client_number = '';
        $birth = null;
        $customer = null;

        if (isset($data['birth_date'])) {
            $birth = $data['birth_date'];
        }

        if (isset($data['client_number']) && $birth) {
            $customer = Customer::where('desctription', '=', $data['client_number'])
                ->where('birth_date', '=', $birth)
                ->first();
        } else if (isset($data['rfc']) && $birth) {
            $customer = Customer::where('rfc', '=', $data['rfc'])
                ->where('birth_date', '=', $birth)
                ->first();
        } else if (isset($data['curp']) && $birth) {
            $customer = Customer::where('curp', '=', $data['curp'])
                ->where('birth_date', '=', $birth)
                ->first();;
        }


        $selectedCustomer = $customer;
        $loans = null;
        if ($selectedCustomer != null) {
            $loans = BankLoan::where('customer_id', '=', $selectedCustomer->id)->get();
        }


        $nobankloan = null;
        $nobankloanss = array(
            array('institution' => 'Coppel', 'code' => '1312312', 'status' => 'ACTIVO'),
            array('institution' => 'Famsa', 'code' => '2131231231', 'status' => 'ACTIVO'),
            array('institution' => 'Elektra', 'code' => '1231236722', 'status' => 'ACTIVO'),
        );
        $ir = rand(0, 2);
        $nobankloans = array($nobankloanss[$ir]);


        return view('admin.components.check_customer', compact('customers', 'num', 'cards', 'selectedCustomer', 'loans', 'nobankloans'));
    }


    public function assignLoan(Request $r)
    {
        $customers = Customer::all();
        $cards = CreditCard::all();
        $num = '';

        for ($i = 0; $i < 16; $i++) {
            $d = rand(0, 9);
            $num = $num . $d;
        }


        $loans = BankLoan::all();

        $data = $r->all();
        $client_number = '';
        $birth = null;
        $customer = null;

        if (isset($data['birth_date'])) {
            $birth = $data['birth_date'];
        }

        if (isset($data['client_number']) && $birth) {
            $customer = Customer::where('description', '=', $data['client_number'])
                ->where('birth_date', '=', $birth)
                ->first();
        } else if (isset($data['rfc']) && $birth) {
            $customer = Customer::where('rfc', '=', $data['rfc'])
                ->where('birth_date', '=', $birth)
                ->first();
        } else if (isset($data['curp']) && $birth) {
            $customer = Customer::where('curp', '=', $data['curp'])
                ->where('birth_date', '=', $birth)
                ->first();;
        }


        $selectedCustomer = $customer;



        return view('admin.components.bankloans', compact('customers', 'num', 'cards', 'selectedCustomer', 'loans'));
    }

    public function assignCard()
    {

        $customers = Customer::all();
        $cards = CreditCard::all();
        $num = '';

        for ($i = 0; $i < 16; $i++) {
            $d = rand(0, 9);
            $num = $num . $d;
        }

        return view('admin.components.cards', compact('customers', 'num', 'cards'));
    }


    public function computedLoan(Request $r)
    {

        $customers = Customer::all();
        $cards = CreditCard::all();
        $num = '';

        $data = $r->all();
        $report = null;

        if (isset($data['genrep'])) {
            $client = $data['name'];
            $years = $data['deadline'];
            $type = $data['type'];
            $interest_rate = $data['interest_rate'] / 100;
            $total = $data['total'];

            $report = array();
            $payments = array();
            $currentDate = date('Y-m-d');

            //$currentDate = strtotime($currentDate . "+ 1 days");
            //return date("Y-m-d", $currentDate);

            if ($type == 'MENSUAL') {
                for ($i = 0; $i < $years * 12; $i++) {

                    $currentDate = strtotime($currentDate . "+ 30 days");

                    $payment = array(
                        "payment_number" =>  $i + 1,
                        "payment_date" => date("Y-m-d", $currentDate),
                        "quota" => $total / $years,
                        "interest" => ($total / $years) * $interest_rate,
                        "ca" => rand(0, $total),
                        "cf" => (($total / $years) * $interest_rate) + $total / $years
                    );
                    $currentDate = date("Y-m-d", $currentDate);
                    array_push($payments, $payment);
                }

                $report['payments'] = $payments;
            } else {

                for ($i = 0; $i < $years * 12 * 2; $i++) {

                    $currentDate = strtotime($currentDate . "+ 15 days");

                    $payment = array(
                        "payment_number" =>  $i + 1,
                        "payment_date" => date("Y-m-d", $currentDate),
                        "quota" => $total / ($years * 2),
                        "interest" => ($total / ($years * 2)) * $interest_rate,
                        "ca" => rand(0, $total),
                        "cf" => (($total / ($years * 2)) * $interest_rate) + $total / ($years * 2)
                    );
                    $currentDate = date("Y-m-d", $currentDate);
                    array_push($payments, $payment);
                }
                $report['payments'] = $payments;
            }

            $cf = $total * ((1 + $interest_rate) * (1 + $interest_rate));
            $report['cf'] = $cf;
        }

        Session::put('REPORT', $report);
        if (isset($report)) {
            Session::put('customer_name', $client);
        }
        Session::save();

        return view('admin.components.coputedloan', compact('customers', 'num', 'cards', 'report'));
    }


    public function downloadPDF()
    {
        if ($report = Session::get('REPORT')) {

            $customer_name = Session::get('customer_name');

            $pdf = PDF::loadView('admin.components.comploanrep', compact('report', 'customer_name'));
            return $pdf->download('Reporte.pdf');
        }
        return redirect()->route('computedLoan');
    }

    public function reportLoanPdf($id)
    {
        $report = array();

        $customer_name = '';

        $data = BankLoan::find($id);

        $client = $data->customer->name;
        $years = $data->payment_deadline;
        $type = 'MENSUAL';
        $interest_rate = 4;
        $total = $data->amount;

        $report = array();
        $payments = array();
        $currentDate = date('Y-m-d');

        //$currentDate = strtotime($currentDate . "+ 1 days");
        //return date("Y-m-d", $currentDate);

        if ($type == 'MENSUAL') {
            for ($i = 0; $i < $years * 12; $i++) {

                $currentDate = strtotime($currentDate . "+ 30 days");

                $payment = array(
                    "payment_number" =>  $i + 1,
                    "payment_date" => date("Y-m-d", $currentDate),
                    "quota" => $total / $years,
                    "interest" => ($total / $years) * $interest_rate,
                    "ca" => rand(0, $total),
                    "cf" => (($total / $years) * $interest_rate) + $total / $years
                );
                $currentDate = date("Y-m-d", $currentDate);
                array_push($payments, $payment);
            }

            $report['payments'] = $payments;
        } else {

            for ($i = 0; $i < $years * 12 * 2; $i++) {

                $currentDate = strtotime($currentDate . "+ 15 days");

                $payment = array(
                    "payment_number" =>  $i + 1,
                    "payment_date" => date("Y-m-d", $currentDate),
                    "quota" => $total / ($years * 2),
                    "interest" => ($total / ($years * 2)) * $interest_rate,
                    "ca" => rand(0, $total),
                    "cf" => (($total / ($years * 2)) * $interest_rate) + $total / ($years * 2)
                );
                $currentDate = date("Y-m-d", $currentDate);
                array_push($payments, $payment);
            }
            $report['payments'] = $payments;
        }

        $cf = $total * ((1 + $interest_rate) * (1 + $interest_rate));
        $report['cf'] = $cf;

        $customer_name = $client;

        $deadline = $years;
        $interest = $interest_rate;
        $amount = $total;
        $pdf = PDF::loadView('admin.components.loanreport', compact('report', 'customer_name', 'deadline', 'type', 'interest', 'amount'));
        return $pdf->download(time() . 'report.pdf');
    }

    public function updateUser(Request $r, $id)
    {

        $user = Auth::user();

        $user->user_name = $r->user_name;
        $user->full_name = $r->full_name;
        $user->email = $r->email;
        $user->save();

        return redirect('/perfil');
    }


    public function removeCustomer($id)
    {
        $c = Customer::find($id);


        try {

            $cards = CreditCard::where('customer_id', '=', $c->id)->get();

            foreach ($cards as $key => $value) {
                $value->delete();
            }

            $loans = BankLoan::where('customer_id', '=', $c->id)->get();
            foreach ($loans as $key => $value) {
                $value->delete();
            }


            $bureaus = CreditBureau::where('customer_id', '=', $c->id)->get();
            foreach ($bureaus as $key => $value) {
                $value->delete();
            }
            $c->delete();
            return redirect('/gestion-de-clientes')
                ->with('success', 'Cliente eliminado correctamente!');
        } catch (Exception $th) {
            return redirect('/gestion-de-clientes')
                ->withErrors($th->getMessage());
        }
    }

    public function reportLoans(Request $r)
    {
        $customers = Customer::all();
        $cards = CreditCard::all();
        $num = '';

        for ($i = 0; $i < 16; $i++) {
            $d = rand(0, 9);
            $num = $num . $d;
        }




        $data = $r->all();
        $client_number = '';
        $birth = null;
        $customer = null;

        if (isset($data['birth_date'])) {
            $birth = $data['birth_date'];
        }


        if (isset($data['client_number']) && $birth) {
            $customer = Customer::where('desctription', '=', $data['client_number'])
                ->where('birth_date', '=', $birth)
                ->first();
        } else if (isset($data['rfc']) && $birth) {

            $customer = Customer::where('rfc', '=', $data['rfc'])
                ->where('birth_date', '=', $birth)
                ->first();
        } else if (isset($data['curp']) && $birth) {
            $customer = Customer::where('curp', '=', $data['curp'])
                ->where('birth_date', '=', $birth)
                ->first();;
        }


        $selectedCustomer = $customer;
        $loans = null;
        if ($selectedCustomer != null) {
            $loans = BankLoan::where('customer_id', '=', $selectedCustomer->id)->get();
        }


        $nobankloan = null;
        $nobankloanss = array(
            array('institution' => 'Coppel', 'code' => '1312312', 'status' => 'ACTIVO'),
            array('institution' => 'Famsa', 'code' => '2131231231', 'status' => 'ACTIVO'),
            array('institution' => 'Elektra', 'code' => '1231236722', 'status' => 'ACTIVO'),
        );
        $ir = rand(0, 2);
        $nobankloans = array();




        return view('admin.components.loansreports', compact('customers', 'num', 'cards', 'selectedCustomer', 'loans', 'nobankloans'));
    }
}
