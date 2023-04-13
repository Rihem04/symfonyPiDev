<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411155528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C2E149425');
        $this->addSql('DROP TABLE test');
        $this->addSql('ALTER TABLE cours CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL, CHANGE cours_name cours_name VARCHAR(255) DEFAULT NULL, CHANGE nom_tuteur nom_tuteur VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT NULL, CHANGE occurence occurence INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, id_cours_id INT NOT NULL, contenu_test VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, test_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, note DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_D87F7E0C2E149425 (id_cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C2E149425 FOREIGN KEY (id_cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE cours CHANGE id_user_id id_user_id INT NOT NULL, CHANGE contenu contenu VARCHAR(255) NOT NULL, CHANGE cours_name cours_name VARCHAR(255) NOT NULL, CHANGE nom_tuteur nom_tuteur VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE occurence occurence INT NOT NULL');
    }
}
