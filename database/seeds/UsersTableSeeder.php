<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $admin = new User();
      $admin->name = 'Admin Test';
      $admin->email = 'admin@test.com';
      $admin->password = bcrypt('admindemo');
      $admin->admin = 1;
      $admin->created_at = date("Y-m-d H:i:s");
      $admin->updated_at = date("Y-m-d H:i:s");
      $admin->save();

      $customer = new User();
      $customer->name = 'Customer Test';
      $customer->email = 'customer@test.com';
      $customer->password = bcrypt('customer');
      $customer->admin = 0;
      $customer->created_at = date("Y-m-d H:i:s");
      $customer->updated_at = date("Y-m-d H:i:s");
      $customer->save();

      $another_customer = new User();
      $another_customer->name = 'Customer2 Test';
      $another_customer->email = 'customer2@test.com';
      $another_customer->password = bcrypt('customer');
      $another_customer->admin = 0;
      $another_customer->created_at = date("Y-m-d H:i:s");
      $another_customer->updated_at = date("Y-m-d H:i:s");
      $another_customer->save();
    }
}
