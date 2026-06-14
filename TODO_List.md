- Creation DataBase MySQL
    - telechareger les donnees
    - installation

- Importation dans Github

- Connection PHP et Mysql
    - fonction.php (dbconnect())

- affichage
    - index.php (Menu Principal)
        - Utilisation Bootstrap (container,row,col,...)

        - Liens vers Liste Departements
            - fonction.php
                - requette affiche liste Departement (afficher_ListeDepartement())
                - ajout dans la requettte colonne Manager (JOIN ... ON EN SQL)
            - affichage.php (liste des departements)
                - tableau des liste Departement 
                - ajout colonne Mananger

        - Liens  sur les Departements vers Liste des Employees de ce departement
            - fonction.php
                - requette affiche listes des employees du departement afficheEmployee_Dept($dept_no) 
            - affichage.php  Listes des Employees du departement
                - tableau des liste listes Employee Departement (avec GET['depart'])

        - Liens sur Employee vers page fiche Employee
            - fonction.php
                - requette affiche fiche Employee (fiche_fiche_employe($employe_no))
                - ajout du historique Salaire au requette (JOIN ... ON EN SQL)
            - affichage fiche Employee
                - page fiche Employee (nom,prenom,departement,numeroEmploye) avec GET
                - ajout tableau historique salaire

        - Page formulaire de recherche
            - fonction.php
                - requette affiche recherche departement, nom employé, age min et max utiliser (LIKE, AND, OR EN SQL)
                - limiter par 20 lignes avec LIMIT avec SQl
            - affichage resultat recherche
                - tableau resultat du requette recherche
                - limit 20 lignes avec liens sur la meme page avec GET(nom,prenom,departement,numeroEmploye,plus20)
            

            

