<?php

class FormSettingSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('checkout_form_settings')->delete();
        $options = array('Title', 'Name', 'Email', 'Phone', 'Company', 'Address', 'Country', 'State', 'City', 'Zip');
        for ($i = 0; $i < sizeof($options); $i++) {
            FormSetting::create(array('options' => $options[$i]));
        }
    }

}
