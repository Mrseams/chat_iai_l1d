Bonjour mes amis devs, ce petit projet devrait vous aidez dans la compréhension des bases de données couplée avec le langage PHP.
le code ci-dessus et assez clair ( enfin je crois)
et avec pas mal de commentaires (beaucoup trop même) et en anglais (désolé pour le unilinuiste français)
bon après le téléchargement du code, 

1) si vous utiliser wampserver copier le dossier dézippé dans le répertoire www de wampserver (EX: c:/wamp64/www/)  
2) si vous utiliser xamp copier le dossier dans le répertoire htdocs qui se trouve dans le répertoire d'installation de xampserver
généralement dans le disque système (EX: c:/xamp/htdocs/)
3) a la racine du dossier que vous venez de télécharger vous pouvez voir un fichier blog_l1D.sql, ouvrez phpMyadmin dans l'interface web de wampserver/xampserver:
	a. cliquez sur "créer une nouvelle base de données" nommée la de préférence du même nom que la base de données
	b. ensuite ouvrer la et cliquez sur l'onglet "importé";
	c. localisez le fichier SQL blog_l1D.sql puis c'est "suivant" jusqu'à la fin de l'opération
4) toujours a la racine du dossier du projet ce trouve le fichier DB.php. c'est ce dernier qui comprend les configurations pour la base de données,
il est assez bien documenté (enfin je crois). modifié pour l'adapter à votre situation
5) a l'heure actuelle 14/04/2022 : 8H31 il existe 2 utilisateurs:
	   [
		{
			Username : 'mrseams'
	         	password: 'aaa'
		},
		{ 
			username: 'seamson'
			password: 'aa'
		}
	   ]

6) il est possible que vous remontrer une erreur du genre: could not find driver:
	a. sur l'icône de wampserver dans la base de tâches, fait un clic gauche
	b. allez szur PHP puis sur php.ini et ouvrer le;
	c. recherche PDO et decommenté la ligne, ceci se fait en enlevant le point-virgule au début de la ligne
	d. En registrer et redémarrer wampserver. C’est toute la procédure est silimmialaire sur xampServer.

Pour toute autre préoccupation, mais pas que, écrivez-moi a mrseams@outlook.fr;
Sur ce, BON CODAGE ENJOY !!!