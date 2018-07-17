<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        // $this->call('UserTableSeeder');
        $this->call('RentalSettingSeeder');
        $this->call('PaymentSettingSeeder');
        $this->call('FormSettingSeeder');
        $this->command->info('Form Settings table seeded!');
    }

}
