# Formation IMIE - MVC

## Redirection .htacess vers le controlleur frontal (index.php)

Le fichier .htaccess permet de rediriger toutes les requ�tes du client faites sur le serveur, et d'�x�cuter un seul fichier PHP (index.php) 
dans lequel nous pouvons traiter la requ�te.

Le routeur va s'occuper de "dispatcher" la requ�te vers le controlleur qui correspond.

## Cr�ation d'un MVC (Model/View/Controller)

L'objectif du pattern MVC est d'organiser le code, en s�parant le Mod�le (Donn�es) � la Vue (ce qui est renvoy� au client)

Le controller s'occupe de faire la jonction entre le Mod�le et la Vue.

C'est lui qui est responsable de r�cup�rer les donn�es n�cessaires � la Vue depuis le Mod�le.

Le controlleur va donc int�rroger le Mod�le (Donn�es) et renvoyer le r�sultat � la vue.

## Autoload avec composer

Composer nous permet de s'affranchir de la commande php "require_once"

Plut�t que d'inclure les fichiers PHP n�cessaires au fonctionnement de notre application, on inclut seulement le fichier "./vendor/autoload.php" dans notre page, 
ce qui permet d'instancier une classe sans se soucier de l'inclusion correspondand.


Par exemple, si l'on d�finit dans le fichier "composer.json" :

```json
{
	...
	"autoload":{
    "psr-4":{
      "App\\" : "src/"
    }
  }
}
```

et que l'on �xecute la ligne de commande "composer dump-autoload", Composer s'occupe de g�n�rer un fichier "autoload.php" qui va permettre d'instancer nos classes.

Si l'on essaie d'instancier la classe App\Controller\ArticleController de la mani�re suivante :


```PHP

$articleController = new \App\Controller\ArticleController();

```

Alors, php va chercher un fichier ArticleController.php contenu dans le dossier "./src/Controller/ArticleController.php"