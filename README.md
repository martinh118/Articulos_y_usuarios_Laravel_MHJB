<h1>Practica 07 - LARAVEL - Martín H. Jaime Bonvin</h1>

<h2>Abans de començar...</h2>

<p>Abans de començar la correcció i execució de la pàgina web del projecte, és necessari executar les migracions configurades:</p>
<p>
En la carpeta /database/migrations haurien d'estar els següents arxius:
<ul>
  <li>  2014_10_12_000000_create_users_table.php </li>
   <li> 2014_10_12_100000_create_password_reset_tokens_table</li>
  <li>  2014_10_12_100000_create_password_resets_table</li>
   <li> 2019_08_19_000000_create_failed_jobs_table</li>
   <li> 2019_12_14_000001_create_personal_access_tokens_table</li>
    <li>create_articles_table.php</li>
</ul>
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
<p>Com a usuari anònim, es podrà visualitzar tots els articles disponibles a la base de dades amb una paginació de 5 articles per pàgina.</p>

<h3> Registrar un usuari</h3>
<p>L'usuari es pot registrar i crear el seu propi compte a la pàgina.</p>

<h3> Iniciar sessió </h3>
<p>Si l'usuari ja està registrat, podrà iniciar sessió a la pàgina.
Cal destacar que l'opció 'Forget your password' no funciona.</p>

<h3>Administrar articles</h3>
<p>En la pàgina inicial amb l'usuari inicialitzat es podrà visualitzar tots els articles disponibles a la base de dades.

El botó de color blau a dalt a l'esquerra de la pàgina permet crear un nou article, on automàticament selecciona el nou identificador de l'article. Les dades a omplir de l'article són, el títol, el contingut, i una imatge a visualitzar.
    
L'usuari també podrà editar qualsevol article. Cada article conté un botó <b>'Edit'</b>, on aquest obre un formulari amb les dades de l'article.
Dins d'aquest article existeix l'opció d'eliminar l'article seleccionat.

L'usuari pot visualitzar els articles creats per ell en l'opció <b>'Els teus articles'</b> ubicat al menú superior de la web.</p>

<h3>Configurar usuari </h3>
<p>Per anar a la configuració d'usuari s'ha de seleccionar l'opció <b>'profile'</b> en el dropdown que hi ha en el <b> nom d'usuari</b> a dalt a la dreta de la pàgina.
En aquesta pàgina l'usuari pot:
<ul>
    <li>Canviar el nom d'usuari.</li>
    <li>Canviar el correu electrònic de l'usuari.</li>
    <li>Canviar la contrasenya d'inici de sessió. (On és necessari la contrasenya actual, i repetir dues vegades la nova contrasenya.)</li>
    <li>Esborrar el compte actual d'usuari.</li>
</ul>
</p>


