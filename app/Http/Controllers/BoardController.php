<?php

namespace App\Http\Controllers;
use App\Board;
use App\Leader;
use App\Dealer;
use App\Vendor;
use App\Assets_Goods_Services;
use App\Purchase_Transaction;
use App\ReceiptTransaction;
use App\Purchase_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class BoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:board');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('board.pages.dashboard-board');
    }

    // retun Leader page view
    public function OpenLeaderPage()
    {
        return view('board.pages.leaders');
    }

     // leader table view
    public function LeaderTablePage(){
        $leader = Leader::all();
        return view('board.pages.ajaxPages.leaderTable', compact('leader'));
    }
     // leader table serarch view
    public function LeaderTablePageSearch(Request $request){
        $text = $request->text;
        $leader = DB::table('leaders')
                ->where('first_name', 'like', '%'.$text.'%')
                ->get();
        return view('board.pages.ajaxPages.leaderTable', compact('leader'));
    }

     // register leader view
    public function RegisterLeaderPage(){
        $generation = DB::table('leaders')
                ->select('id','first_name','middle_name','last_name','email')
                ->get();
        return view('board.pages.ajaxPages.registerLeader', compact('generation'));
    }


    // Register new Leader
    public function RegisterLeader(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Email' => 'unique:leaders,email',
            'CitizenshipNumber' => 'unique:leaders,citizenship_no',
            
        ]);
        $leader = new Leader;
        $leader->first_name = $request->FirstName;
        $leader->middle_name = $request->MiddleName;
        $leader->last_name = $request->LastName;
        $leader->gender = $request->Gender;
        $leader->dob = $request->DOB;
        $leader->citizenship_no = $request->CitizenshipNumber;
        $leader->email = $request->Email;
        $leader->mobile = $request->Mobile;
        $leader->father_name = $request->FatherName;
        $leader->permanent_address = $request->PermanentAddress;
        $leader->temporary_address = $request->TemporaryAddress;
        $leader->qualification = $request->Qualification;
        $leader->experience = $request->Experience;
        $leader->generation_of = $request->GenerationOf;
        $leader->beneficiary_name = $request->BeneficiaryName;
        $leader->beneficiary_citizenship_no = $request->BeneficiaryCitizenship;
        $leader->beneficiary_relationship = $request->BeneficiaryRelationship;
        $leader->added_by = $request->RegisteredBy;
        if($request->hasFile('CitizenshipPhoto'))
        {
            $file = $request->file('CitizenshipPhoto');
            $name = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/images/Leaders/Citizenship', $name);
            $leader->citizenship_photo = $name;
        }
        if($request->hasFile('Photo'))
        {
            $filee = $request->file('Photo');
            $namee = uniqid().$filee->getClientOriginalName();
            $filee->move(public_path().'/images/Leaders/Profile', $namee);
            $leader->profile_photo = $namee;
        }
        if($request->hasFile('BeneficiaryCitizenshipPhoto'))
        {
            $fileee = $request->file('BeneficiaryCitizenshipPhoto');
            $nameee = uniqid().$fileee->getClientOriginalName();
            $fileee->move(public_path().'/images/Leaders/BeneficiaryCitizenship', $nameee);
            $leader->beneficiary_citizenship_photo = $nameee;
        }
        $leader->save();

        // $text = 'Your profile has been created';
        // $email = $request->Email;
        // $username = $request->FirstName.' '.$request->MiddleName.' '.$request->LastName;
        // Mail::send(['html'=>'mail'],['text'=>$text,'username'=>$username,'email'=>$email,'name','Green Nepal Multicare Provision Pvt.Ltd.'], function($message) use ($email, $username) {
        //     $message->to($email, 'To '.$username)->subject('Notification');
        //     $message->from('greennepalmulticare@gmail.com', 'Green Nepal Multicare Provision Pvt.Ltd.');
        // });
        return response()->json(['status' => 200, 'message' => 'Registered successfully']);
    }

    // verify leader
    public function VerifyLeader(Request $request){
        $leader = Leader::find($request->id);
        $leader->verified_by = $request->verified_by;
        $leader->save();
        return response()->json(['status' => 200, 'message' => 'Verification successfully']);
    }


    // board modal view of leader
    public function BoardModalData(Request $request){
        $leader = DB::table('leaders')
                ->where('id', '=', $request->id)
                ->get();
        $generation = DB::table('leaders')
                ->select('id','first_name','middle_name','last_name','email')
                ->get();
        return view('board.pages.ajaxPages.leaderViewEditModal', compact('leader', 'generation'));
    } 

// update leader
    public function UpdateLeader(Request $request){
        $leader = Leader::find($request->id);
        $leader->first_name = $request->FirstName;
        $leader->middle_name = $request->MiddleName;
        $leader->last_name = $request->LastName;
        $leader->gender = $request->Gender;
        $leader->dob = $request->DOB;
        $leader->citizenship_no = $request->CitizenshipNumber;
        $leader->email = $request->Email;
        $leader->mobile = $request->Mobile;
        $leader->father_name = $request->FatherName;
        $leader->permanent_address = $request->PermanentAddress;
        $leader->temporary_address = $request->TemporaryAddress;
        $leader->qualification = $request->Qualification;
        $leader->experience = $request->Experience;
        $leader->pan_no = $request->LeaderPanNo;
        $leader->generation_of = $request->GenerationOf;
        $leader->beneficiary_name = $request->BeneficiaryName;
        $leader->beneficiary_citizenship_no = $request->BeneficiaryCitizenship;
        $leader->beneficiary_relationship = $request->BeneficiaryRelationship;
        if($request->hasFile('CitizenshipPhoto'))
        {
            $file = $request->file('CitizenshipPhoto');
            $name = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/images/Leaders/Citizenship', $name);
            $leader->citizenship_photo = $name;
        }
        if($request->hasFile('Photo'))
        {
            $filee = $request->file('Photo');
            $namee = uniqid().$filee->getClientOriginalName();
            $filee->move(public_path().'/images/Leaders/Profile', $namee);
            $leader->profile_photo = $namee;
        }
        if($request->hasFile('BeneficiaryCitizenshipPhoto'))
        {
            $fileee = $request->file('BeneficiaryCitizenshipPhoto');
            $nameee = uniqid().$fileee->getClientOriginalName();
            $fileee->move(public_path().'/images/Leaders/BeneficiaryCitizenship', $nameee);
            $leader->beneficiary_citizenship_photo = $nameee;
        }
        $leader->save();

        // $text = 'Your profile has been updated';
        // $email = $request->Email;
        // $username = $request->FirstName.' '.$request->MiddleName.' '.$request->LastName;
        // Mail::send(['html'=>'mail'],['text'=>$text,'username'=>$username,'email'=>$email,'name','Green Nepal Multicare Provision Pvt.Ltd.'], function($message) use ($email, $username) {
        //     $message->to($email, 'To '.$username)->subject('Notification');
        //     $message->from('greennepalmulticare@gmail.com', 'Green Nepal Multicare Provision Pvt.Ltd.');
        // });

        return response()->json(['status' => 200, 'message' => 'Updated successfully']);
    }

    // delete Leader
    public function DeleteLeader(Request $request){
        $fileName = DB::table('leaders')
                        ->select('first_name','middle_name','last_name','email','citizenship_photo', 'profile_photo', 'beneficiary_citizenship_photo')
                        ->where('id', '=', $request->id)
                        ->get();    
        // $leader = Leader::find($request->id);
        // $leader->delete();
        foreach($fileName as $fileNames){
        $profile = $fileNames->profile_photo;
        $citizenship = $fileNames->citizenship_photo;
        $beneficiary = $fileNames->beneficiary_citizenship_photo;
        $profile_path = "./images/Leaders/Profile/".$profile;
        $citizenship_path = "./images/Leaders/Citizenship/".$citizenship;
        $beneficiary_path = "./images/Leaders/BeneficiaryCitizenship/".$beneficiary;
        if(File::exists($profile_path)) {
            File::delete($profile_path);
        }
        if(File::exists($citizenship_path)) {
            File::delete($citizenship_path);
        }
        if(File::exists($beneficiary_path)) {
            File::delete($beneficiary_path);
        }
        // $text = 'Your profile has been deleted';
        // $email = $fileNames->email;
        // $username = $fileNames->first_name.' '.$fileNames->middle_name.' '.$fileNames->last_name;
        // Mail::send(['html'=>'mail'],['text'=>$text,'username'=>$username,'email'=>$email,'name','Green Nepal Multicare Provision Pvt.Ltd.'], function($message) use ($email, $username) {
        //     $message->to($email, 'To '.$username)->subject('Notification');
        //     $message->from('greennepalmulticare@gmail.com', 'Green Nepal Multicare Provision Pvt.Ltd.');
        // });
         }
        $leader = Leader::find($request->id);
        $leader->delete();
        return response()->json(['status' => 200, 'message' => 'Deleted successfully']);
    }



    // return Dealer page view
    public function OpenDealerPage()
    {
        return view('board.pages.dealers');
    }

     // register dealer ajax view
    public function RegisterDealerPage(){
        $owner = DB::table('leaders')
                ->select('id','first_name','middle_name','last_name','email')
                ->get();
        return view('board.pages.ajaxPages.registerDealer', compact('owner'));
    }

    // register new dealer
    public function RegisterDealer(Request $request){
        $dealer = new Dealer;
        $dealer->name = $request->DealerName;
        $dealer->date_of_establishment = $request->EstdDate;
        $dealer->address = $request->Address;
        $dealer->pan_no = $request->PanNo;
        $dealer->phone_no = $request->Phone;
        $dealer->email = $request->Email;
        $dealer->added_by = $request->RegisteredBy;
        $dealer->owner = $request->Owner;
        $dealer->save();

        // $text = 'Dealer profile has been created';
        // $email = $request->Email;
        // $username = $request->FirstName.' '.$request->MiddleName.' '.$request->LastName;
        // Mail::send(['html'=>'mail'],['text'=>$text,'username'=>$username,'email'=>$email,'name','Green Nepal Multicare Provision Pvt.Ltd.'], function($message) use ($email, $username) {
        //     $message->to($email, 'To '.$username)->subject('Notification');
        //     $message->from('greennepalmulticare@gmail.com', 'Green Nepal Multicare Provision Pvt.Ltd.');
        // });
        return response()->json(['status' => 200, 'message' => 'Registered successfully']);
    }

     // dealer table view
    public function DealerTablePage(){
        $dealer = Dealer::all();
        return view('board.pages.ajaxPages.dealerTable', compact('dealer'));
        // return view('board.pages.ajaxPages.dealerTable');
    }

    // verify dealer
    public function VerifyDealer(Request $request){
        $dealer = Dealer::find($request->id);
        $dealer->verified_by = $request->verified_by;
        $dealer->save();
        return response()->json(['status' => 200, 'message' => 'Verification successfully']);
    }

    // board modal view of Dealer
    public function BoardDealerModalData(Request $request){
        $dealer = DB::table('dealers')
                ->where('id', '=', $request->id)
                ->get();
        $leader = DB::table('leaders')
                ->select('id','first_name', 'middle_name', 'last_name','email')
                ->get();
        return view('board.pages.ajaxPages.dealerViewEditModal', compact('dealer', 'leader'));
    } 


    // update dealer
    public function UpdateDealer(Request $request){
        $dealer = Dealer::find($request->Id);
        $dealer->name = $request->DealerName;
        $dealer->date_of_establishment = $request->EstdDate;
        $dealer->address = $request->Address;
        $dealer->pan_no = $request->PanNo;
        $dealer->phone_no = $request->Phone;
        $dealer->email = $request->Email;
        $dealer->owner = $request->Owner;
        $dealer->save();

        // $text = 'Dealer profile has been created';
        // $email = $request->Email;
        // $username = $request->FirstName.' '.$request->MiddleName.' '.$request->LastName;
        // Mail::send(['html'=>'mail'],['text'=>$text,'username'=>$username,'email'=>$email,'name','Green Nepal Multicare Provision Pvt.Ltd.'], function($message) use ($email, $username) {
        //     $message->to($email, 'To '.$username)->subject('Notification');
        //     $message->from('greennepalmulticare@gmail.com', 'Green Nepal Multicare Provision Pvt.Ltd.');
        // });
        return response()->json(['status' => 200, 'message' => 'Updated successfully']);
    }


    // delete Dealer
    public function DeleteDealer(Request $request){
        $dealer = Dealer::find($request->id);
        $dealer->delete();
        return response()->json(['status' => 200, 'message' => 'Deleted successfully']);
    }
    // return purchase add vendor view
    public function PurchaseAddVendorView() {
        return view('board.pages.ajaxPages.addPurchaseVendor');
    }

    public function PurchaseAddVendor(Request $request){
    
        $validator = Validator::make($request->all(), [
            'PanNo' => 'unique:vendors,pan_number',
            'VendorName' => 'unique:vendors,vendor_name'
        ]);
        $validatorVendorLength = Validator::make($request->all(), [
            'PanNo' => 'required|numeric|digits:9',
        ]);
        if ($validator->fails()) {
        return response()->json(['status' => 400, 'message' => 'Vendor already exists']);
        }
        else if($validatorVendorLength->fails()){
        return response()->json(['status' => 400, 'message' => 'Invalid PAN number']);
        }
        else{
        $vendor = new Vendor;
        $vendor->vendor_name = $request->VendorName;
        $vendor->pan_number = $request->PanNo;
        $vendor->email = $request->VendorEmail;
        $vendor->phone_number = $request->VendorPhone;
        $vendor->address = $request->VendorAddress;
        $vendor->save();
        return response()->json(['status' => 200, 'message' => 'Registration successful']);
        }
    }

    // Accounting section
    // return purchase entry form view
    function PurchaseEntryForm(){
        $vendor = Vendor::all();
        $data = DB::table('ledger_accounts')
                ->join('account_categories','account_categories.id', '=', 'ledger_accounts.category_id')
                ->select('account_categories.category_name', 'ledger_accounts.account_name','ledger_accounts.category_id')
                ->orderBy('category_id')
                ->get();
        return view('accounting.purchase.board-purchaseEntry', compact('vendor', 'data'));
    }

    

    //Add Purchase Entry Data......
    public function AddPurchaseEntryData(Request $request){
        $purchaseTransaction = new Purchase_Transaction;
        $purchaseTransaction->vendor_id = $request->VendorID; 
        $purchaseTransaction->date = $request->TrnscDate;
        $purchaseTransaction->invoice_number = $request->InvoiceNumber;
        $purchaseTransaction->discount_percent = $request->Discount;
        $purchaseTransaction->tax_percent = $request->Tax;
        $purchaseTransaction->added_by = $request->Added_By;
        $purchaseTransaction->save();


        
        for($i=0; $i<count($request->Row); $i++){
            
            $purchaseDetails = new Purchase_Details;
            $purchaseDetails->purchase_transaction_id = $purchaseTransaction->id;
            $part = $request->Row[$i];
            $purchaseDetails->particulars = $part['value'];

            $i++;
            $purchaseDetails->account_id = 1;

            $i++;
            $qty = $request->Row[$i];
            $purchaseDetails->quantity = $qty['value'];

            $i++;
            $uniit = $request->Row[$i];
            $purchaseDetails->unit = $uniit['value'];

            $i++;
            $test = $request->Row[$i];
            $purchaseDetails->rate = $test['value'];

            $purchaseDetails->save();
            
        }
        return response()->json(['status' => 200, 'message' =>count($request->Row)]);
    }

//*******get data from category tables and account tables into frontend....***
    public function GetCategoryAccountData(Request $request){
        $vendor = Vendor::all();
        $data = DB::table('ledger_accounts')
                ->join('account_categories','account_categories.id', '=', 'ledger_accounts.category_id')
                ->select('account_categories.category_name', 'ledger_accounts.account_name','ledger_accounts.category_id')
                ->orderBy('category_id')
                ->get();
        return response()->json(['status' => 200, 'message' =>$data]);
        // return view('accounting.purchase.purchaseEntry', compact('cat_data'));
    }


    //get sales entry page 
    public function SalesEntryForm(){
        $dealer = Dealer::all();
        return view('accounting.sales.board-salesEntry', compact('dealer'));
    }


    //get payment entry page
    public function PaymentEntryForm(){
        return view('accounting.payment.board-paymentEntry');

    }

    //get receipt entry page
    public function ReceiptEntryForm(){
        return view('accounting.receipt.board-receiptEntry');

    }
   
     // Accounting section
    // return expenses entry form view
    public function ExpensesEntryForm(){
        $vendor = Vendor::all();
        $data = DB::table('ledger_accounts')
                ->join('account_categories','account_categories.id', '=', 'ledger_accounts.category_id')
                ->select('account_categories.category_name', 'ledger_accounts.account_name','ledger_accounts.category_id')
                ->orderBy('category_id')
                ->get();
        return view('accounting.expenses.board-expensesEntry', compact('vendor', 'data'));
    }

    //return income entry form view
    public function IncomeEntryForm(){
        return view('accounting.income.board-incomeEntry');
    }
    //get payroll view page
    public function PayrollView(){
        return view('accounting.payroll.board-payrollView');

    }
    //get bankingtransactions entry form.....page

    public function BankTransactionsForm(){
        return view('accounting.banking.board-bankingEntry');
    }

    //get bills receivable page view
    public function BillsReceivableView(){
        $receipts = DB::table('receipt_transactions AS tr')
        ->leftjoin('dealers AS d', 'tr.dealer_id', '=', 'd.id')
        ->select('tr.date', 'tr.receipt_mode', 'd.name', DB::raw('SUM(discount) AS discount'), DB::raw('SUM(tr.amount) AS amount'))
        ->groupBy('tr.date', 'd.name')
        ->orderBy('tr.date')
        ->get();
        
        $data = DB::table('sales_transactions AS tr')
        ->leftjoin('dealers AS d', 'tr.customer_id', '=', 'd.id')
        ->leftjoin('sales_details AS sd', 'tr.id', '=', 'sd.sales_transaction_id')
        ->leftjoin('ledger_accounts AS la', 'sd.account_id', '=', 'la.id')
        ->leftjoin('sales_receipts AS sr', function($join)
            {
                $join->on('sr.sales_transaction_id', '=', 'sd.sales_transaction_id');
                $join->on('sr.account_id','=', 'sd.account_id');
            })
        ->select('tr.id', 'tr.invoice_number', 'tr.date', 'd.name', 'la.account_name', DB::raw('SUM((sd.quantity*sd.rate-0.01*tr.discount_percent*sd.quantity*sd.rate)+0.01*tr.tax_percent*(sd.quantity*sd.rate-0.01*tr.discount_percent*sd.quantity*sd.rate)) AS total_amount'), 'sr.amount AS received_amount', 'sr.receipt_mode AS receiptMode')
        ->groupBy('sd.account_id','sd.sales_transaction_id', 'sr.id')
        ->orderBy('tr.date')
        ->paginate();

        $journal = $data;
        $result = array();
        foreach ($journal as $key => $value)
            {
                $result[$key] = $value;
            }
        $journal = $result;

        $temp = array();
        foreach ($receipts as $key => $value)
            {
                $temp[$key] = $value;
            }
        $receipts = $temp;
        // ******process receipts data for journal entry starts********
        $receipts_journal = array();
        for($i = 0; $i < count($receipts); $i++){
            $receipts_journal_data = (object)['date' => $receipts[$i]->date,
                            'particulars' => $receipts[$i]->receipt_mode,
                            'amount' => $receipts[$i]->amount,
                            'side' => "debit",
                            'index' => $i,
                            'categoryName' => "Current Assests"
                            ];
            array_push($receipts_journal, $receipts_journal_data);
            if($receipts[$i]->discount != null){
                $receipts_journal_data = (object)['date' => $receipts[$i]->date,
                            'particulars' => "discount given",
                            'amount' => $receipts[$i]->discount,
                            'side' => "debit",
                            'index' => $i,
                            'categoryName' => "Indirect Expenses"
                            ];
            array_push($receipts_journal, $receipts_journal_data);
            }
            $receipts_journal_data = (object)['date' => $receipts[$i]->date,
                            'particulars' => $receipts[$i]->name,
                            'amount' => $receipts[$i]->amount + $receipts[$i]->discount,
                            'side' => "credit",
                            'index' => $i,
                            'categoryName' => "Personal"
                            ];
            array_push($receipts_journal, $receipts_journal_data);
        }
        // ******process receipts data for journal entry ends********

        for($i = 0; $i < count($receipts); $i++){
            $receipts[$i]->invoice_number = null;
            $receipts[$i]->balance = null;
            $receipts[$i]->particulars = "receipt";
            $receipts[$i]->amount += $receipts[$i]->discount;
        }
            
        for($i = 0; $i < count($journal); $i++){
            $journal[$i]->balance = null;
            $journal[$i]->particulars = "bill added";

            for($j = $i+1; $j < count($journal); $j++){
                if($journal[$i]->invoice_number == $journal[$j]->invoice_number and $journal[$i]->account_name == $journal[$j]->account_name and $journal[$i]->total_amount == $journal[$j]->total_amount){
                    $journal[$i]->received_amount += $journal[$j]->received_amount;
                    \array_splice($journal, $j, 1);
                    $j--;
                }
            }
            $journal[$i]->amount = $journal[$i]->total_amount - $journal[$i]->received_amount;
            
            //delete unwanted columns......
            unset($journal[$i]->receiptMode);
            unset($journal[$i]->received_amount);
            unset($journal[$i]->account_name);
            unset($journal[$i]->total_amount);
        }
        $bills_receivable = array_merge($journal, $receipts);
        $my_array = array();
        for($i = 0; $i < count($bills_receivable); $i++){
            array_push($my_array,$bills_receivable[$i]);
            $temp_name = $bills_receivable[$i]->name;
            for($j = $i+1; $j < count($bills_receivable); $j++){
                if($bills_receivable[$j]->name == $temp_name){
                    array_push($my_array,$bills_receivable[$j]);
                    \array_splice($bills_receivable, $j, 1);
                    $j--;
                }            
            }
        }
        for($k = 0; $k < count($my_array); $k++){
            $arr[$k] = array();
            $temp_name = $my_array[$k]->name;
            for($i = 0; $i < count($my_array); $i++){
                if($my_array[$i]->name == $temp_name){
                array_push($arr[$k],$my_array[$i]);
                \array_splice($my_array, $i, 1);
                $i--;
                }
            }
        }
        for($i = 0; $i < count($arr); $i++){
            $balance = 0;
            for($j = 0; $j < count($arr[$i]); $j++){
                if($arr[$i][$j]->invoice_number != null){
                    $balance += $arr[$i][$j]->amount;
                }
                else{
                    $balance = $balance - $arr[$i][$j]->amount;
                }
                $arr[$i][$j]->balance = $balance;
            }
        }
        return view('accounting.billsReceivable.board-billsReceivableView', compact('arr'));
    }
//get bills Payable page view
    public function BillsPayableView(){
        $payment = DB::table('payment_transactions AS tr')
        ->leftjoin('vendors AS v', 'tr.vendor_id', '=', 'v.id')
        ->select('tr.date', 'tr.payment_mode', 'v.vendor_name',DB::raw('SUM(discount) AS discount'), DB::raw('SUM(tr.amount) AS amount'))
        ->groupBy('tr.date', 'v.vendor_name')
        ->orderBy('tr.date')
        ->get();

        $data = DB::table('purchase__transactions AS tr')
        ->leftjoin('vendors AS v', 'tr.vendor_id', '=', 'v.id')
        ->leftjoin('purchase__details AS pd', 'tr.id', '=', 'pd.purchase_transaction_id')
        ->leftjoin('ledger_accounts AS la', 'pd.account_id', '=', 'la.id')
        ->leftjoin('purchase_payments AS pp', function($join)
            {
                $join->on('pp.purchase_transaction_id', '=', 'pd.purchase_transaction_id');
                $join->on('pp.account_id','=', 'pd.account_id');
            })
        ->select('tr.id', 'tr.invoice_number', 'tr.date', 'v.vendor_name', 'la.account_name', DB::raw('SUM((pd.quantity*pd.rate-0.01*tr.discount_percent*pd.quantity*pd.rate)+0.01*tr.tax_percent*(pd.quantity*pd.rate-0.01*tr.discount_percent*pd.quantity*pd.rate)) AS total_amount'), 'pp.amount AS paid_amount', 'pp.payment_mode AS paymentMode')
        ->groupBy('pd.account_id','pd.purchase_transaction_id', 'pp.id')
        ->orderBy('tr.date')
        ->paginate();

        $journal = $data;
        $result = array();
        foreach ($journal as $key => $value)
            {
                $result[$key] = $value;
            }
        $journal = $result;

        $temp = array();
        foreach ($payment as $key => $value)
            {
                $temp[$key] = $value;
            }
        $payment = $temp;

        // ******process payment data for journal entry starts********
        $payment_journal = array();
        for($i = 0; $i < count($payment); $i++){
            $payment_journal_data = (object)['date' => $payment[$i]->date,
                            'particulars' => $payment[$i]->vendor_name,
                            'amount' => $payment[$i]->amount + $payment[$i]->discount,
                            'side' => "debit",
                            'index' => $i,
                            'categoryName' => "Personal"
                            ];
            array_push($payment_journal, $payment_journal_data);
            if($payment[$i]->discount != null){
                $payment_journal_data = (object)['date' => $payment[$i]->date,
                            'particulars' => "discount received",
                            'amount' => $payment[$i]->discount,
                            'side' => "credit",
                            'index' => $i,
                            'categoryName' => "Incomes"
                            ];
                array_push($payment_journal, $payment_journal_data);
            }
            $payment_journal_data = (object)['date' => $payment[$i]->date,
                            'particulars' => $payment[$i]->payment_mode,
                            'amount' => $payment[$i]->amount,
                            'side' => "credit",
                            'index' => $i,
                            'categoryName' => "Current Assets"
                            ];
            array_push($payment_journal, $payment_journal_data);
        }
        // ******process payment data for journal entry ends********

        for($i = 0; $i < count($payment); $i++){
            $payment[$i]->invoice_number = null;
            $payment[$i]->balance = null;
            $payment[$i]->particulars = "payment made";
            $payment[$i]->amount += $payment[$i]->discount;
            for($j = $i+1; $j < count($payment); $j++){
                if($payment[$i]->date == $payment[$j]->date and $payment[$i]->vendor_name == $payment[$j]->vendor_name){
                    $payment[$i]->amount += $payment[$j]->amount; 
                    \array_splice($payment, $j, 1);
                    $j--;
                }
            }
        }
        for($i = 0; $i < count($journal); $i++){
            $journal[$i]->balance = null;
            $journal[$i]->particulars = "bill added";
            for($j = $i+1; $j < count($journal); $j++){
                if($journal[$i]->invoice_number == $journal[$j]->invoice_number and $journal[$i]->account_name == $journal[$j]->account_name and $journal[$i]->total_amount == $journal[$j]->total_amount){
                    $journal[$i]->paid_amount += $journal[$j]->paid_amount;
                    \array_splice($journal, $j, 1);
                    $j--;
                }
            }
            $journal[$i]->amount = $journal[$i]->total_amount - $journal[$i]->paid_amount;
            //delete unwanted columns......
            unset($journal[$i]->paymentMode);
            unset($journal[$i]->paid_amount);
            unset($journal[$i]->account_name);
            unset($journal[$i]->total_amount);
        }
        $bills_payable = array_merge($journal, $payment);
        $my_array = array();
        for($i = 0; $i < count($bills_payable); $i++){
            array_push($my_array,$bills_payable[$i]);
            $temp_name = $bills_payable[$i]->vendor_name;
            for($j = $i+1; $j < count($bills_payable); $j++){
                if($bills_payable[$j]->vendor_name == $temp_name){
                    array_push($my_array,$bills_payable[$j]);
                    \array_splice($bills_payable, $j, 1);
                    $j--;
                }            
            }
        }
        for($k = 0; $k < count($my_array); $k++){
            $arr[$k] = array();
            $temp_name = $my_array[$k]->vendor_name;
            for($i = 0; $i < count($my_array); $i++){
                if($my_array[$i]->vendor_name == $temp_name){
                array_push($arr[$k],$my_array[$i]);
                \array_splice($my_array, $i, 1);
                $i--;
                }
            }
        }
        for($i = 0; $i < count($arr); $i++){
            $balance = 0;
            for($j = 0; $j < count($arr[$i]); $j++){
                if($arr[$i][$j]->invoice_number != null){
                    $balance += $arr[$i][$j]->amount;
                }
                else{
                    $balance = $balance - $arr[$i][$j]->amount;
                }
                $arr[$i][$j]->balance = $balance;
            }
        }
        // return response()->json(['status' => 200, 'message' => $arr]);
        return view('accounting.billsPayable.board-billsPayableView', compact('arr'));
    }


//get journal entries view page
    public function JournalEntryView(){
        return view('accounting.journal.board-journalView');
    }

//get purchase journal view
    public function PurchaseJournalView(Request $request){
        list($journal_data, $data) = CreatePurchaseJournalData();
        return view('accounting.journal.board-purchaseJournalView', compact('journal_data','data'));
    }

//get sales journal view
    public function SalesJournalView(Request $request){
        list($journal_data, $data) = CreateSalesJournalData();
        return view('accounting.journal.board-salesJournalView', compact('journal_data', 'data'));
    }

//get expenses journal view
    public function ExpensesJournalView(Request $request){
        list($journal_data, $data) = CreateExpensesJournalData();
        return view('accounting.journal.board-expensesJournalView', compact('journal_data', 'data')) ;
    }

//get Income journal view....
    public function IncomeJournalView(Request $request){
        list($journal_data, $data) = CreateIncomeJournalData();
        return view('accounting.journal.board-incomeJournalView', compact('journal_data', 'data')) ;
    }

//get purchase return journal view....
    public function PurchaseReturnJournalView(Request $request){
        list($journal_data, $data) = CreatePurchaseReturnJournalData();
        // return view('accounting.journal.board-incomeJournalView', compact('journal_data', 'data')) ;
    }

//get sales return journal view....
    public function SalesReturnJournalView(Request $request){
        list($journal_data, $data) = CreateSalesReturnJournalData();
        // return view('accounting.journal.board-incomeJournalView', compact('journal_data', 'data')) ;
    }

//get ledger accounts view....
    public function LedgerAccountView(Request $request){
        $ledgerData = CreateLedgerAccountsData();
        $final_ledger = $ledgerData[0];
        $ledger_balance = $ledgerData[1];
        $ledger_accounts = $ledgerData[2];
        dd($ledger_balance);
        return response()->json(['status' => 200, 'message' =>($final_ledger)]);
        // return view('accounting.ledgerAccounts.board-ledgerAccountView');
    }


    // get trial balance view page
    public function TrialBalanceView(){
        $ledgerData = CreateLedgerAccountsData();
        $ledger_balance = $ledgerData[1];
        $ledger_accounts = $ledgerData[2];
        $month = $ledgerData[3];
        $debitTotal = 0;
        $creditTotal = 0;
        for($i = 0; $i < count($ledger_accounts); $i++){
            if($ledger_balance[$ledger_accounts[$i]][$month[1]]->side == "debit"){
                $debitTotal += $ledger_balance[$ledger_accounts[$i]][$month[1]]->amount;
            }
            elseif($ledger_balance[$ledger_accounts[$i]][$month[1]]->side == "credit"){
                $creditTotal += $ledger_balance[$ledger_accounts[$i]][$month[1]]->amount;
            }
        }
        return view('accounting.trialBalance.board-trialBalanceView', compact('ledger_balance', 'ledger_accounts', 'month', 'debitTotal', 'creditTotal')) ;
    }


    //get IncomeStatement view page
    public function IncomeStatementView(){
        list($total_sales, $cost_of_sales, $direct_expenses, $indirect_expenses, $incomes)  = CreateIncomeStatementData();    
        $direct_expenses_total = 0;
        for($i = 0; $i < count($direct_expenses); $i++){
            $direct_expenses_total = $direct_expenses_total + $direct_expenses[$i]->amount;
        }
        
        $indirect_expenses_total = 0;
        for($i = 0; $i < count($indirect_expenses); $i++){
            $indirect_expenses_total = $indirect_expenses_total + $indirect_expenses[$i]->amount;
        }

        $incomes_total = 0;
        for($i = 0; $i < count($incomes); $i++){
            $incomes_total = $incomes_total + $incomes[$i]->amount;
        }

        $gross_profit = $total_sales - $cost_of_sales - $direct_expenses_total;
        $net = $gross_profit - $indirect_expenses_total + $incomes_total;

        return view('accounting.incomeStatement.board-incomeStatementView', compact('total_sales', 'cost_of_sales', 'direct_expenses', 'indirect_expenses', 'incomes', 'direct_expenses_total', 'indirect_expenses_total', 'incomes_total', 'gross_profit', 'net')) ;

    } 

    //get Balance Sheet View page
    public function BalanceSheetView(){

        return view('accounting.balanceSheet.board-balanceSheetView');
    }
}
