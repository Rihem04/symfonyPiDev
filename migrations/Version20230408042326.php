<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230408042326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande CHANGE id_client_id id_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE idEvenement idEvenement INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE offre CHANGE id_projet_id id_projet_id INT DEFAULT NULL, CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE idReclamation idReclamation INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE reponse_offre CHANGE id_demande_id id_demande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse_reclamation CHANGE idReponse idReponse INT AUTO_INCREMENT NOT NULL, CHANGE idReclamation idReclamation INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE idEvenement idEvenement INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test CHANGE id_cours_id id_cours_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv CHANGE id_user_id id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE demande CHANGE id_client_id id_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE idEvenement idEvenement INT NOT NULL');
        $this->addSql('ALTER TABLE offre CHANGE id_user_id id_user_id INT NOT NULL, CHANGE id_projet_id id_projet_id INT NOT NULL');
        $this->addSql('ALTER TABLE projet CHANGE id_user_id id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE idReclamation idReclamation INT NOT NULL');
        $this->addSql('ALTER TABLE reponse_offre CHANGE id_demande_id id_demande_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponse_reclamation CHANGE idReponse idReponse INT NOT NULL, CHANGE idReclamation idReclamation INT NOT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE idEvenement idEvenement INT NOT NULL');
        $this->addSql('ALTER TABLE test CHANGE id_cours_id id_cours_id INT NOT NULL');
    }
}
