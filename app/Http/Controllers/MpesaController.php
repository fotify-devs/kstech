<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MpesaTransaction;
use Iankumu\Mpesa\Facades\Mpesa;

class MpesaController extends Controller
{
    public function initiateSTKPush(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'phone_number' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'account_reference' => 'nullable|string'
        ]);

        try {
            // Initiate STK Push
            $response = Mpesa::stkpush(
                $validated['phone_number'], 
                $validated['amount'], 
                $validated['account_reference'] ?? 'Payment'
            );

            // Store initial transaction details
            $transaction = MpesaTransaction::create([
                'merchant_request_id' => $response['MerchantRequestID'],
                'checkout_request_id' => $response['CheckoutRequestID']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'STK Push Initiated',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        // Check if transaction was successful
        if (isset($payload['Body']['stkCallback']['ResultCode']) && $payload['Body']['stkCallback']['ResultCode'] == 0) {
            $callbackMetadata = $payload['Body']['stkCallback']['CallbackMetadata']['Item'];

            // Extract transaction details
            $transactionDetails = [];
            foreach ($callbackMetadata as $item) {
                $transactionDetails[$item['Name']] = $item['Value'];
            }

            // Update transaction in database
            $transaction = MpesaTransaction::where('checkout_request_id', $payload['Body']['stkCallback']['CheckoutRequestID'])
                ->first();

            if ($transaction) {
                $transaction->update([
                    'result_desc' => $payload['Body']['stkCallback']['ResultDesc'],
                    'result_code' => $payload['Body']['stkCallback']['ResultCode'],
                    'amount' => $transactionDetails['Amount'] ?? null,
                    'mpesa_receipt_number' => $transactionDetails['MpesaReceiptNumber'] ?? null,
                    'transaction_date' => $transactionDetails['TransactionDate'] ?? null,
                    'phone_number' => $transactionDetails['PhoneNumber'] ?? null
                ]);
            }

            return response()->json([
                'ResultCode' => 0,
                'ResultDesc' => 'Success'
            ]);
        }

        return response()->json([
            'ResultCode' => 1,
            'ResultDesc' => 'Failed'
        ]);
    }

    public function queryTransactionStatus($checkoutRequestId)
    {
        try {
            $response = Mpesa::stkquery($checkoutRequestId);
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
