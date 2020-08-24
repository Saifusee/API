<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
           
            $table->increments('id', true);
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('employees')->insert([
            [
                'fname' => 'Saiful',
                'lname' => 'Khan',
                'email' => 'saiful@admin.com',
                'status' => 1
            ],
            [
                'fname' => 'Gen',
                'lname' => 'Rufford',
                'email' => 'rufford@gen.com',
                'status' => 0
            ],
            [
                'fname' => 'Harry',
                'lname' => 'Potter',
                'email' => 'potter@harry.com',
                'status' => 0
            ],
            [
                'fname' => 'Ron',
                'lname' => 'Shepherd',
                'email' => 'shepherd@ron.com',
                'status' => 0
            ],
            [
                'fname' => 'Hermione',
                'lname' => 'Watson',
                'email' => 'watson@hermione.com',
                'status' => 1
            ],
            [
                'fname' => 'Drake',
                'lname' => 'Joseph',
                'email' => 'joseph@drake.com',
                'status' => 0
            ],
            [
                'fname' => 'Slytherin',
                'lname' => 'Weird',
                'email' => 'weird@slytherin.com',
                'status' => 0
            ],
            [
                'fname' => 'Dean',
                'lname' => 'winchester',
                'email' => 'winchester@dean.com',
                'status' => 1
            ],
            [
                'fname' => 'Stefan',
                'lname' => 'Salvatore',
                'email' => 'salvatore@stefan.com',
                'status' => 1
            ],
            [
                'fname' => 'Luther',
                'lname' => 'Swan',
                'email' => 'swan@luther.com',
                'status' => 0
            ],
       
        ]);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
