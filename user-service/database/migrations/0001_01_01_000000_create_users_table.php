<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    protected $connection = 'mongodb';

    public function up()
    {
        Schema::create('users', function (Blueprint $collection) {
            $collection->id(); // Primary key as MongoDB `_id`
            $collection->string('name');
            $collection->string('email')->unique();
            $collection->string('password');
            $collection->timestamps();

            $collection->index(['name' => 'text']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
