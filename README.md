# SGE  SISTEMA DE GESTION ESCOLAR principal


## Herramientas 

1. Servidor **XAMPP**
2. Editor de texto **Visual Studio Code** (opcional)

## Instalación

1. En **GitHub.com**, ir a la página principal del repositorio sge.
2. En la lista de la parte superior selecciona **code**.
[Clonar repositorio](https://github.com/temolzin/sge)
3. Para clonar el repositorio en **HTTPS** pulsa en el icono de portapapeles para copiar el url.
`https://github.com/temolzin/sge.git`
4. Ir al disco local en la carpeta **XAMPP**
5. Selecciona la ubicación/ carpeta donde se va a clonar el repositorio.
6. Da click derecho y selecciona **GIT BASH HERE**, o abre la consola.
7. Ingresa **git clone** y pega la dirección URL que se había copiado antes. 
`git clone https://github.com/temolzin/sge.git`
8. Presiona enter para crear el clon local.
9. Abre la carpeta con el editor de texto **Visual Studio Code**. 
10. Abre **XAMMP** e inicializa el servidor de **Apache** y **MYSQL**.
11. Selecciona el *Admin* de **MYSQL**.
12. Crea la base de datos con el nombre y características tal como están en el proyecto, carpeta *database*, archivo *dbclean*.
13. Guarda cambios.
14. En el proyecto abre la carpeta *config* y selecciona el archivo *config.php*.
15. Pulsa en el **URL**.
`http://localhost/sge/`
[Acceder sistema]( http://localhost/sge/usuario)
