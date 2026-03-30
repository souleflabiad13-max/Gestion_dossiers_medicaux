<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit();
}
?>

<nav>
    <ul>
        <?php if($_SESSION['role'] == 'admin'){ ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="patients.php">Patients</a></li>
            <li><a href="ajouter_patient.php">Ajouter Patient</a></li>

        <?php } elseif($_SESSION['role'] == 'medecin'){ ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="consultations.php">Consultations</a></li>

        <?php } elseif($_SESSION['role'] == 'patient'){ ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="mes_consultations.php">Mes Consultations</a></li>
        <?php } ?>

        <li><a href="../logout.php">Logout</a></li>
    </ul>
</nav>