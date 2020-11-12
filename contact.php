<?php

$titre_page = "Contact";

include("inc/header.php");
?>

<link rel="stylesheet" type="text/css" href="css/contact.css" />

<body>
    <br />
    <div class="container_contact">
        <div class="contact_gauche">
            <fieldset>
                <legend>Envoyer votre demande</legend>
                <form action="contacter.php" method="post">
                    <label for="nom">Nom :</label>
                    <input type="text" require name="nom" />

                    <label for="prenom">Prénom :</label>
                    <input type="text" require name="prenom" /><br />

                    <label for="mail">Mail :&nbsp;&nbsp;</label>
                    <input type="email" require name="mail" /><br /><br />

                    <label for="objet">Objet :</label>
                    <input type="text" require name="objet" /><br />

                    <label for="message">Message :</label>
                    <textarea name="message"></textarea><br /><br />

                    <input type="submit" value="Envoyer" />
                </form>
            </fieldset>
        </div>

        <div class="contact_droite">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg> 06.95.06.97.15<br />

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </svg> yhip.serfa@outlook.fr<br />

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="10" r="3" />
                <path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 1 0-16 0c0 3 2.7 6.9 8 11.7z" /></svg> 9 rue Icar, 67960 Entzheim<br /><br />
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21135.13592981444!2d7.6166489032028615!3d48.53530158941954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4796b430c5205beb%3A0xeba46d4b58f4a4d4!2sEntzheim!5e0!3m2!1sfr!2sfr!4v1575452849178!5m2!1sfr!2sfr" width="400" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
    <br />
</body>

<?php
include("inc/footer.php");
