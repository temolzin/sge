<?php 

class Menus {
    
    function menu_lateral(){
        
    $tipo = 'Maestro';
    
    if($tipo == 'Maestro'){
        
        echo '
        
                <li class="nav-item">
                            <a id="alumno" name="alumno" href="'.constant('URL').'alumno" class="nav-link">
                              <i class="nav-icon fas fa-user-graduate"></i>
                              <p>
                                Alumno
                              </p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a id="tutor" name="tutor" href="'.constant('URL').'tutor" class="nav-link">
                              <i class="nav-icon fas fa-user-tie"></i>
                              <p>
                                Tutor
                              </p>
                            </a>
                            </li>
                            
                            ';
                            
        
    
    } else if($tipo == 'Tutor'){
        
       
        echo '
          
            <li class="nav-item">
                            <a id="profesor" name="profesor" href="'.constant('URL').'profesor" class="nav-link">
                              <i class="nav-icon fas fa-chalkboard-teacher"></i>
                              <p>
                                Profesor
                              </p>
                            </a>
                          </li> 
                           <li class="nav-item">
                            <a id="directivo" name="directivo" href="'.constant('URL').'directivo" class="nav-link">
                              <i class="nav-icon fas fa-users-cog"></i>
                              <p>
                                director
                              </p>
                            </a>
                          </li>
                           <li class="nav-item">
                            <a id="escuela" name="escuela" href="'.constant('URL').'escuela" class="nav-link">
                              <i class="nav-icon fas fa-school"></i>
                              <p>
                                Escuela
                              </p>
                            </a>
                          </li>
                              <li class="nav-item">
                              <a id="grupo" name="grupo" href="'.constant('URL').'grupo" class="nav-link">
                              <i class="nav-icon fas fa-user-friends"></i>
                              <p>
                              Grupo
                              </p>
                              </a>
                              </li>
                             ';
                              
        
    }else if($tipo == 'Alumno'){
        
    echo '
      
        
        <li class="nav-item">
                            <a id="horario" name="horario" href="'.constant('URL').'horario" class="nav-link">
                              <i class="nav-icon fas fa-calendar-day"></i>
                              <p>
                                Horario
                              </p>
                            </a>
                          </li>
                           <li class="nav-item">
                            <a id="materia" name="materia" href="'.constant('URL').'materia" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                Materia
                              </p>
                            </a>
                          </li>
                          
                           <li class="nav-item">
                            <a id="tarea" name="tarea" href="'.constant('URL').'tarea" class="nav-link">
                              <i class="nav-icon fas fa-user-edit"></i>
                              <p>
                               Tarea
                              </p>
                            </a>
                          </li>
       
        ';
        
    }else if($tipo == 'Directivo'){
        
        
        echo'
           
                           <li class="nav-item">
                            <a id="tareaalumno" name="tareaalumno" href="'.constant('URL').'tareaalumno" class="nav-link">
                              <i class="nav-icon fas fa-clipboard-check"></i>
                              <p>
                                Tareas Alumno
                              </p>
                            </a>
                          </li>
                           <li class="nav-item">
                              <a id="incidencia" name="incidencia" href="'.constant('URL').'incidencia" class="nav-link">
                              <i class="nav-icon fas fa-id-badge"></i>
                              <p>
                              Incidencias
                              </p>
                              </a>
                              </li>
                            <li class="nav-item">
                            <a id="materia_profesor" name="materia_profesor" href="'.constant('URL').'materia_profesor" class="nav-link">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                            Materias-Profesor
                            </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a id="gradoAcademico" name="gradoAcademico" href="'.constant('URL').'gradoAcademico" class="nav-link">
                              <i class="nav-icon fas fa-graduation-cap"></i>
                              <p>
                                Grado Academico
                              </p>
                            </a>
                          </li>
                          
                          ';
                          
                          
    } else
    
    {
        echo $tipo;
    }
    }
}



?>