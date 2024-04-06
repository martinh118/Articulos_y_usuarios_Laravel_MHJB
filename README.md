<h1>Practica 07 - LARAVEL - Martín H. Jaime Bonvin</h1>

<h2>Abans de començar...</h2>

<p>Abans de començar la correcció i execució de la pàgina web del projecte, és necessari executar les migracions configurades:</p>
<p>
En la carpeta /database/migrations haurien d'estar els següents arxius:
    - 2014_10_12_000000_create_users_table.php
    - 2014_10_12_100000_create_password_reset_tokens_table
    - 2014_10_12_100000_create_password_resets_table
    - 2019_08_19_000000_create_failed_jobs_table
    - 2019_12_14_000001_create_personal_access_tokens_table
    - create_articles_table.php

On es crearan les taules corresponents pel correcte funcionament de la web.</p>

<p>
Comanda a executar dins la carpeta del projecte: <b>php artisan migrate</b>

En el moment de preguntar si voldries crear la base de dades <b>'pr07_bbdd_mhjb'</b>, assegurar-se de seleccionar 'yes'
</p>

<p>Un cop realitzat la migració, accedir a la base de dades i executar l'arxiu d'importació ubicat a l'arxiu arrel del projecte <b>'import_BBDD_pr07_mhjb.sql'</b></p>

<p>A partir d'aquí es podrà accedir a la web amb les dades necessàries amb la ruta:
<b>http://practica07_mhjb.test</b> </p>

<h2>Accions habilitades a la web de la pràctica:</h2>

<h3>Visualitzar articles anonim</h3>


<h3> Registrar un usuari</h3>


<h3> Iniciar sessió </h3>


<h3>Configurar usuari </h3>


<h3>Administrar articles</h3>