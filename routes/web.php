	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'GuestController@index')->name('page.index');
Route::get('/products', 'GuestController@ProductView')->name('page.products');
Route::get('/contact', 'GuestController@ContactView')->name('page.contact');
Route::get('/about', 'GuestController@AboutView')->name('page.about');





Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
	
	//Admin Password reset routes
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

		// ajax add new product form
	Route::post('/form/AddNewProduct', 'AdminController@AddNewProductAjaxForm');
		// add new product
	Route::post('/add/new/product', 'AdminController@AddNewProduct');
		// Dealer Product Purchase Form
	Route::post('/form/DealerProductPurchaseForm', 'AdminController@DealerProductPurchaseForm');
		// Tax Purchase form
	Route::post('/form/tax/purchase', 'AdminController@TaxPurchase');
		// add new supplier form
	Route::post('/form/add/new/supplier', 'AdminController@AddNewSupplier');
		// add supplier
	Route::post('/form/add/detail/Supplier', 'AdminController@AddSupplier');
	// submit tex purchase
	Route::post('/form/add/purchase', 'AdminController@AddTaxPurchase');
	// /tax form add purchase decription
	Route::post('/form/add/purchase/decription', 'AdminController@AddTaxPurchaseDescription');
	// add new leader
	Route::post('/form/AddNewLeader', 'AdminController@AddNewLeaderForm');
	// add new dealer
	Route::post('/form/AddNewDealer', 'AdminController@AddNewDealerForm');
});


Route::prefix('board')->group(function() {
	Route::get('/login', 'Auth\BoardLoginController@showLoginForm')->name('board.login');
	Route::post('/login', 'Auth\BoardLoginController@login')->name('board.login.submit');
	Route::get('/', 'BoardController@index')->name('board.dashboard');
	Route::get('/logout', 'Auth\BoardLoginController@boardLogout')->name('board.logout');
	//Board Password reset routes
	Route::post('/password/email', 'Auth\BoardForgotPasswordController@sendResetLinkEmail')->name('board.password.email');
	Route::get('/password/reset', 'Auth\BoardForgotPasswordController@showLinkRequestForm')->name('board.password.request');
	Route::post('/password/reset', 'Auth\BoardResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\BoardResetPasswordController@showResetForm')->name('board.password.reset');
	// open Leader page view
	Route::get('/leader', 'BoardController@OpenLeaderPage')->name('board.leader');
	// open ajax leader table page
	Route::get('/page/leader/table', 'BoardController@LeaderTablePage');
	// open ajax leader table page search
	Route::get('/page/leader/table/search', 'BoardController@LeaderTablePageSearch');
	// open ajax leader register page
	Route::get('/page/register/leader', 'BoardController@RegisterLeaderPage');
	// Rregister new Leader
	Route::post('/leader/register', 'BoardController@RegisterLeader');
	// verify leader
	Route::post('/leader/verify', 'BoardController@VerifyLeader');
	// board leader modal view return
	Route::get('/leaderTable/modal', 'BoardController@BoardModalData');
	// update Leader
	Route::post('/leader/update', 'BoardController@UpdateLeader');
	// delete leader
	Route::post('/leader/delete', 'BoardController@DeleteLeader');

	// open dealer page view
	Route::get('/dealer', 'BoardController@OpenDealerPage')->name('board.dealer');
	// open dealer register page
	Route::get('/page/register/dealer', 'BoardController@RegisterDealerPage');
	// Rregister new dealer
	Route::post('/dealer/register', 'BoardController@RegisterDealer');
	// open ajax leader table page
	Route::get('/page/dealer/table', 'BoardController@DealerTablePage');
	// verify leader
	Route::post('/dealer/verify', 'BoardController@VerifyDealer');
	// board dealer modal view return
	Route::get('/dealerTable/modal', 'BoardController@BoardDealerModalData');
	// update Dealer
	Route::post('/dealer/update', 'BoardController@UpdateDealer');
	// delete dealer
	Route::post('/dealer/delete', 'BoardController@DeleteDealer');

	
	// Account section
	// get account purchase add entry form view
	Route::get('/accounting/purchase', 'BoardController@PurchaseEntryForm')->name('board.accounting.purchasePage');

	// // get board add vendor ajax view
	Route::get('/accounting/purchase/vendor', 'BoardController@PurchaseAddVendorView');
	// // add board vat vendor 
	Route::post('/accounting/add/purchase/vendor', 'BoardController@PurchaseAddVendor');
	
	//Add Purchase Entry Form Data Details....
	Route::post('/accounting/add/PurchaseEntry', 'BoardController@AddPurchaseEntryData');

	//Get category and ledger account data 
	Route::get('/accounting/get/CategoryData', 'boardController@GetCategoryAccountData');

	//get board sales entry view...
	Route::get('/accounting/sales', 'BoardController@SalesEntryForm')->name('board.accounting.salesPage');
	//get board payment entry view...
	Route::get('/accounting/payment', 'BoardController@PaymentEntryForm')->name('board.accounting.paymentPage');
	//get board receipt entry view...
	Route::get('/accounting/receipt', 'BoardController@ReceiptEntryForm')->name('board.accounting.receiptPage');
	// get board exenses entry view
	Route::get('/accounting/expenses', 'BoardController@ExpensesEntryForm')->name('board.accounting.expensesPage');
	//get board income entry form....
	Route::get('/accounting/income', 'BoardController@IncomeEntryForm')->name('board.accounting.incomePage');

	// get board payroll view
	Route::get('/accounting/payroll', 'BoardController@PayrollView')->name('board.accounting.payrollPage');
	// get banking transaction pages..
	Route::get('/accounting/bankTransactions', 'BoardController@BankTransactionsForm')->name('board.accounting.bankTransactionsPage');

	//get bills receivable view page
	Route::get('/accounting/billsReceivable', 'BoardController@BillsReceivableView')->name('board.accounting.billsReceivablePage');
	//get bills payable view page
	Route::get('/accounting/billsPayable', 'BoardController@BillsPayableView')->name('board.accounting.billsPayablePage');
	//get journal entries view page
	Route::get('/accounting/journal', 'BoardController@JournalEntryView')->name('board.accounting.journalPage');
	// get board purchase Journal  ajax view
	Route::get('/accounting/purchase/journal', 'BoardController@PurchaseJournalView');
	// get board sales Journal  ajax view
	Route::get('/accounting/sales/journal', 'BoardController@SalesJournalView');
	// get board expenses Journal  ajax view
	Route::get('/accounting/expenses/journal', 'BoardController@ExpensesJournalView');
	// get board income journal view
	Route::get('/accounting/income/journal', 'BoardController@IncomeJournalView');

	// get board purchase Return journal view
	Route::get('/accounting/purchaseReturn/journal', 'BoardController@PurchaseReturnJournalView');

	// get board sales Return journal view
	Route::get('/accounting/salesReturn/journal', 'BoardController@SalesReturnJournalView');

	//get ledger account view page
	Route::get('/accounting/ledger', 'BoardController@LedgerAccountView')->name('board.accounting.ledgerPage');
	//get trial balance view page
	Route::get('/accounting/trialBalance', 'BoardController@TrialBalanceView')->name('board.accounting.trialBalancePage');

	//get income statement view page
	Route::get('/accounting/incomeStatement', 'BoardController@IncomeStatementView')->name('board.accounting.incomeStatementPage');

	//get Balance Sheet view page
	Route::get('/accounting/balanceSheet', 'BoardController@BalanceSheetView')->name('board.accounting.balanceSheetPage');





});


Route::prefix('employee')->group(function() {
	Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
	Route::post('/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');
	Route::get('/', 'EmployeeController@index')->name('employee.dashboard');
	Route::get('/logout', 'Auth\EmployeeLoginController@employeeLogout')->name('employee.logout');
	
	//Employee Password reset routes
	Route::post('/password/email', 'Auth\EmployeeForgotPasswordController@sendResetLinkEmail')->name('employee.password.email');
	Route::get('/password/reset', 'Auth\EmployeeForgotPasswordController@showLinkRequestForm')->name('employee.password.request');
	Route::post('/password/reset', 'Auth\EmployeeResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\EmployeeResetPasswordController@showResetForm')->name('employee.password.reset');

	// open Leader page view
	Route::get('/leader', 'EmployeeController@OpenLeaderPage')->name('employee.leader');
	// open ajax leader table page
	Route::get('/page/leader/table', 'EmployeeController@LeaderTablePage');
	// open ajax leader table page search
	Route::get('/page/leader/table/search', 'EmployeeController@LeaderTablePageSearch');
	// open ajax leader register page
	Route::get('/page/register/leader', 'EmployeeController@RegisterLeaderPage');
	// Rregister new Leader
	Route::post('/leader/register', 'EmployeeController@RegisterLeader');
	// verify leader
	Route::post('/leader/verify', 'EmployeeController@VerifyLeader');
	// board leader modal view return
	Route::get('/leaderTable/modal', 'EmployeeController@EmployeeModalData');
	// update Leader
	Route::post('/leader/update', 'EmployeeController@UpdateLeader');
	// delete leader
	Route::post('/leader/delete', 'EmployeeController@DeleteLeader');

	// open dealer page view
	Route::get('/dealer', 'EmployeeController@OpenDealerPage')->name('employee.dealer');
	// open dealer register page
	Route::get('/page/register/dealer', 'EmployeeController@RegisterDealerPage');
	// Rregister new dealer
	Route::post('/dealer/register', 'EmployeeController@RegisterDealer');
	// open ajax leader table page
	Route::get('/page/dealer/table', 'EmployeeController@DealerTablePage');
	// verify leader
	Route::post('/dealer/verify', 'EmployeeController@VerifyDealer');
	// employee dealer modal view return
	Route::get('/dealerTable/modal', 'EmployeeController@EmployeeDealerModalData');
	// update Dealer
	Route::post('/dealer/update', 'EmployeeController@UpdateDealer');
	// delete dealer
	Route::post('/dealer/delete', 'EmployeeController@DeleteDealer');
	
	// // // get employee vat page
	// Route::get('/vatIm', 'EmployeeController@VatPage')->name('employee.vat');
	// get employee vat add supplier ajax view
	Route::get('/vat/supplier', 'EmployeeController@VatAddSupplierView');
	// add employee vat supplier 
	Route::post('/add/vat/supplier', 'EmployeeController@VatAddSupplier');
	
	// Account section
	// get account purchase add entry form view
	Route::get('/accounting/purchase', 'EmployeeController@PurchaseEntryForm')->name('employee.accounting.purchasePage');
	//Add Purchase Entry Form Data Details....
	Route::post('/accounting/add/PurchaseEntry', 'EmployeeController@AddPurchaseEntryData');
	// Account section
	// get account sales add entry form view
	Route::get('/accounting/sales', 'EmployeeController@SalesEntryForm')->name('employee.accounting.salesPage');

	//get employee payment entry view...
	Route::get('/accounting/payment', 'EmployeeController@PaymentEntryForm')->name('employee.accounting.paymentPage');
	//get employee receipt entry view...
	Route::get('/accounting/receipt', 'EmployeeController@ReceiptEntryForm')->name('employee.accounting.receiptPage');
	// get employee exenses entry view
	Route::get('/accounting/expenses', 'EmployeeController@ExpensesEntryForm')->name('employee.accounting.expensesPage');

		//get employee income entry form....
	Route::get('/accounting/income', 'EmployeeController@IncomeEntryForm')->name('employee.accounting.incomePage');

	// get employee payroll view
	Route::get('/accounting/payroll', 'EmployeeController@PayrollView')->name('employee.accounting.payrollPage');
	// get banking transaction pages..
	Route::get('/accounting/bankTransactions', 'EmployeeController@BankTransactionsForm')->name('employee.accounting.bankTransactionsPage');

	//get bills receivable view page
	Route::get('/accounting/billsReceivable', 'EmployeeController@BillsReceivableView')->name('employee.accounting.billsReceivablePage');
	//get bills payable view page
	Route::get('/accounting/billsPayable', 'EmployeeController@BillsPayableView')->name('employee.accounting.billsPayablePage');
	//get journal entries view page
	Route::get('/accounting/journal', 'EmployeeController@JournalEntryView')->name('employee.accounting.journalPage');
	//get ledger account view page
	Route::get('/accounting/ledger', 'EmployeeController@LedgerAccountView')->name('employee.accounting.ledgerPage');

	


	// //Get category and ledger account data 
	// Route::get('/accounting/get/CategoryData', 'EmployeeController@GetCategoryAccountData');

	
});

