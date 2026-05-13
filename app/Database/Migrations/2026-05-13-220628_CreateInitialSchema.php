<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInitialSchema extends Migration
{
    public function up()
    {
        $auditFields = [
            'id_usuario_creo'      => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'id_usuario_actualizo' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'id_usuario_elimino'   => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'created_at'           => ['type' => 'DATETIME', 'null' => true],
            'updated_at'           => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'           => ['type' => 'DATETIME', 'null' => true],
        ];

        // 1. Confederaciones
        $this->forge->addField(array_merge([
            'id'     => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nombre' => ['type' => 'VARCHAR', 'constraint' => 100],
        ], $auditFields));
        $this->forge->addKey('id', true);
        $this->forge->createTable('confederaciones');

        // 2. Paises
        $this->forge->addField(array_merge([
            'id'               => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nombre'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'confederacion_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
        ], $auditFields));
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('confederacion_id', 'confederaciones', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('paises');

        // 3. Categorias
        $this->forge->addField(array_merge([
            'id'     => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nombre' => ['type' => 'VARCHAR', 'constraint' => 100],
        ], $auditFields));
        $this->forge->addKey('id', true);
        $this->forge->createTable('categorias');

        // 4. Clubes
        $this->forge->addField(array_merge([
            'id'                 => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nombre'             => ['type' => 'VARCHAR', 'constraint' => 150],
            'escudo'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'pais_id'            => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'franquicia_raiz_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
        ], $auditFields));
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pais_id', 'paises', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('franquicia_raiz_id', 'clubes', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('clubes');

        // 5. Titulos
        $this->forge->addField(array_merge([
            'id'               => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nombre'           => ['type' => 'VARCHAR', 'constraint' => 150],
            'puntos'           => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0.00],
            'categoria_id'     => ['type' => 'INT', 'unsigned' => true],
            'pais_id'          => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'confederacion_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
        ], $auditFields));
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('categoria_id', 'categorias', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pais_id', 'paises', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('confederacion_id', 'confederaciones', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('titulos');

        // 6. Palmares (Historial de títulos por club)
        $this->forge->addField(array_merge([
            'id'              => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'club_id'         => ['type' => 'INT', 'unsigned' => true],
            'titulo_id'       => ['type' => 'INT', 'unsigned' => true],
            'temporada_anio'  => ['type' => 'VARCHAR', 'constraint' => 50],
        ], $auditFields));
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('club_id', 'clubes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('titulo_id', 'titulos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('palmares');
    }

    public function down()
    {
        $this->forge->dropTable('palmares', true);
        $this->forge->dropTable('titulos', true);
        $this->forge->dropTable('clubes', true);
        $this->forge->dropTable('categorias', true);
        $this->forge->dropTable('paises', true);
        $this->forge->dropTable('confederaciones', true);
    }
}