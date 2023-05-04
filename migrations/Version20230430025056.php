<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230430025056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_offre (id INT AUTO_INCREMENT NOT NULL, id_demande_id INT DEFAULT NULL, reponse_demande VARCHAR(255) NOT NULL, id_freelance INT NOT NULL, UNIQUE INDEX UNIQ_595805462563DECF (id_demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_offre ADD CONSTRAINT FK_595805462563DECF FOREIGN KEY (id_demande_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE offre_demande DROP FOREIGN KEY FK_8A4FA4852563DECF');
        $this->addSql('DROP TABLE offre_demande');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offre_demande (id INT AUTO_INCREMENT NOT NULL, id_demande_id INT DEFAULT NULL, reponse_demande VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, id_freelance INT NOT NULL, UNIQUE INDEX UNIQ_8A4FA4852563DECF (id_demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE offre_demande ADD CONSTRAINT FK_8A4FA4852563DECF FOREIGN KEY (id_demande_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE demande_offre DROP FOREIGN KEY FK_595805462563DECF');
        $this->addSql('DROP TABLE demande_offre');
    }
}
