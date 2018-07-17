<?php

class PaymentSettingSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('payment_settings')->delete();
        $data = array(
            array(
                'options' => 'deposit_payment[]',
                'values' => 0,
                'values_2' => '%',
            ),
            array(
                'options' => 'tax_payment[]',
                'values' => 0,
                'values_2' => '%',
            ),
            array(
                'options' => 'insurance_payment[]',
                'values' => 0,
                'values_2' => '%',
            ),
            array(
                'options' => 'bank_account[]',
                'values' => 'Make your payment to HSBC bank Account: ABCD12345',
                'values_2' => NULL,
            ),
            array(
                'options' => 'cash_payment[]',
                'values' => 'yes',
                'values_2' => NULL,
            )
        );

        for ($i = 0; $i < sizeof($data); $i++) {
            PaymentSetting::create($data[$i]);
        }
    }

}
