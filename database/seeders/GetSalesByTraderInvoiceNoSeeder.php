<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GetSalesByTraderInvoiceNoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('get_sales_by_trader_invoice_no')->insert([
            'id' => 2137,
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
            'taxableAmtA' => 0.00000000,
            'taxableAmtB' => 0.00000000,
            'taxableAmtC' => 0.00000000,
            'taxableAmtD' => 0.00000000,
            'taxRateA' => 0.00000000,
            'taxRateB' => 0.00000000,
            'taxRateC' => 0.00000000,
            'taxRateD' => 0.00000000,
            'taxAmtA' => 0.00000000,
            'taxAmtB' => 0.00000000,
            'taxAmtC' => 0.00000000,
            'taxAmtD' => 0.00000000,
            'totalTaxableAmt' => 10000.00000000,
            'totalTaxAmt' => 0.00000000,
            'totalAmt' => 10000.00000000,
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
            'createdDate' => '2024-03-15 10:49:06',
            'isKRASynchronized' => true,
            'kraSynchronizedDate' => '2024-03-15 10:49:06',
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
            'qrCodeURL' => null
        ]);
    }
}