## Nombre
### nombre: Francisco Zambrano Valdés
### carrera: Ingeniería de Ejecución en Computación e Informatica

## Perros

### post, getAll http://localhost:8000/api/perros
### getOne, put, delete http://localhost:8000/api/perros/{id}

## Interacciones
### post, get http://localhost:8000/api/interacciones
### getOne http://localhost:8000/api/interacciones/{id}


## Obtener los perros aceptados y rechazados dado el id de un perro
### http://localhost:8000/api/perros/{id}/interacciones

## json de ejemplos
### post http://localhost:8000/api/perros
{
    "nombre": "palmerita",
    "foto_url": "https://github.com/franciscozv/backendTDW",
    "descripcion": "descripcion de palmerita"
}
##
{
    "nombre": "chaucha",
    "foto_url": "https://github.com/franciscozv/backendTDW",
    "descripcion": "descripcion de chaucha"
}
##
### post http://localhost:8000/api/interacciones
	
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
