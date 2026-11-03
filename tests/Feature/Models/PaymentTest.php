<?php

use App\Enums\PaymentStatus;
use App\Enums\UserRole;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('keeps account_no as a string without losing leading zeros', function () {
    $accountNo = '0012345678901234567890';

    $payment = Payment::factory()->create(['account_no' => $accountNo]);

    expect($payment->fresh()->account_no)->toBe($accountNo);
});

it('records the operator who verified an approved payment', function () {
    $payment = Payment::factory()->approved()->create();

    expect($payment->verifier->role)
        ->toBe(UserRole::Operator)
        ->and($payment->verifier->verifiedPayments->first()->is($payment))
        ->toBeTrue();
});

it('guards status, verified_by, and verified_at against mass assignment', function () {
    $payment = new Payment([
        'booking_id' => 1,
        'receipt_no' => 'REC-12345',
        'account_no' => '001234567890',
        'proof_path' => 'payments/proof.jpg',
        'transferred_at' => '2026-11-03 10:00:00',
        'status' => PaymentStatus::Approved,
        'verified_by' => 999,
        'verified_at' => now(),
    ]);

    expect($payment->booking_id)->toBe(1)
        ->and($payment->receipt_no)->toBe('REC-12345')
        ->and($payment->account_no)->toBe('001234567890')
        ->and($payment->proof_path)->toBe('payments/proof.jpg')
        ->and($payment->status)->toBeNull()
        ->and($payment->verified_by)->toBeNull()
        ->and($payment->verified_at)->toBeNull();
});
