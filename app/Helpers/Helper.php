<?php

// ******JOURNAL SECTION*******STARTS**********


// ******** function to create purchase journal data starts************
if (!function_exists('CreatePurchaseJournalData')) {
    function CreatePurchaseJournalData(){
		$data = DB::table('purchase__transactions AS tr')
        ->leftjoin('vendors AS v', 'tr.vendor_id', '=', 'v.id')
        ->leftjoin('purchase__details AS pd', 'tr.id', '=', 'pd.purchase_transaction_id')
        ->leftjoin('ledger_accounts AS la', 'pd.account_id', '=', 'la.id')
        ->leftjoin('account_categories AS ac', 'la.category_id', '=', 'ac.id')
        ->leftjoin('purchase_payments AS pp', function($join)
            {
                $join->on('pp.purchase_transaction_id', '=', 'pd.purchase_transaction_id');
                $join->on('pp.account_id','=', 'pd.account_id');
            })
        ->select('tr.id', 'tr.invoice_number', 'tr.date', 'v.vendor_name', 'la.account_name', 'ac.category_name', DB::raw('SUM((pd.quantity*pd.rate-0.01*tr.discount_percent*pd.quantity*pd.rate)+0.01*tr.tax_percent*(pd.quantity*pd.rate-0.01*tr.discount_percent*pd.quantity*pd.rate)) AS total_amount'), 'pp.amount AS paid_amount', 'pp.payment_mode AS paymentMode')
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
        for($i = 0; $i < count($journal); $i++){
        	$journal[$i]->paymentMode = ucfirst($journal[$i]->paymentMode);
            $journal[$i]->Cash = null;
            $journal[$i]->Bank = null;
             for($j = $i+1; $j < count($journal); $j++){
                if($journal[$i]->id == $journal[$j]->id and $journal[$i]->account_name == $journal[$j]->account_name and $journal[$i]->total_amount == $journal[$j]->total_amount){
                    $mode1 = $journal[$i]->paymentMode;
                    $mode2 = ucfirst($journal[$j]->paymentMode);
                    if($mode1 == $mode2){
                        $journal[$i]->paid_amount += $journal[$j]->paid_amount;
                        $journal[$i]->$mode1 = $journal[$i]->paid_amount;
                    }
                    else{
                        $journal[$i]->$mode1 = $journal[$i]->paid_amount;
                        $journal[$i]->$mode2 = $journal[$j]->paid_amount;
                    }
                    \array_splice($journal, $j, 1);
                    $j--;
                }
            }
            if($journal[$i]->paymentMode != null){
	            $mode = $journal[$i]->paymentMode;
		        $journal[$i]->$mode = $journal[$i]->paid_amount;
		    }
            
            // delete unwanted columns......
            unset($journal[$i]->paid_amount);
            unset($journal[$i]->paymentMode);
            unset($journal[$i]->id);
        }
        $journal_data = array();
        for($i = 0; $i < count($journal); $i++){
            $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "{$journal[$i]->account_name} Purchase",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'index' => "purchase{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                array_push($journal_data, $data);
            if($journal[$i]->Bank != null){
                $data = (object)['date' => $journal[$i]->date,
                    'particulars' => "Bank",
                    'amount' => $journal[$i]->Bank,
                    'side' => "credit",
                    'index' => "purchase{$i}",
                    'categoryName' => "Current Assets"
                    ];
                array_push($journal_data, $data);
            }
            if($journal[$i]->Cash != null){
                $data = (object)['date' => $journal[$i]->date,
                    'particulars' => "Cash",
                    'amount' => $journal[$i]->Cash,
                    'side' => "credit",
                    'index' => "purchase{$i}",
                    'categoryName' => "Current Assets"
                    ];
                array_push($journal_data, $data);
            }
            if(($journal[$i]->Cash + $journal[$i]->Bank) != $journal[$i]->total_amount){
                $data = (object)['date' => $journal[$i]->date,
                    'particulars' => $journal[$i]->vendor_name,
                    'amount' => $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                    'side' => "credit",
                    'index' => "purchase{$i}",
                    'categoryName' => "Personal"
                    ];
                array_push($journal_data, $data);
            }
        }
        return array($journal_data, $data);
    }
}
// ******** function to create purchase journal data ends************






// ******** function to create Sales journal data starts************
if (!function_exists('CreateSalesJournalData')) {
    function CreateSalesJournalData(){
		$data = DB::table('sales_transactions AS tr')
        ->leftjoin('dealers AS d', 'tr.customer_id', '=', 'd.id')
        ->leftjoin('sales_details AS sd', 'tr.id', '=', 'sd.sales_transaction_id')
        ->leftjoin('ledger_accounts AS la', 'sd.account_id', '=', 'la.id')
        ->leftjoin('account_categories AS ac', 'la.category_id', '=', 'ac.id')
        ->leftjoin('sales_receipts AS sr', function($join)
            {
                $join->on('sd.sales_transaction_id', '=', 'sr.sales_transaction_id');
                $join->on('sd.account_id','=', 'sr.account_id');
            })
        ->select('tr.id', 'tr.date', 'tr.invoice_number', 'd.name as customer_name', 'la.account_name', 'ac.category_name', DB::raw('SUM((sd.quantity*sd.rate-0.01*tr.discount_percent*sd.quantity*sd.rate)+0.01*tr.tax_percent*(sd.quantity*sd.rate-0.01*tr.discount_percent*sd.quantity*sd.rate))AS total_amount'), 'sr.amount AS received_amount', 'sr.receipt_mode AS receiptMode')
        ->groupBy('sd.account_id', 'sd.sales_transaction_id', 'sr.id')
        ->orderBy('tr.date')
        ->paginate();

        $journal = $data;
        $result = array();
        foreach ($journal as $key => $value)
            {
                $result[$key] = $value;
            }
        $journal = $result;
        for($i = 0; $i < count($journal); $i++){
        	$journal[$i]->receiptMode = ucfirst($journal[$i]->receiptMode);
            $journal[$i]->Cash = null;
            $journal[$i]->Bank = null;

            for($j = $i+1; $j < count($journal); $j++){
                if($journal[$i]->id == $journal[$j]->id and $journal[$i]->account_name == $journal[$j]->account_name and $journal[$i]->total_amount == $journal[$j]->total_amount){
                    $mode1 = $journal[$i]->receiptMode;
                    $mode2 = ucfirst($journal[$j]->receiptMode);
                    if($mode1 == $mode2){
                        $journal[$i]->received_amount += $journal[$j]->received_amount;
                        $journal[$i]->$mode1 = $journal[$i]->received_amount;
                    }
                    else{
                        $journal[$i]->$mode1 = $journal[$i]->received_amount;
                        $journal[$i]->$mode2 = $journal[$j]->received_amount;
                    }
                    \array_splice($journal, $j, 1);
                    $j--;
                }
            }
            if($journal[$i]->receiptMode != null){
	            $mode = $journal[$i]->receiptMode;
	            $journal[$i]->$mode = $journal[$i]->received_amount;
            }
            //delete unwanted columns......
            unset($journal[$i]->received_amount);
            unset($journal[$i]->receiptMode);
            unset($journal[$i]->id);
        }
        $journal_data = array();
        for($i = 0; $i < count($journal); $i++){
            if($journal[$i]->Bank != null){
                $data = (object)['date' => $journal[$i]->date,
                    'particulars' => "Bank",
                    'amount' => $journal[$i]->Bank,
                    'side' => "debit",
                    'index' => "sales{$i}",
                    'categoryName' => "Current Assets"
                    ];
                array_push($journal_data, $data);
            }
            if($journal[$i]->Cash != null){
                $data = (object)['date' => $journal[$i]->date,
                    'particulars' => "Cash",
                    'amount' => $journal[$i]->Cash,
                    'side' => "debit",
                    'index' => "sales{$i}",
                    'categoryName' => "Current Assets"
                    ];
                array_push($journal_data, $data);
            }
            if(($journal[$i]->Cash + $journal[$i]->Bank) != $journal[$i]->total_amount){
                $data = (object)['date' => $journal[$i]->date,
                    'particulars' => $journal[$i]->customer_name,
                    'amount' => $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                    'side' => "debit",
                    'index' => "sales{$i}",
                    'categoryName' => "Personal"
                    ];
                array_push($journal_data, $data);
            }
            $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "{$journal[$i]->account_name} Sales",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'index' => "sales{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                array_push($journal_data, $data);
        }
        return array($journal_data, $data);
    }
}
// ******** function to create Sales journal data ends************







// ******** function to create Expenses journal data starts************
if (!function_exists('CreateExpensesJournalData')) {
    function CreateExpensesJournalData(){
		$data = DB::table('expenses_losses_transactions AS tr')
        ->leftjoin('vendors AS v', 'tr.creditors_id', '=', 'v.id')
        ->leftjoin('expenses_losses_details AS ed', 'tr.id', '=', 'ed.expenses_transaction_id')
        ->leftjoin('ledger_accounts AS la', 'ed.account_id', '=', 'la.id')
        ->leftjoin('account_categories AS ac', 'la.category_id', '=', 'ac.id')
        ->leftjoin('expenses_transaction_types AS ett', 'ed.expenses_transaction_type_id', '=', 'ett.id')
        ->leftjoin('expenses_payments AS ep', function($join)
            {
                $join->on('ed.expenses_transaction_id', '=', 'ep.expenses_transaction_id');
                $join->on('ed.account_id','=', 'ep.account_id');
            })
        ->select('tr.id', 'tr.date', 'ett.expenses_transaction_type', 'ac.category_name', 'tr.invoice_number', 'v.vendor_name', 'la.account_name', DB::raw('SUM(ed.amount) AS total_amount'), 'ep.amount AS paid_amount', 'ep.payment_mode AS paymentMode', 'ep.discount', 'ep.discount_state')
        ->groupBy('ed.account_id', 'ed.expenses_transaction_id', 'ep.id')
        ->orderBy('tr.date')
        ->paginate();
        // dd($data);

        $journal = $data;
        $result = array();
        foreach ($journal as $key => $value)
            {
                $result[$key] = $value;
            }
        $journal = $result;
        for($i = 0; $i < count($journal); $i++){
        	$journal[$i]->paymentMode = ucfirst($journal[$i]->paymentMode);
            $journal[$i]->Cash = null;
            $journal[$i]->Bank = null;

            for($j = $i+1; $j < count($journal); $j++){
                if($journal[$i]->id == $journal[$j]->id and $journal[$i]->account_name == $journal[$j]->account_name and $journal[$i]->total_amount == $journal[$j]->total_amount){
                    $mode1 = $journal[$i]->paymentMode;
                    $mode2 = ucfirst($journal[$j]->paymentMode);
                    if($mode1 == $mode2){
                        $journal[$i]->$mode1 = $journal[$i]->paid_amount + $journal[$j]->paid_amount;
                    }
                    else{
                        $journal[$i]->$mode1 = $journal[$i]->paid_amount;
                        $journal[$i]->$mode2 = $journal[$j]->paid_amount;
                    }
                    if($journal[$j]->discount != null){
                        $journal[$i]->discount = $journal[$j]->discount;
                    }
                    \array_splice($journal, $j, 1);
                    $j--;
                }
            }
            if($journal[$i]->paymentMode != null){
                $mode = $journal[$i]->paymentMode;
                $journal[$i]->$mode = $journal[$i]->paid_amount;
            }
            //delete unwanted columns......
            unset($journal[$i]->paid_amount);
            unset($journal[$i]->paymentMode);
            unset($journal[$i]->id);

        }
        // dd($journal);
        // ************preparing outstanding and prepaid expenses data starts***********
        $tempJournal = $journal;
        $prepaidExpenses = array();
        $outstandingExpenses = array();
        for($i = 0; $i < count($tempJournal); $i++){
            if($tempJournal[$i]->expenses_transaction_type == "prepaid expenses"){
                $date = $tempJournal[$i]->date;
                $vendorName = $tempJournal[$i]->vendor_name;
                $prepaidAmt = $tempJournal[$i]->total_amount;
                $accountName = $tempJournal[$i]->account_name;
                for($j = $i+1; $j < count($tempJournal); $j++){
                    if($tempJournal[$i]->vendor_name == $tempJournal[$j]->vendor_name and $tempJournal[$i]->account_name == $tempJournal[$j]->account_name and $tempJournal[$j]->expenses_transaction_type == "prepaid expenses"){
                        $prepaidAmt += $tempJournal[$j]->total_amount;
                        \array_splice($tempJournal, $j, 1);
                    }
                    $data = (object)['date' => $date,
                        'vendorName' => $vendorName,
                        'accountName' => $accountName,
                        'prepaidAmount' => $prepaidAmt
                        ];
                    array_push($prepaidExpenses, $data);
                }
            }
        }
        // dd($prepaidExpenses);
        // ************preparing outstanding and prepaid expenses data ends***********
        

        // ************preparing journal data starts***********
        $journal_data = array();
        for($i = 0; $i < count($journal); $i++){
            if($journal[$i]->expenses_transaction_type == "expenses incurred"){
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'index' => "expenses{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                array_push($journal_data, $data);
                if($journal[$i]->Bank != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Bank",
                        'amount' => $journal[$i]->Bank,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->Cash != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Cash",
                        'amount' => $journal[$i]->Cash,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if(($journal[$i]->Cash + $journal[$i]->Bank) != $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Outstanding {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Liabilities"
                        ];
                    array_push($journal_data, $data);
                    //to push data of outstanding expenses starts
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Outstanding {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                        'side' => "credit",
                        'vendorName' => $journal[$i]->vendor_name
                        ];
                    array_push($outstandingExpenses, $data);
                    //to push data of outstanding expenses ends
                }
            }
            else if($journal[$i]->expenses_transaction_type == "outstanding expenses paid"){
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Outstanding {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Liabilities"
                        ];
                array_push($journal_data, $data);

                //to push outstanding expenses data...starts
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Outstanding {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'vendorName' => $journal[$i]->vendor_name
                        ];
                array_push($outstandingExpenses, $data);
                //to push data of outstanding expenses ends

                if($journal[$i]->Bank != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Bank",
                        'amount' => $journal[$i]->Bank,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->Cash != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Cash",
                        'amount' => $journal[$i]->Cash,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->discount != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Discount Received",
                        'amount' => $journal[$i]->discount,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Incomes"
                        ];
                    array_push($journal_data, $data);
                }
            }
            else if($journal[$i]->expenses_transaction_type == "prepaid expenses"){
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Prepaid {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assets"
                        ];
                array_push($journal_data, $data);

                // // ****prepare prepaidExpenses data starts*******
                // $data = (object)['date' => $journal[$i]->date,
                //         'particulars' => "Prepaid {$journal[$i]->account_name}",
                //         'amount' => $journal[$i]->total_amount,
                //         'side' => "debit",
                //         'vendorName' => $journal[$i]->vendor_name
                //         ];
                // array_push($prepaidExpenses, $data);
                // // ****prepare prepaidExpenses data ends*******

                if($journal[$i]->Bank != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Bank",
                        'amount' => $journal[$i]->Bank,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->Cash != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Cash",
                        'amount' => $journal[$i]->Cash,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
            }
            else if($journal[$i]->expenses_transaction_type == "prepaid expenses incurred"){
                $prepaidAmt = 0;
                for($j = 0; $j < count($prepaidExpenses); $j++){
                    if($journal[$i]->vendor_name == $prepaidExpenses[$j]->vendorName and $journal[$i]->account_name == $prepaidExpenses[$j]->accountName ){
                        $prepaidAmt = $prepaidExpenses[$j]->prepaidAmount;
                    }
                }

                if($prepaidAmt < $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'index' => "expenses{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                    array_push($journal_data, $data);
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Prepaid {$journal[$i]->account_name}",
                        'amount' => $prepaidAmt,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assests"
                        ];
                    array_push($journal_data, $data);

                    // //*****preparation of prepaidExpenses data starts******
                    // $data = (object)['date' => $journal[$i]->date,
                    //     'particulars' => "Prepaid {$journal[$i]->account_name}",
                    //     'amount' => $prepaidAmt,
                    //     'side' => "credit",
                    //     'vendorName' => $journal[$i]->vendor_name
                    //     ];
                    // array_push($prepaidExpenses, $data);
                    // //*****preparation of prepaidExpenses data ends******

                    if($journal[$i]->Cash != null){
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Cash",
                            'amount' => $journal[$i]->Cash,
                            'side' => "credit",
                            'index' => "expenses{$i}",
                            'categoryName' => "Current Assets"
                        ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->Bank != null){
                        array_push($journal_data, $data);
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Bank",
                            'amount' => $journal[$i]->Bank,
                            'side' => "credit",
                            'index' => "expenses{$i}",
                            'categoryName' => "Current Assets"
                            ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->discount_state == "received"){
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Discount Received",
                            'amount' => $journal[$i]->total_amount - $prepaidAmt - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "credit",
                            'index' => "expenses{$i}",
                            'categoryName' => "Incomes"
                            ];
                        array_push($journal_data, $data);
                    }
                    else{
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Outstanding {$journal[$i]->account_name}",
                            'amount' => $journal[$i]->total_amount - $prepaidAmt - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "credit",
                            'index' => "expenses{$i}",
                            'categoryName' => "Current Liabilities"
                            ];
                        array_push($journal_data, $data);

                        //to push outstanding expenses data starts
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Outstanding {$journal[$i]->account_name}",
                            'amount' => $journal[$i]->total_amount - $prepaidAmt - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "credit",
                            'vendorName' => $journal[$i]->vendor_name
                            ];
                        array_push($outstandingExpenses, $data);
                        //to push outstanding expenses data ends
                    }
                }

                if($prepaidAmt > $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'index' => "expenses{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                    array_push($journal_data, $data);
                    if($journal[$i]->Cash != null){
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Cash",
                            'amount' => $journal[$i]->Cash,
                            'side' => "debit",
                            'index' => "expenses{$i}",
                            'categoryName' => "Current Assets"
                        ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->Bank != null){
                        array_push($journal_data, $data);
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Bank",
                            'amount' => $journal[$i]->Bank,
                            'side' => "debit",
                            'index' => "expenses{$i}",
                            'categoryName' => "Current Assets"
                            ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->discount_state == "given"){
                        $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Discount Given",
                        'amount' => $prepaidAmt - $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                        'side' => "debit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Indirect Expenses"
                        ];
                    array_push($journal_data, $data);
                    }
                    else{
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => $journal[$i]->vendor_name,
                            'amount' => $prepaidAmt - $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "debit",
                            'index' => "expenses{$i}",
                            'categoryName' => "Current Assets"
                            ];
                        array_push($journal_data, $data);
                    }
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Prepaid {$journal[$i]->account_name}",
                        'amount' => $prepaidAmt,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assests"
                        ];
                    array_push($journal_data, $data);

                    // //*****preparation of prepaidExpenses data starts******
                    // $data = (object)['date' => $journal[$i]->date,
                    //     'particulars' => "Prepaid {$journal[$i]->account_name}",
                    //     'amount' => $prepaidAmt,
                    //     'side' => "credit",
                    //     'vendorName' => $journal[$i]->vendor_name
                    //     ];
                    // array_push($prepaidExpenses, $data);
                    // //*****preparation of prepaidExpenses data ends******

                }

                if($prepaidAmt == $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "debit",
                        'index' => "expenses{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                    array_push($journal_data, $data);
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Prepaid {$journal[$i]->account_name}",
                        'amount' => $prepaidAmt,
                        'side' => "credit",
                        'index' => "expenses{$i}",
                        'categoryName' => "Current Assests"
                        ];
                    array_push($journal_data, $data);
                    // //*****preparation of prepaidExpenses data starts******
                    // $data = (object)['date' => $journal[$i]->date,
                    //     'particulars' => "Prepaid {$journal[$i]->account_name}",
                    //     'amount' => $prepaidAmt,
                    //     'side' => "credit",
                    //     'vendorName' => $journal[$i]->vendor_name
                    //     ];
                    // array_push($prepaidExpenses, $data);
                    // //*****preparation of prepaidExpenses data ends******
                }
            }
            // *****this code will come in future*****
            else if($journal[$i]->expenses_transaction_type == "prepaid expenses return"){

            }
            // *****this code will come in future*****
        }
        // ************preparing journal data ends***********
        return array($journal_data, $data);
    }
}
// ******** function to create Expenses journal data ends************







// ******** function to create Income journal data starts************
if (!function_exists('CreateIncomeJournalData')) {
    function CreateIncomeJournalData(){
		$data = DB::table('income_transactions AS tr')
        ->leftjoin('dealers AS d', 'tr.customer_id', '=', 'd.id')
        ->leftjoin('income_details AS id', 'tr.id', '=', 'id.income_transaction_id')
        ->leftjoin('ledger_accounts AS la', 'id.account_id', '=', 'la.id')
        ->leftjoin('account_categories AS ac', 'la.category_id', '=', 'ac.id')
        ->leftjoin('income_transaction_types AS itt', 'id.income_transaction_type_id', '=', 'itt.id')
        ->leftjoin('income_receipts AS ir', function($join)
            {
                $join->on('id.income_transaction_id', '=', 'ir.income_transaction_id');
                $join->on('id.account_id','=', 'ir.account_id');
            })
        ->select('tr.id', 'tr.date', 'itt.income_transaction_type', 'ac.category_name', 'tr.invoice_number', 'd.name as customer_name', 'la.account_name', DB::raw('SUM(id.amount) AS total_amount'), 'ir.amount AS received_amount', 'ir.receipt_mode AS receiptMode', 'ir.discount', 'ir.discount_state')
        ->groupBy('id.account_id', 'id.income_transaction_id', 'ir.id')
        ->orderBy('tr.date')
        ->paginate();
        // dd($data);

        $journal = $data;
        $result = array();
        foreach ($journal as $key => $value)
            {
                $result[$key] = $value;
            }
        $journal = $result;
        for($i = 0; $i < count($journal); $i++){
        	$journal[$i]->receiptMode = ucfirst($journal[$i]->receiptMode);
            $journal[$i]->Cash = null;
            $journal[$i]->Bank = null;

            for($j = $i+1; $j < count($journal); $j++){
                if($journal[$i]->id == $journal[$j]->id and $journal[$i]->account_name == $journal[$j]->account_name and $journal[$i]->total_amount == $journal[$j]->total_amount){
                    $mode1 = $journal[$i]->receiptMode;
                    $mode2 = ucfirst($journal[$j]->receiptMode);
                    if($mode1 == $mode2){
                        $journal[$i]->$mode1 = $journal[$i]->received_amount + $journal[$j]->received_amount;
                    }
                    else{
                        $journal[$i]->$mode1 = $journal[$i]->received_amount;
                        $journal[$i]->$mode2 = $journal[$j]->received_amount;
                    }
                    if($journal[$j]->discount_state != null){
                        $journal[$i]->discount = $journal[$j]->discount;
                        $journal[$i]->discount_state = $journal[$j]->discount_state;
                    }
                    \array_splice($journal, $j, 1);
                    $j--;
                }
            }
            if($journal[$i]->receiptMode != null){
                $mode = $journal[$i]->receiptMode;
                $journal[$i]->$mode = $journal[$i]->received_amount;
            }
            //delete unwanted columns......
            unset($journal[$i]->received_amount);
            unset($journal[$i]->receiptMode);
            unset($journal[$i]->id);

        }
        // dd($journal);
        // ************preparing journal data starts***********

        $journal_data = array();
        $accruedIncomes = array();
        $advanceIncomes = array();
        for($i = 0; $i < count($journal); $i++){
            if($journal[$i]->income_transaction_type == "income earned"){
                if($journal[$i]->Bank != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Bank",
                        'amount' => $journal[$i]->Bank,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->Cash != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Cash",
                        'amount' => $journal[$i]->Cash,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if(($journal[$i]->Cash + $journal[$i]->Bank) != $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Accrued {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                    //to push data of accrued incomes starts
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Accrued {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                        'side' => "debit",
                        'customerName' => $journal[$i]->customer_name
                        ];
                    array_push($accruedIncomes, $data);
                    //to push data of accrued incomes ends
                }
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'index' => "income{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                array_push($journal_data, $data);
            }
            else if($journal[$i]->income_transaction_type == "accrued income received"){
                if($journal[$i]->Bank != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Bank",
                        'amount' => $journal[$i]->Bank,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->Cash != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Cash",
                        'amount' => $journal[$i]->Cash,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->discount != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Discount Given",
                        'amount' => $journal[$i]->discount,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Direct Expenses"
                        ];
                    array_push($journal_data, $data);
                }
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Accrued {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                array_push($journal_data, $data);

                //to push accrued income data...starts
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Accrued {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'customerName' => $journal[$i]->customer_name
                        ];
                array_push($accruedIncomes, $data);
                //to push data of accrued incomes ends
            }
            else if($journal[$i]->income_transaction_type == "advance income"){
                if($journal[$i]->Bank != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Bank",
                        'amount' => $journal[$i]->Bank,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                if($journal[$i]->Cash != null){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Cash",
                        'amount' => $journal[$i]->Cash,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assets"
                        ];
                    array_push($journal_data, $data);
                }
                $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Advance {$journal[$i]->account_name}",
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Liabilities"
                        ];
                array_push($journal_data, $data);

                // // ****prepare prepaidExpenses data starts*******
                // $data = (object)['date' => $journal[$i]->date,
                //         'particulars' => "Prepaid {$journal[$i]->account_name}",
                //         'amount' => $journal[$i]->total_amount,
                //         'side' => "debit",
                //         'vendorName' => $journal[$i]->vendor_name
                //         ];
                // array_push($prepaidExpenses, $data);
                // // ****prepare prepaidExpenses data ends*******
            }
            else if($journal[$i]->income_transaction_type == "advance income earned"){
                $advanceAmt = 0;
                for($j = 0; $j < count($advanceIncomes); $j++){
                    if($journal[$i]->customer_name == $advanceIncomes[$j]->customer_name and $journal[$i]->account_name == $advanceIncomes[$j]->accountName ){
                        $advanceAmt = $advanceIncomes[$j]->advanceAmount;
                    }
                }

                if($advanceAmt < $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Advance {$journal[$i]->account_name}",
                        'amount' => $advanceAmt,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assests"
                        ];
                    array_push($journal_data, $data);

                    // //*****preparation of advanceIncomes data starts******
                    // $data = (object)['date' => $journal[$i]->date,
                    //     'particulars' => "Prepaid {$journal[$i]->account_name}",
                    //     'amount' => $advanceAmt,
                    //     'side' => "credit",
                    //     'vendorName' => $journal[$i]->vendor_name
                    //     ];
                    // array_push($advanceIncomes, $data);
                    // //*****preparation of advanceIncomes data ends******

                    if($journal[$i]->Cash != null){
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Cash",
                            'amount' => $journal[$i]->Cash,
                            'side' => "debit",
                            'index' => "income{$i}",
                            'categoryName' => "Current Assets"
                        ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->Bank != null){
                        array_push($journal_data, $data);
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Bank",
                            'amount' => $journal[$i]->Bank,
                            'side' => "debit",
                            'index' => "income{$i}",
                            'categoryName' => "Current Assets"
                            ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->discount_state == "given"){
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Discount Given",
                            'amount' => $journal[$i]->total_amount - $advanceAmt - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "debit",
                            'index' => "income{$i}",
                            'categoryName' => "Indirect Expenses"
                            ];
                        array_push($journal_data, $data);
                    }
                    else{
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Accrued {$journal[$i]->account_name}",
                            'amount' => $journal[$i]->total_amount - $advanceAmt - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "debit",
                            'index' => "income{$i}",
                            'categoryName' => "Current Assets"
                            ];
                        array_push($journal_data, $data);

                        //to push accrued incomes data starts
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Accrued {$journal[$i]->account_name}",
                            'amount' => $journal[$i]->total_amount - $advanceAmt - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "debit",
                            'customerName' => $journal[$i]->customer_name
                            ];
                        array_push($accruedIncomes, $data);
                        //to push accrued incomes data ends
                    }
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'index' => "income{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                    array_push($journal_data, $data);
                }

                if($advanceAmt > $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Advance {$journal[$i]->account_name}",
                        'amount' => $advanceAmt,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Assests"
                        ];
                    array_push($journal_data, $data);

                    // //*****preparation of advanceIncomes data starts******
                    // $data = (object)['date' => $journal[$i]->date,
                    //     'particulars' => "Prepaid {$journal[$i]->account_name}",
                    //     'amount' => $advanceAmt,
                    //     'side' => "credit",
                    //     'vendorName' => $journal[$i]->vendor_name
                    //     ];
                    // array_push($advanceIncomes, $data);
                    // //*****preparation of advanceIncomes data ends******

                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'index' => "income{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                    array_push($journal_data, $data);
                    if($journal[$i]->Cash != null){
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Cash",
                            'amount' => $journal[$i]->Cash,
                            'side' => "credit",
                            'index' => "income{$i}",
                            'categoryName' => "Current Assets"
                        ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->Bank != null){
                        array_push($journal_data, $data);
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => "Bank",
                            'amount' => $journal[$i]->Bank,
                            'side' => "credit",
                            'index' => "income{$i}",
                            'categoryName' => "Current Assets"
                            ];
                        array_push($journal_data, $data);
                    }
                    if($journal[$i]->discount_state == "received"){
                        $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Discount Received",
                        'amount' => $advanceAmt - $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                        'side' => "credit",
                        'index' => "income{$i}",
                        'categoryName' => "Incomes"
                        ];
                    array_push($journal_data, $data);
                    }
                    else{
                        $data = (object)['date' => $journal[$i]->date,
                            'particulars' => $journal[$i]->customer_name,
                            'amount' => $advanceAmt - $journal[$i]->total_amount - $journal[$i]->Cash - $journal[$i]->Bank,
                            'side' => "credit",
                            'index' => "income{$i}",
                            'categoryName' => "Personal"
                            ];
                        array_push($journal_data, $data);
                    }

                }

                if($advanceAmt == $journal[$i]->total_amount){
                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => "Advance {$journal[$i]->account_name}",
                        'amount' => $advanceAmt,
                        'side' => "debit",
                        'index' => "income{$i}",
                        'categoryName' => "Current Liabilities"
                        ];
                    array_push($journal_data, $data);
                    // //*****preparation of advanceIncomes data starts******
                    // $data = (object)['date' => $journal[$i]->date,
                    //     'particulars' => "Prepaid {$journal[$i]->account_name}",
                    //     'amount' => $advanceAmt,
                    //     'side' => "credit",
                    //     'vendorName' => $journal[$i]->vendor_name
                    //     ];
                    // array_push($advanceIncomes, $data);
                    // //*****preparation of advanceIncomes data ends******

                    $data = (object)['date' => $journal[$i]->date,
                        'particulars' => $journal[$i]->account_name,
                        'amount' => $journal[$i]->total_amount,
                        'side' => "credit",
                        'index' => "income{$i}",
                        'categoryName' => $journal[$i]->category_name
                        ];
                    array_push($journal_data, $data);
                }
            }
            // *****this code will come in future*****
            else if($journal[$i]->income_transaction_type == "advance income return"){

            }
            // *****this code will come in future*****
        }
        // ************preparing journal data ends***********
        return array($journal_data, $data);
    }
}
// ******** function to create Income journal data ends************







// ******** function to create Receipts journal data starts************
if (!function_exists('CreateReceiptsJournalData')) {
    function CreateReceiptsJournalData(){
		$receipts = DB::table('receipt_transactions AS tr')
        ->leftjoin('dealers AS d', 'tr.dealer_id', '=', 'd.id')
        ->select('tr.date', 'tr.receipt_mode', 'd.name', DB::raw('SUM(discount) AS discount'), DB::raw('SUM(tr.amount) AS amount'))
        ->groupBy('tr.date', 'tr.receipt_mode', 'd.name')
        ->orderBy('tr.date')
        ->get();

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
                            'particulars' => ucfirst($receipts[$i]->receipt_mode),
                            'amount' => $receipts[$i]->amount,
                            'side' => "debit",
                            'index' => "receipt{$i}",
                            'categoryName' => "Current Assests"
                            ];
            array_push($receipts_journal, $receipts_journal_data);
            if($receipts[$i]->discount != null){
                $receipts_journal_data = (object)['date' => $receipts[$i]->date,
                            'particulars' => "Discount Given",
                            'amount' => $receipts[$i]->discount,
                            'side' => "debit",
                            'index' => "receipt{$i}",
                            'categoryName' => "Indirect Expenses"
                            ];
            array_push($receipts_journal, $receipts_journal_data);
            }
            $receipts_journal_data = (object)['date' => $receipts[$i]->date,
                            'particulars' => $receipts[$i]->name,
                            'amount' => $receipts[$i]->amount + $receipts[$i]->discount,
                            'side' => "credit",
                            'index' => "receipt{$i}",
                            'categoryName' => "Personal"
                            ];
            array_push($receipts_journal, $receipts_journal_data);
        }
        // ******process receipts data for journal entry ends********
        return $receipts_journal;
    }
}
// ******** function to create Receipts journal data ends************







// ******** function to create Payment journal data starts************
if (!function_exists('CreatePaymentJournalData')) {
    function CreatePaymentJournalData(){
		$payment = DB::table('payment_transactions AS tr')
        ->leftjoin('vendors AS v', 'tr.vendor_id', '=', 'v.id')
        ->select('tr.date', 'tr.payment_mode', 'v.vendor_name',DB::raw('SUM(discount) AS discount'), DB::raw('SUM(tr.amount) AS amount'))
        ->groupBy('tr.date', 'tr.payment_mode', 'v.vendor_name')
        ->orderBy('tr.date')
        ->get();

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
                            'index' => "payment{$i}",
                            'categoryName' => "Personal"
                            ];
            array_push($payment_journal, $payment_journal_data);
            if($payment[$i]->discount != null){
                $payment_journal_data = (object)['date' => $payment[$i]->date,
                            'particulars' => "Discount Received",
                            'amount' => $payment[$i]->discount,
                            'side' => "credit",
                            'index' => "payment{$i}",
                            'categoryName' => "Incomes"
                            ];
                array_push($payment_journal, $payment_journal_data);
            }
            $payment_journal_data = (object)['date' => $payment[$i]->date,
                            'particulars' => ucfirst($payment[$i]->payment_mode),
                            'amount' => $payment[$i]->amount,
                            'side' => "credit",
                            'index' => "payment{$i}",
                            'categoryName' => "Current Assets"
                            ];
            array_push($payment_journal, $payment_journal_data);
        }
        // ******process payment data for journal entry ends********
        return $payment_journal;
    }
}
// ******** function to create Payment journal data ends************







if (!function_exists('CreatePurchaseReturnJournalView')) {
    function CreatePurchaseReturnJournalView(){
        
    }
}






if (!function_exists('CreateSalesReturnJournalView')) {
    function CreateSalesReturnJournalView(){
        
    }
}


// ******JOURNAL SECTION*******ENDS**********











if (!function_exists('CreateLedgerAccountsData')) {
    function CreateLedgerAccountsData(){
        $purchaseJournal = CreatePurchaseJournalData();
        $salesJournal = CreateSalesJournalData();
        $expensesJournal = CreateExpensesJournalData();
        $incomeJournal = CreateIncomeJournalData();
        $receiptsJournal = CreateReceiptsJournalData();
        $paymentJournal = CreatePaymentJournalData();
        $journal_data = array_merge($purchaseJournal[0], $salesJournal[0], $expensesJournal[0], $incomeJournal[0], $receiptsJournal, $paymentJournal);
        //create a initial ledger array 
        $ledger = array();
        //array that stores all the ledger accounts.....
        $ledger_accounts = array();
        // *******create the initial ledger data OR ledger data preprocessing starts*****
        for($i = 0; $i < count($journal_data); $i++){
            $temp = $journal_data[$i]->particulars;
            if(in_array($temp, $ledger_accounts)){
                continue;
            }
            array_push($ledger_accounts, $temp);
            for($j = $i; $j < count($journal_data); $j++){
                if($journal_data[$j]->particulars == $temp){
                    $date = $journal_data[$j]->date;
                    $index = $journal_data[$j]->index;
                    $side = $journal_data[$j]->side;
                    $category = $journal_data[$j]->categoryName;
                    $k = $j+1;
                    if(isset($journal_data[$k])){
                        while($journal_data[$k]->index == $index){
                           if(isset($journal_data[$k])){
                                if($side != $journal_data[$k]->side){
                                    $particulars = $journal_data[$k]->particulars;
                                    if($journal_data[$k]->amount < $journal_data[$j]->amount){
                                    	$amount = $journal_data[$k]->amount;
                                    }
                                    else{
                                    	$amount = $journal_data[$j]->amount;
                                    }
                                    $data = ['date' => $date,
                                    'particulars' => $particulars,
                                    'amount' => $amount,
                                    'side' => $side,
                                    'index' => $temp,
                                    'category' => $category
                                    ];
                                    array_push($ledger, $data);
                                }
                           } 
                           if(isset($journal_data[$k+1]))$k++;
                           else break;
                        }
                    }
                    $k = $j-1;
                    if(isset($journal_data[$k])){
                        while($journal_data[$k]->index == $index){
                           if(isset($journal_data[$k])){
                                if($side != $journal_data[$k]->side){
                                    $particulars = $journal_data[$k]->particulars;
                                    if($journal_data[$k]->amount < $journal_data[$j]->amount){
                                    	$amount = $journal_data[$k]->amount;
                                    }
                                    else{
                                    	$amount = $journal_data[$j]->amount;
                                    }
                                    $data = ['date' => $date,
                                    'particulars' => $particulars,
                                    'amount' => $amount,
                                    'side' => $side,
                                    'index' => $temp,
                                    'category' => $category
                                    ];
                                    array_push($ledger, $data);
                                }
                           } 
                           if(isset($journal_data[$k-1]))$k--;
                           else break;
                        }
                    }
                }
            }
        }
        // dd($ledger);
        // *******create the initial ledger data OR ledger data preprocessing starts*****
        //convert ledger array into object..
        $ledger = json_decode(json_encode($ledger));
        $month = array("Jan", "Feb", "March", "April", "May", "June", "July", "August", "Sept","Oct","Nov", "Dec");
        // ***create finalledger data and calculate ledger balances for trial balance starts***
        $final_ledger = array();
        $ledger_balance = array();
        for($i = 0; $i < count($ledger); $i++){
            //initialize variables for ledger_balances
            $debitamt = 0;
            $creditamt = 0;
            $index = $ledger[$i]->index;
            $categ = $ledger[$i]->category;
            if(!isset($ledger_balance[$index][$month[0]])){
                $PMB = 0;
                $pside = null;
            }
            else{
                $PMB = $ledger_balance[$index][$month[0]]->amount;
                $pside = $ledger_balance[$index][$month[0]]->side;
            }
            $data = ['date' => $date,
                    'particulars' => "Opening balance",
                    'amount' => $PMB,
                    'side' => $pside,
                    'index' => $index
                    ];
            array_push($final_ledger, $data);
            if($pside == "debit"){
                $debitamt = $PMB;
                $creditamt = 0;
            }
            else if($pside == "credit"){
                $debitamt = 0;
                $creditamt = $PMB;
            }
            else{
                $debitamt = 0;
                $creditamt = 0;
            }
            $j = $i;
            if(isset($ledger[$j+1])){
                while($ledger[$j]->index == $index){
                    if($ledger[$j]->side == "debit"){
                        $debitamt += $ledger[$j]->amount;
                    }
                    if($ledger[$j]->side == "credit"){
                        $creditamt += $ledger[$j]->amount;
                    }
                    array_push($final_ledger, $ledger[$j]);
                    $j++;
                    $i = $j-1;
                    if($j == count($ledger))break;
                }
            }
            else{
                if($ledger[$j]->side == "debit"){
                        $debitamt += $ledger[$j]->amount;
                }
                if($ledger[$j]->side == "credit"){
                    $creditamt += $ledger[$j]->amount;
                }
                array_push($final_ledger, $ledger[$j]);
            }
            if($debitamt > $creditamt){
                $CMB = $debitamt - $creditamt;
                $side = "debit";
            }
            else if($debitamt < $creditamt){
                $CMB = $creditamt - $debitamt;
                $side = "credit";
            }
            else{
                $CMB = 0;
                $side = null;
            }
            $data = ['date' => $date,
                    'particulars' => "Closing balance",
                    'amount' => $CMB,
                    'side' => $side,
                    'index' => $index
                    ];
            array_push($final_ledger, $data);
            $test = AddLedgerBalance($month[1], $CMB, $side, $categ);
            $ledger_balance[$index] = $test;
        }
        // *****create final ledger data and calculate ledger balances for trial balance ends*****
        return array($final_ledger, $ledger_balance, $ledger_accounts, $month);
    }	
}





if (!function_exists('AddLedgerBalance')) {
    function AddLedgerBalance($month, $amount, $side, $categ){
        $m = $month; $amt = $amount; $s = $side; $cat = $categ;
        $arr = array($m => (object)[
                                        "amount" => $amt,
                                        "side" => $s,
                                        "category" => $cat
                                       ]);
		return $arr;
    }
}




if (!function_exists('CreateIncomeStatementData')) {
    function CreateIncomeStatementData(){
        $sales_data = DB::table('sales_details AS sd')
        ->select(DB::raw('sd.quantity*sd.rate AS sales_amount'), DB::raw('sd.quantity*sd.cost_price AS cost_of_sales'))
        ->orderBy('sd.id')
        ->get();

        //calculate total_sales and total_cost_of_sales....
        $total_sales = 0;
        $cost_of_sales = 0;
        for($i = 0; $i < count($sales_data); $i++){
            $total_sales += $sales_data[$i]->sales_amount;
            $cost_of_sales += $sales_data[$i]->cost_of_sales;
        }
        //create data for sales_return.....

        //create data for sales_return.....

        //create data for expenses....
        $ledgerData = CreateLedgerAccountsData();
        $ledger_balance = $ledgerData[1];
        $ledger_accounts = $ledgerData[2];
        $month = $ledgerData[3];

        $direct_expenses = array();
        $indirect_expenses = array();
        $incomes = array();
        for($i = 0; $i < count($ledger_accounts); $i++){
        	if($ledger_balance[$ledger_accounts[$i]][$month[1]]->category == "Direct Expenses"){
        		$data = (object)[
        			"account" => $ledger_accounts[$i],
        			"amount" => $ledger_balance[$ledger_accounts[$i]][$month[1]]->amount
        		];
        		array_push($direct_expenses, $data);
        	}
        	if($ledger_balance[$ledger_accounts[$i]][$month[1]]->category == "Indirect Expenses"){
        		$data = (object)[
        			"account" => $ledger_accounts[$i],
        			"amount" => $ledger_balance[$ledger_accounts[$i]][$month[1]]->amount
        		];
        		array_push($indirect_expenses, $data);
        	}
        	if($ledger_balance[$ledger_accounts[$i]][$month[1]]->category == "Incomes"){
        		$data = (object)[
        			"account" => $ledger_accounts[$i],
        			"amount" => $ledger_balance[$ledger_accounts[$i]][$month[1]]->amount
        		];
        		array_push($incomes, $data);
        	}
        }
        //dd($total_sales, $cost_of_sales, $direct_expenses, $indirect_expenses, $incomes);	
        return array($total_sales, $cost_of_sales, $direct_expenses, $indirect_expenses, $incomes);
    }
}




if (!function_exists('CreateBalanceSheetData')) {
    function CreateBalanceSheetData(){
        
    }
}