<?php

use Illuminate\Database\Seeder;
use App\Models\GetSalesByTraderInvoiceNo; 

class GetSalesByTraderInvoiceNoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GetSalesByTraderInvoiceNo::create([
            'trderInvoiceNo' => '10',
            'invoiceNo' => 1023,
            'orgInvoiceNo' => 0,
            'customerTin' => 'A123456789B',
            'customerName' => 'Mark123',
            'receptTypeCode' => 'S',
            'paymentTypeCode' => '01',
            'salesSttsCode' => '02',
            'confirmDate' => '20240315104905',
            'salesDate' => '20240315',
            'stockReleaseDate' => '20240315104905',
            'cancelReqDate' => null,
            'cancelDate' => null,
            'refundDate' => null,
            'refundReasonCd' => null,
            'totalItemCnt' => 1,
            'taxableAmtA' => 0,
            'taxableAmtB' => 0,
            'taxableAmtC' => 0,
            'taxableAmtD' => 0,
            'taxRateA' => 0,
            'taxRateB' => 0,
            'taxRateC' => 0,
            'taxRateD' => 0,
            'taxAmtA' => 0,
            'taxAmtB' => 0,
            'taxAmtC' => 0,
            'taxAmtD' => 0,
            'totalTaxableAmt' => 10000,
            'totalTaxAmt' => 0,
            'totalAmt' => 10000,
            'prchrAcptcYn' => 'Y',
            'remark' => '',
            'regrNm' => 'Admin',
            'regrId' => 'Admin',
            'modrNm' => 'Admin',
            'modrId' => 'Admin',
            'receipt_CustomerTin' => 'A123456789B',
            'receipt_CustomerMblNo' => '0987654323',
            'receipt_RptNo' => null,
            'receipt_RcptPbctDt' => '20240315',
            'receipt_TrdeNm' => '',
            'receipt_Adrs' => '',
            'receipt_TopMsg' => '',
            'receipt_BtmMsg' => '',
            'receipt_PrchrAcptcYn' => 'Y',
            'createdDate' => '3/15/2024 10:49:06 AM',
            'isKRASynchronized' => true,
            'kraSynchronizedDate' => '3/15/2024 10:49:06 AM',
            'isStockIOUpdate' => false,
            'resultCd' => '000',
            'resultMsg' => 'Successful',
            'resultDt' => '20240315104908',
            'response_CurRcptNo' => 1051,
            'response_TotRcptNo' => 1051,
            'response_IntrlData' => 'AEFZMBI2BUZVGNSECN55MRSBHE',
            'response_RcptSign' => '65DF4JIVRNMPP4RL',
            'response_SdcDateTime' => '20240315104908',
            'response_SdcId' => null,
            'response_MrcNo' => null,
            'qrCodeURL' => null,
        ]);
    }
}