<?php
include_once("../classes/Utilisateur.php");
include_once("../classes/Membre.php");
include_once("../classes/Entraineur.php");
include_once("../classes/PersonnelAdministratif.php");
include_once("../classes/Admin.php");
include_once("../classes/Rapport.php");
include_once("../classes/Transaction.php");
include_once("../classes/SceanceEntrainement.php");
include_once("../classes/Club.php");
include_once("../classes/Evenement.php");


include_once("../backend/dataBaseConnection.php");

function loadUsers(){
    global $db; 
    $users = array();
    $query = $db->prepare("SELECT * FROM user");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        // Check if the value is null or not
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        // Create DateTime object only if the value is not null
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        // Check if the value is null or not
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        
        $utilisateur = new Utilisateur($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $users[] = $utilisateur; 
    }
    return $users;
}
function loadMembers(){
    global $db; 
    $members = array();
    $query = $db->prepare("SELECT * FROM member INNER JOIN user on user.id_user = member.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        // Check if the value is null or not
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        // Create DateTime object only if the value is not null
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        // Check if the value is null or not
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        
        $member = new Membre($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $members[] = $member; 
    }
    return $members;
}

function loadTrainers(){
    global $db; 
    $entraineurs = array();
    $query = $db->prepare("SELECT * FROM entraineur INNER JOIN user on user.id_user = entraineur.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $specialitee = isset($row['specialite']) ? $row['specialite'] : '';
        $niveauDeQualification = isset($row['niveauDeQualification']) ? $row['niveauDeQualification'] : '';
        
        // Assuming Entraineur is the correct class for trainers
        $entraineur = new Entraineur($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone, $specialitee, $niveauDeQualification);
        $entraineurs[] = $entraineur; 
    }
    return $entraineurs;
}

function loadPersonnelsAdministratifs(){
    global $db; 
    $personnelsAdministratifs = array();
    $query = $db->prepare("SELECT * FROM personneladministratif INNER JOIN user on user.id_user = personneladministratif.id_utilisateur ");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $fonction = isset($row['fonction']) ? $row['fonction'] : '';
        // Convert 'dateEmbauche' to DateTime if not null
        $dateEmbauche = isset($row['dateEmbauche']) ? new DateTime($row['dateEmbauche']) : null;
        // Ensure that 'salaire' is correctly typed
        $salaire = isset($row['salaire']) ? (float)$row['salaire'] : 0.0;

        // Create an instance of PersonnelAdministratif
        $personnel = new PersonnelAdministratif($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone,  $fonction,  $dateEmbauche,  $salaire);
        $personnelsAdministratifs[] = $personnel; 
    }
    return $personnelsAdministratifs;
}

function loadAdmins(){
    global $db; 
    $Admins = array();
    $query = $db->prepare("SELECT * FROM admin INNER JOIN personneladministratif on admin.id_personneladministratif = personneladministratif.id_personnelAdministratif inner join user on user.id_user = personneladministratif.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $fonction = isset($row['fonction']) ? $row['fonction'] : '';
        
        // Convert 'dateEmbauche' to DateTime if not null
        $dateEmbauche = isset($row['dateEmbauche']) ? new DateTime($row['dateEmbauche']) : null;
        
        // Ensure that 'salaire' is correctly typed
        $salaire = isset($row['salaire']) ? (float)$row['salaire'] : 0.0;

        // Create an instance of PersonnelAdministratif
        $admin = new Admin($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone,  $fonction,  $dateEmbauche,  $salaire);
        $Admins[] = $admin; 
    }
    return $Admins;
}

function loadRapports(){
    global $db; 
    $rapports = array();
    $query = $db->prepare("SELECT * FROM rapport INNER JOIN user ON user.id_user = rapport.auteur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        // Check if the value is null or not
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        // Create DateTime object only if the value is not null
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        // Check if the value is null or not
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';
        $dateString = isset($row['date']) ? $row['date'] : '';
        $contenu = isset($row['contenu']) ? $row['contenu'] : '';
        
        // Convert the date string to a DateTime object
        $date = new DateTime($dateString);

        $auteur = new Utilisateur($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $rapport = new Rapport($date, $contenu, $auteur);
        $rapports[] = $rapport; 
    }
    return $rapports;
}


function loadTransactions(){
    global $db; 
    $transactions = array();
    $query = $db->prepare("SELECT * FROM transaction INNER JOIN member ON member.id_membre = transaction.id_membre INNER JOIN user ON user.id_user = member.id_utilisateur");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $prenom = isset($row['prenom']) ? $row['prenom'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $motDePasse = isset($row['motDePasse']) ? $row['motDePasse'] : '';
        $dateDeNaissance = isset($row['dateDeNaissance']) ? new DateTime($row['dateDeNaissance']) : null;
        $numDeTelephone = isset($row['numDeTelephone']) ? $row['numDeTelephone'] : '';

        // Check if the necessary keys exist in the row
        $id = isset($row['id_transaction']) ? $row['id_transaction'] : '';
        $montant = isset($row['montant']) ? $row['montant'] : '';
        $date = isset($row['date']) ? new DateTime($row['date']) : null;
        $methode = isset($row['methode']) ? $row['methode'] : '';
        // Convert the date string to a DateTime object
        $status = isset($row['status']) ? $row['status'] : '';
        $type = isset($row['type']) ? $row['type'] : '';
        
        // Assuming you have an $auteur object available here
        $auteur = new Membre($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        
        $transaction = new Transaction($id , $montant, $auteur,$date, $methode ,$status, $type);

        $transactions[] = $transaction; 
    }
    return $transactions;
}


function loadSeanceEntrainements(){
    global $db; 
    $seancesEntrainement = array();
    $query = $db->prepare("SELECT * FROM sceanceentrainement");
    // id_SeanceEntrainement	date	lieu	exercices	entraineur
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $date = isset($row['date']) ? new DateTime($row['date']) : null;
        $lieu = isset($row['lieu']) ? $row['lieu'] : '';
        $exercices = isset($row['exercices']) ? $row['exercices'] : '';
        $entraineurId = isset($row['entraineur']) ? $row['entraineur'] : '';

        // Fetch the entraineur for the session
        $queryEntraineur = $db->prepare("SELECT * FROM entraineur inner join user on user.id_user = entraineur.id_utilisateur WHERE id_entraineur = :id_entraineur ");
        $queryEntraineur->bindValue(':id_entraineur', $entraineurId, PDO::PARAM_INT);

        $queryEntraineur->execute();
        $rowEntraineur = $queryEntraineur->fetch(PDO::FETCH_ASSOC);
        
        $nom = isset($rowEntraineur['nom']) ? $rowEntraineur['nom'] : '';
        $prenom = isset($rowEntraineur['prenom']) ? $rowEntraineur['prenom'] : '';
        $email = isset($rowEntraineur['email']) ? $rowEntraineur['email'] : '';
        $motDePasse = isset($rowEntraineur['motDePasse']) ? $rowEntraineur['motDePasse'] : '';
        $dateDeNaissance = isset($rowEntraineur['dateDeNaissance']) ? new DateTime($rowEntraineur['dateDeNaissance']) : null;
        $numDeTelephone = isset($rowEntraineur['numDeTelephone']) ? $rowEntraineur['numDeTelephone'] : '';
        $specialite = isset($rowEntraineur['specialite']) ? $rowEntraineur['specialite'] : '';
        $niveauDeQualification = isset($rowEntraineur['niveauDeQualification']) ? $rowEntraineur['niveauDeQualification'] : '';

        $entraineur = new Entraineur($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone,$specialite,$niveauDeQualification);

        $seanceEntrainement = new SceanceEntrainement($date, $lieu, $entraineur, $exercices);
        $seancesEntrainement[] = $seanceEntrainement; 
    }
    return $seancesEntrainement;
}

function loadEvenemets(){
    global $db; 
    $evenements = array();
    $query = $db->prepare("SELECT * FROM evenement");
    // id_Evenement	nom	date	lieu	description	
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        // Check if the necessary keys exist in the row
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $date = isset($row['date']) ? new DateTime($row['date']) : null;
        $lieu = isset($row['lieu']) ? $row['lieu'] : '';
        $description = isset($row['description']) ? $row['description'] : '';
        
        // Fetch participants for the event
        $participants = array();
        $query2 = $db->prepare("SELECT * FROM participationevenements INNER JOIN member ON member.id_membre = participationevenements.id_participant INNER JOIN user ON user.id_user = member.id_utilisateur WHERE id_evenement = :id_evenement");
        $query2->bindValue(':id_evenement', $row['id_Evenement'], PDO::PARAM_INT);
        $query2->execute();
        $rowsParticipants = $query2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rowsParticipants as $participantRow) {
            $nom = isset($participantRow['nom']) ? $participantRow['nom'] : '';
            $prenom = isset($participantRow['prenom']) ? $participantRow['prenom'] : '';
            $email = isset($participantRow['email']) ? $participantRow['email'] : '';
            $motDePasse = isset($participantRow['motDePasse']) ? $participantRow['motDePasse'] : '';
            $dateDeNaissance = isset($participantRow['dateDeNaissance']) ? new DateTime($participantRow['dateDeNaissance']) : null;
            $numDeTelephone = isset($participantRow['numDeTelephone']) ? $participantRow['numDeTelephone'] : '';
            $participant = new Utilisateur($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
            $participants[] = $participant;
        }
        
        // Create the Evenement object
        $evenement = new Evenement($nom, $date, $lieu, $description, $participants);
        // Add Evenement object to the array
        $evenements[] = $evenement; 
    }
    return $evenements;
}

function loadClub(){
    global $db; 

    $query = $db->prepare("SELECT * FROM club");
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC); // Use fetch() instead of fetchAll() to get only one row
    if ($row) {
        $nom = isset($row['nom']) ? $row['nom'] : '';
        $adresse = isset($row['adresse']) ? $row['adresse'] : '';
        $membres = loadMembers(); 
        $evenements = loadEvenemets();
        $entraineurs = loadTrainers(); 
        $club = new Club($nom, $adresse, $membres, $evenements, $entraineurs);

        return $club;
    }
}


?>
