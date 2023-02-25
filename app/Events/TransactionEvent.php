<?php

namespace App\Events;

use App\Models\BankAccount;
use App\Models\Transaction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class TransactionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($reference_id,$reference,$reason, $account, $date, $type = 'credit', $amount = 0.00, $status = 0,$transfer = false)
    {
        if($transfer == true){
            $this->bankAccountBalance($account, $amount, $type);
        }
        Transaction::create([
            'reference_id' => $reference_id,
            'reference_type' => $reference,
            'reason' => $reason,
            'date' => $date,
            'type' => $type,
            'bank_account_id' => $account,
            'amount' => $amount,
            'status' => $status
        ]);
    }

    
    public function bankAccountBalance($id, $amount, $type)
    {
        $bankAccount = BankAccount::find($id);
        if ($bankAccount) {
            if ($type == 'credit') {
                $oldBalance                   = (float)$bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance + (float)$amount;
            } elseif ($type == 'debit') {
                $oldBalance                   = (float)$bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance - (float)$amount;
            }
            $bankAccount->save();
        }
        return true;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
