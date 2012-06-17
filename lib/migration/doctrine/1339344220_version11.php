<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version11 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('annonce', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'categorie_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'titre' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '250',
             ),
             'texte' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '',
             ),
             'offre' => 
             array(
              'type' => 'boolean',
              'notnull' => '1',
              'default' => '1',
              'length' => '25',
             ),
             'ville' => 
             array(
              'type' => 'string',
              'length' => '',
             ),
             'prix' => 
             array(
              'type' => 'float',
              'length' => '',
             ),
             'departement_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'branche_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'debut' => 
             array(
              'type' => 'timestamp',
              'length' => '25',
             ),
             'fin' => 
             array(
              'type' => 'timestamp',
              'length' => '25',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->createTable('annonces_categorie', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '100',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->createTable('departement', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'num' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '2',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '50',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('annonce');
        $this->dropTable('annonces_categorie');
        $this->dropTable('departement');
    }
}