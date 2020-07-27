<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Board;
use App\Employee;
use App\User;
use App\Product;
use App\Supplier;
use App\Purchase;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard-admin');
    }



    // Add New Product
    protected function AddNewProduct(Request $request){

        $validation = Validator::make($request->all(), [
            // 'ProductImage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ProductName' => 'required',
            'BatchCode' => 'required',
            'ProductPrice' => 'required|numeric',
            'ProductImage' => 'required|max:3091152',
        ]);
        if($validation->passes())
        {
            $product = new Product;
            $product->ProductName = $request->ProductName;
            $product->BatchCode = $request->BatchCode;
            $product->Price = $request->ProductPrice;
            $image = $request->file('ProductImage');
            $new_name = rand().uniqid(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path().'/images/ProductImages', $new_name);
            $product->Image = $new_name;
            $product->save();
            return array('s'=>'Product Added Successfully');
        }
        else
        {
            return array('s'=>'Failed to Submit');
        }

    }


    // Add new product ajax form
    protected function AddNewProductAjaxForm(){
        return view('admin.AdminAjaxPages.AddNewProduct');
    }
    // Open Dealer Product Purchase Form ajax form
    protected function DealerProductPurchaseForm(){
        $ProductCount = DB::table('products')->count(); 
        $ProductDetails = Product::all();
        return view('admin.AdminAjaxPages.DealerProductPurchaseForm', compact('ProductCount', 'ProductDetails'));
    }
        // open TAX purchase form from ajax
    protected function TaxPurchase(){
        $supplier = DB::table('suppliers')
                    ->select('id', 'SupplierName', 'PanNo')
                    ->orderBy('SupplierName', 'asc')
                    ->get();
        return view('admin.AdminAjaxPages.TaxPurchase', compact('supplier'));
    }

    // open add new supplier form from ajax
    protected function AddNewSupplier(){
        return view('admin.AdminAjaxPages.AddNewSupplier');   
    }

        // Add Supplier
    protected function AddSupplier(Request $request){
        $validation = Validator::make($request->all(), [
            'SupplierName' => 'required',
            'PanNo' => 'required'
        ]);
        if($validation->passes())
        {
            // return array('s'=>'worked');
            $supplier = new Supplier;
            $supplier->SupplierName = $request->SupplierName;
            $supplier->PanNo = $request->PanNo;
            $supplier->Email = $request->SupplierEmail;
            $supplier->PhoneNo = $request->SupplierPhoneNumber;
            $supplier->Address = $request->SupplierAddress;
            $supplier->save();
            return array('s'=>'Supplier Added Successfully');
        }
        else
        {
            return array('s'=>'Failed to Submit');
        }
    }


    // Submit Tax Purchase
    protected function AddTaxPurchase(Request $request){
        $validation = Validator::make($request->all(), [
            'SelectSupplier' => 'required',
            'TaxPurchaseDate' => 'required',
            'TaxPurchaseInvioce' => 'required',
            'TaxPurchaseTotalPurchaseAmount' => 'required',
            'TaxPurchaseTaxablePurchase' => 'required',
            'PaymentType' => 'required'
        ]);
        if($validation->passes())
        {
            $purchase = new Purchase;
            $purchase->SupplierId = $request->SelectSupplier;
            $purchase->date = $request->TaxPurchaseDate;
            $purchase->InvoiceNumber = $request->TaxPurchaseInvioce;
            $purchase->TotalPurchaseAmount = $request->TaxPurchaseTotalPurchaseAmount;
            $purchase->ExemptedPurchase = $request->TaxPurchaseExemptedPurchase;
            $purchase->TaxablePurchase = $request->TaxPurchaseTaxablePurchase;
            $TaxablePurchaseWithTax = ($request->TaxPurchaseTaxablePurchase * 0.13) + $request->TaxPurchaseTaxablePurchase;
            $purchase->TaxablePurchaseWithTax = $TaxablePurchaseWithTax;
            $purchase->ImportAmount = $request->TaxPurchaseImportAmount;
            $purchase->VatOnImport = $request->TaxPurchaseVatOnImport;
            $purchase->CapitalPurchase = $request->TaxPurchaseCapitalPurchase;
            $purchase->CapitalVAT = $request->TaxPurchaseCapitalVat;
            $purchase->PaymentType = $request->PaymentType;
            $purchase->save();
            return array('s'=>'Purchase Added Successfully');
            return($request);
        }
        else
        {
            return array('s'=>'Failed to Submit');
        }
    }

    // Add TaxPurchase Description
    protected function AddTaxPurchaseDescription(){
        return view('admin.AdminAjaxPages.TaxPurchaseDescription');
    }

    // open Add new dealer form
    protected function AddNewLeaderForm(){
        return view('admin.AdminAjaxPages.AddNewLeader');
    }

    // open Add new Dealer form
    protected function AddNewDealerForm(){
        return view('admin.AdminAjaxPages.AddNewDealer');
    }

}
