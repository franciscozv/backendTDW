<h1>Backend Laravel TDW</h1>
<p>nombre: Francisco Zambrano Valdés</p>
<p>carrera: Ingeniería de Ejecución en Computación e Informatica</p>

<h2>crud para api perros</h2>

<p>post, getAll http://localhost:8000/api/perros</p>
<p>getOne, put, delete http://localhost:8000/api/perros/{id}</p>

<h2>Interacciones</h2>
<p>post, get http://localhost:8000/api/interacciones</p>
<p>getOne http://localhost:8000/api/interacciones/{id}</p>

<h2>Obtener los perros aceptados y rechazados dado el id de un perro</h2>
<p>get http://localhost:8000/api/perros/{id}/interacciones</p>

<h2>json de ejemplos</h2>
<p>POST http://localhost:8000/api/perros</p>
```json
{"nombre": "palmerita", "foto_url": "https://github.com/franciscozv/backendTDW", "descripcion": "descripcion de palmerita"}
```
{
    "nombre": "chaucha",
    "foto_url": "https://github.com/franciscozv/backendTDW",
    "descripcion": "descripcion de chaucha"
}
##
<p>POST http://localhost:8000/api/interacciones</p>
	
   ####palmerita le dio aceptar a chaucha
    {
        "perro_interesado_id": 1,
	    "perro_candidato_id": 2,
	    "preferencia": "a"
    }
   ####chaucha le dio aceptar a palmerita
    {
	    "perro_interesado_id": 2,
	    "perro_candidato_id": 1,
	    "preferencia": "a"
    }
