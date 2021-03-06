<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoryBook extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $categoryBook = $this->table('category_book', ['id' => false]);
        $categoryBook->addColumn('book_id', 'integer')
                     ->addColumn('category_id', 'integer')
                     ->addForeignKey('book_id', 'book', 'id')
                     ->addForeignKey('category_id', 'category', 'id')
                     ->create();
    }
}
