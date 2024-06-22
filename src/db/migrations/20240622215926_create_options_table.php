<?php

declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class CreateOptionsTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('options');
        $table->addColumn('name', 'string')
            ->addColumn('value', 'text', ['limit' => MysqlAdapter::TEXT_MEDIUM])
            ->create();
    }

    public function down()
    {
        $this->table('options')->drop()->save();
    }
}
