<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210194114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game ADD player_id INT NOT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_232B318C99E6F5DF ON game (player_id)');
        $this->addSql('ALTER TABLE student ADD game_id INT NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_B723AF33E48FD905 ON student (game_id)');
        $this->addSql('ALTER TABLE user CHANGE is_validate is_validate TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C99E6F5DF');
        $this->addSql('DROP INDEX UNIQ_232B318C99E6F5DF ON game');
        $this->addSql('ALTER TABLE game DROP player_id');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33E48FD905');
        $this->addSql('DROP INDEX IDX_B723AF33E48FD905 ON student');
        $this->addSql('ALTER TABLE student DROP game_id');
        $this->addSql('ALTER TABLE user CHANGE is_validate is_validate TINYINT(1) NOT NULL');
    }
    public function isTransactional(): bool
    {
        return false;
    }
}
