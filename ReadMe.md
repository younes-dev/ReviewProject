 ### les filtre Twig 
 ````
 * {{ repeat('&nbsp;',3)|raw }}
 * {{ "hello world"|StrCount }}    =>    2
 ````
 ##### Exemple

 ````
 * {% set str="lundi mardi mercredi jeudi vendredi samedi dimanche" %}
 * Il ya {{ repeat('&nbsp;',5)|raw }} => ({{ str|StrCount }}){{ repeat('&nbsp;',3)|raw }}jours dans la semains
 * Output : Il ya       => (7)     jours dans la semains
 ````