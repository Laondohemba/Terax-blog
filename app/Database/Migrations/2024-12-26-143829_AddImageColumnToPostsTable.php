<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageColumnToPostsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'body'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('posts', 'image');
    }
}
