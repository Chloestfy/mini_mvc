<?php
class UserController
{
    private $userDao;

    public function __construct($userDao)
    {
        $this->userDao = $userDao;
    }

    public function displayAllUsers()
    {
        $users = $this->userDao->getAllUsers();
        require_once __DIR__ . '/../view/userView.php';
    }

    public function displayUserProfile(int $id)
    {
        $user = $this->userDao->getUserById($id);
        if (!$user) {
            echo "Utilisateur non trouvé";
            return;
        }
        require_once __DIR__ . '/../view/userProfileView.php';
    }

    public function deleteUser(int $id)
    {
        $success = $this->userDao->deleteUserById($id);
        if ($success) {
            echo "Utilisateur supprimé.<br>";
        } else {
            echo "Échec de la suppression.<br>";
        }

        $this->displayAllUsers();
    }
    public function addUser(array $data)
    {
        $nom = trim($data['nom']);
        $prenom = trim($data['prenom']);

        if ($nom && $prenom) {
            $this->userDao->insertUser($nom, $prenom);
            echo "Utilisateur ajouté avec succès.<br>";
        } else {
            echo "Données invalides.";
        }

        $this->displayAllUsers();
    }
}
