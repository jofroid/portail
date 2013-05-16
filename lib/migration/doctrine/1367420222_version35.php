<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version35 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('document', 'document_transaction_id_transaction_id', array(
             'name' => 'document_transaction_id_transaction_id',
             'local' => 'transaction_id',
             'foreign' => 'id',
             'foreignTable' => 'transaction',
             'onUpdate' => 'CASCADE',
             'onDelete' => '',
             ));
        $this->createForeignKey('document', 'document_auteur_sf_guard_user_id', array(
             'name' => 'document_auteur_sf_guard_user_id',
             'local' => 'auteur',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->createForeignKey('document', 'document_type_id_document_type_id', array(
             'name' => 'document_type_id_document_type_id',
             'local' => 'type_id',
             'foreign' => 'id',
             'foreignTable' => 'document_type',
             ));
        $this->addIndex('document', 'document_transaction_id', array(
             'fields' => 
             array(
              0 => 'transaction_id',
             ),
             ));
        $this->addIndex('document', 'document_auteur', array(
             'fields' => 
             array(
              0 => 'auteur',
             ),
             ));
        $this->addIndex('document', 'document_type_id', array(
             'fields' => 
             array(
              0 => 'type_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('document', 'document_transaction_id_transaction_id');
        $this->dropForeignKey('document', 'document_auteur_sf_guard_user_id');
        $this->dropForeignKey('document', 'document_type_id_document_type_id');
        $this->removeIndex('document', 'document_transaction_id', array(
             'fields' => 
             array(
              0 => 'transaction_id',
             ),
             ));
        $this->removeIndex('document', 'document_auteur', array(
             'fields' => 
             array(
              0 => 'auteur',
             ),
             ));
        $this->removeIndex('document', 'document_type_id', array(
             'fields' => 
             array(
              0 => 'type_id',
             ),
             ));
    }
}