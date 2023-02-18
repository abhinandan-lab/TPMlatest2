<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserInfo extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id' => [
                    'type' => 'INT',
                    'constraint' => 20,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ],

            'fname' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],

            'lname' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],
            
            'dob' => [
                'type' => 'DATE',
                'null' => true,
            ],
            
            'profile_for' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            
            'language' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],

            
            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],

            'highest_qualification' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],

             'height' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],

            'weight' => [
                'type' => 'INT',
                'constraint' => 4,
                'null' => true,
            ],

            'location_country' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],

            'location_state' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],

            'location_city' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],

            'occupation' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],

            'hobbies' => [
                'type' => 'VARCHAR',
                'constraint' => 5000,
                'null' => true,
            ],

            'about_me' => [
                'type' => 'text',
                'null' => true,
            ],

            'whatsapp_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'baptized' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],

            'user_id' => [
                'type' => 'INT',
                'constraint' => 15,
            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',

        ]);

        $db = db_connect();

        $this->forge->addKey('id', true);
        $this->forge->createTable('user_info');

        // $db->query("ALTER TABLE `user_info` ADD FOREIGN KEY ('user_id') REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION;");
        $db->query("ALTER TABLE `user_info` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION; ");

    }

    public function down()
    {
        $this->forge->dropTable('user_info');
    }
}
