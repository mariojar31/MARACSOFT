<?php include("../templates/cabecera.php");?>
<?php include("../secciones/curso_select.php");?>

<section>
    
    <div class="clearfix">
        <div>
            <span>Curso:</span>
            <span class="h3"> <?php echo $nombre_curso?></span>
        </div>
        <div>
            <span>Docente:</span>
            <span class="h3"> <?php  ?></span>
        </div>
    </div>

    <br>
    <br>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listado de Estudiantes</h4>
            <a href="print_lista.php?id_curso=<?php echo $id_curso ?>&nombre_curso=<?php echo $nombre_curso ?>">Imprimir Lista</a>
        </div>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Documento</th>
                        <th scope="col">-</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(!empty($listado_estudiantes)){
                    foreach($listado_estudiantes as $estudiantes){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $count=($count+1); ?></td>
                        <td><?php echo $estudiantes[0]['apellido_estudiante']; echo " " ; echo $estudiantes[0]['nombre_estudiante']; ?></td>
                        <td><?php echo $estudiantes[0]['documento_estudiante']; ?></td>
                        <td>
                            <form action="vista_estudiante_select.php" method="get">
                                <input type="hidden" name="id_estudiante" value="<?php echo $estudiantes[0]['id'] ?>">
                                <button class="btn" type="submit" name="action" value="select">&#128269</button>
                            </form>
                        </td>
                    </tr>
                    <?php }}
                    else{
                        echo "<div class='alert alert-warning' role='alert'>
                        ¡Este curso no tiene estudiantes registrados!
                      </div>
                        ";
                    } ?>
                   
                    
                </tbody>
            </table>
        </div>
        


    </div>

   
    

</section>


<?php include("../templates/pie.php");?>