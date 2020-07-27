<?php
namespace App\Http\Controllers;
use App\Employee;
use App\Leader;
use App\Dealer;
use App\Supplier;
use App\Assets_Goods_Services;
use App\Purchase_Transaction;
use App\Purchase_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;
use File;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('employee.dashboard-employee');
    }


    // retun Leader page view
    public function OpenLeaderPage()
    {
        return view('employee.pages.leaders');
    }

     // leader table view
    public function LeaderTablePage(){
        $leader = Leader::all();
        return view('employee.pages.ajaxPages.leaderTable', compact('leader'));
    }
     // leader table serarch view
    public function LeaderTablePageSearch(Request $request){
        $text = $request->text;
        $leader = DB::table('leaders')
                ->where('first_name', 'like', '%'.$text.'%')
                ->get();
        return view('employee.pages.ajaxPages.leaderTable', compact('leader'));
    }

     // register leader view
    public function RegisterLeaderPage(){
        $generation = DB::table('leaders')
                ->select('id','first_name','middle_name','last_name','email')
                ->get();
        return view('employee.pages.ajaxPages.registerLeader', compact('generation'));
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


    // employee modal view of leader
    public function EmployeeModalData(Request $request){
        $leader = DB::table('leaders')
                ->where('id', '=', $request->id)
                ->get();
        $generation = DB::table('leaders')
                ->select('id','first_name','middle_name','last_name','email')
                ->get();
        return view('employee.pages.ajaxPages.leaderViewEditModal', compact('leader', 'generation'));
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
        return view('employee.pages.dealers');
    }

     // register dealer ajax view
    public function RegisterDealerPage(){
        $owner = DB::table('leaders')
                ->select('id','first_name','middle_name','last_name','email')
                ->get();
        return view('employee.pages.ajaxPages.registerDealer', compact('owner'));
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
        return view('employee.pages.ajaxPages.dealerTable', compact('dealer'));
        // return view('employee.pages.ajaxPages.dealerTable');
    }

    // verify dealer
    public function VerifyDealer(Request $request){
        $dealer = Dealer::find($request->id);
        $dealer->verified_by = $request->verified_by;
        $dealer->save();
        return response()->json(['status' => 200, 'message' => 'Verification successfully']);
    }

    // employee modal view of Dealer
    public function EmployeeDealerModalData(Request $request){
        $dealer = DB::table('dealers')
                ->where('id', '=', $request->id)
                ->get();
        $leader = DB::table('leaders')
                ->select('id','first_name', 'middle_name', 'last_name','email')
                ->get();
        return view('employee.pages.ajaxPages.dealerViewEditModal', compact('dealer', 'leader'));
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

    // // return vat page
    // public function VatPage(){
    //     $supplier = Supplier::all();
    //     return view('employee.pages.vat', compact('supplier'));
    // }

    // return vat add supplier view
    public function VatAddSupplierView() {
        return view('employee.pages.ajaxPages.addVatSupplier');
    }

    public function VatAddSupplier(Request $request){
    
        $validator = Validator::make($request->all(), [
            'PanNo' => 'unique:suppliers,PanNo',
            'SupplierName' => 'unique:suppliers,SupplierName'
        ]);
        $validatorSupplierLength = Validator::make($request->all(), [
            'PanNo' => 'required|numeric|digits:9',
        ]);
        if ($validator->fails()) {
        return response()->json(['status' => 400, 'message' => 'Supplier already exists']);
        }
        else if($validatorSupplierLength->fails()){
        return response()->json(['status' => 400, 'message' => 'Invalid PAN number']);
        }
        else{
        $supplier = new Supplier;
        $supplier->SupplierName = $request->SupplierName;
        $supplier->PanNo = $request->PanNo;
        $supplier->Email = $request->SupplierEmail;
        $supplier->PhoneNo = $request->SupplierPhone;
        $supplier->Address = $request->SupplierAddress;
        $supplier->save();
        return response()->json(['status' => 200, 'message' => 'Registration successful']);
        }
    }

    // Accounting section
    // return purchase entry form view
    function PurchaseEntryForm(){
        $supplier = Supplier::all();
        $data = DB::table('ledger_accounts')
                ->join('account_categories','account_categories.id', '=', 'ledger_accounts.category_id')
                ->select('account_categories.category_name', 'ledger_accounts.account_name','ledger_accounts.id')
                ->get();
        return view('accounting.purchase.employee-purchaseEntry', compact('supplier','data'));
    }

    //get sales entry page 
    public function SalesEntryForm(){
        $dealer = Dealer::all();
        return view('accounting.sales.employee-salesEntry', compact('dealer'));
    }


    //get payment entry page
    public function PaymentEntryForm(){
        return view('accounting.payment.employee-paymentEntry');

    }

    //get receipt entry page
    public function ReceiptEntryForm(){
        return view('accounting.receipt.employee-receiptEntry');

    }

     // Accounting section
    // return expenses entry form view
    public function ExpensesEntryForm(){
        $supplier = Supplier::all();
        $data = DB::table('ledger_accounts')
                ->join('account_categories','account_categories.id', '=', 'ledger_accounts.category_id')
                ->select('account_categories.category_name', 'ledger_accounts.account_name','ledger_accounts.id')
                ->get();
        return view('accounting.expenses.employee-expensesEntry', compact('supplier', 'data'));
    }
    //return income entry form view
    public function IncomeEntryForm(){
        return view('accounting.income.employee-incomeEntry');
    }
    //get payroll view page
    public function PayrollView(){
        return view('accounting.payroll.employee-payrollView');

    }
    //get bankingtransactions entry form.....page

    public function BankTransactionsForm(){
        return view('accounting.banking.employee-bankingEntry');
    }

    //get bills receivable page view
    public function BillsReceivableView(){
        return view('accounting.billsReceivable.employee-billsReceivableView');
    }
    //get bills Payable page view
    public function BillsPayableView(){
        return view('accounting.billsPayable.employee-billsPayableView');
    }
    //get journal entries view page
    public function JournalEntryView(){
        return view('accounting.journal.employee-journalView');
    }
    //get ledger accounts view page
    public function LedgerAccountView(){
        return view('accounting.ledgerAccounts.employee-ledgerAccountView');
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
}