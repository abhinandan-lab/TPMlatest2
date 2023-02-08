<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id' => [
                    'type' => 'INT',
                    'constraint' => 15,
                    'auto_increment' => TRUE
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],

            
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'otpdata' => [
                'type' => 'VARCHAR',
                'constraint' => 512,
                'null' => true,
            ],

            
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 1024,
            ],

            
            'account_status' => [
                'type' => 'INT',
                'constraint' => 2
            ],

            
            'email_verified' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => true,
            ],

            'account_type' => [
                'type' => 'INT',
                'constraint' => 2
            ],


            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
