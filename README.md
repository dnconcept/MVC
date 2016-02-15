# Formation IMIE - MVC

## Redirection .htacess vers le controlleur frontal (index.php)

Le fichier .htaccess permet de rediriger toutes les requêtes du client faites sur le serveur, et d'éxécuter un seul fichier PHP (index.php) 
dans lequel nous pouvons traiter la requête.

Le routeur va s'occuper de "dispatcher" la requête vers le controlleur qui correspond.

## Création d'un MVC (Model/View/Controller)

L'objectif du pattern MVC est d'organiser le code, en séparant le Modèle (Données) à la Vue (ce qui est renvoyé au client)

Le controller s'occupe de faire la jonction entre le Modèle et la Vue.

C'est lui qui est responsable de récupérer les données nécessaires à la Vue depuis le Modèle.

Le controlleur va donc intérroger le Modèle (Données) et renvoyer le résultat à la vue.

## Autoload avec composer

Composer nous permet de s'affranchir de la commande php "require_once"

Plutôt que d'inclure les fichiers PHP nécessaires au fonctionnement de notre application, on inclut seulement le fichier "./vendor/autoload.php" dans notre page, 
ce qui permet d'instancier une classe sans se soucier de l'inclusion correspondand.


Par exemple, si l'on définit dans le fichier "composer.json" :

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

et que l'on éxecute la ligne de commande "composer dump-autoload", Composer s'occupe de générer un fichier "autoload.php" qui va permettre d'instancer nos classes.

Si l'on essaie d'instancier la classe App\Controller\ArticleController de la manière suivante :


```PHP

$articleController = new \App\Controller\ArticleController();

```

Alors, php va chercher un fichier ArticleController.php contenu dans le dossier "./src/Controller/ArticleController.php"