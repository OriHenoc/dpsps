#AVOIR L'APPLICATION
cloner le projet, telecharger le dossier en fichier zip et decompresser

#CONFIGURATION DE L'ENVIRONNEMENT

##Installer php, apache et mysql

Pour cela je conseille d'installer une appication de serveur web PHP tout en un tel que WampServer ou Xamp. 

Lien du site officiel de WampServer : https://www.wampserver.com/fr
(Attention à suivre les instructions clairement définies sur le site avant de telecharger pour sa version (32bits ou 64bits)) 

##Après installation du serveur web :

Envoyer le dossier de travail dans le dossier source des applications. (Pour WampServer c'est le dossier ''www'' et pour Xamp c'est le dossier ''htdocs'') 


##Créer la base de donnée avec le nom exact : ''dpsps''

##Importer les données dans cette base de données à partir du fichier ''dpsps.sql'' présent dans le dossier ''db''

##Modifier le fichier de configuration ''connexion.php'' se trouvant dans le dossier ''config'' avec les informations de son environnement si cela ne correspond pas exactement à l'existant (nom d'utilisateur, mot de passe, hote et port)

##Lancer l'application à partir du navigateur avec le lien correspondant 
(Exemple : http://localhost/dpsps)


#UTILISATION DE L' APPLICATION

##Navigateur

L'application peut s'exécuter sur tout navigateur mais elle est parfaitement optimisée sur Google chrome. 

##Connexion

Par défaut il y'a déjà un utilisateur par rôle de l'application :

Le SuperAdmin => nom utilisateur : king

Le Directeur => nom utilisateur : hello

Le SousDirecteur de la sous direction S/D EAU ELECTRICITE, HYDROCARBURES...  => nom utilisateur : sdHC

Le Chef de Service du service HYDROCARBURES => nom utilisateur : csHC

Le Chargé d'Etude du service HYDROCARBURES => ceHC

NB : ils ont tous le meme mot de passe "hello"

##Remarques

Chaque utilisateur a une interface, des actions et des autorisations qui lui sont propres (exemple : seul le superAdmin peut ajouter ou bloquer des utilisateurs).

#A SAVOIR

L'application n'est pas encore mode production ainsi donc des process ne sont pas autorisés ou fonctionnels pour des raisons de test. 


##En tenir compte lors de la presentation pour eviter les surprises) : 

###Les courbes statistiques et les suivis dans le volet ''Rapport et Suivi'' sont figées

###Personne ne peut modifier les imputations d'un dossier deja créé et en cours d'execution

###Personne ne peut modifier la liaison entre une activité et son dossier

###Le statut de dossier n'est pas encore synchronisé au statut des activités

###Personne n'a encore le droit de supprimer ses notifications

###Certaines suppressions ne sont pas encore autorisées

#OBJECTIF ACTUEL

Faire une présentation simple en evitant le plus de faire des actions mais en expliquant plus les processus car les critiques seront utilisées pour matcher l'application aux besoins REELS lors de l'implementation de l'application en mode production

##Fonctionnalités en cours de developpement/amelioration :

###Les instructions definies lors de la création de dossier deviendront des activités

###Le tableau de bord affichera les statistiques personnelles et celles provenant des requetes soumises selon l'utilisateur connecté

###Le directeur pourra imputer au sous directeur qui lui imputera au chef de service qui lui aussi imputera à un chargé d'execution
