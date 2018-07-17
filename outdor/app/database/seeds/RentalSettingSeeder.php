<?php

class RentalSettingSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('rental_settings')->delete();
        $options = array(
            array(
                'options' => 'calculate_rental_fee',
                'values' => 'dh',
            ),
            array(
                'options' => 'min_booking_length',
                'values' => '1',
            ),
            array(
                'options' => 'on_hold_pending',
                'values' => '1',
            ),
            array(
                'options' => 'rental_terms',
                'values' => 'dd your Booking Terms here.Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ),
        );
        for ($i = 0; $i < sizeof($options); $i++) {
            RentalSetting::create($options[$i]);
        }
    }

}
