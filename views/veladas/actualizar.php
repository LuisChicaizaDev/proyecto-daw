<?php
    //Head
    $currentPage = 'actualizar velada';
    includeTemplate('head', $currentPage);
?>
<body>
    <!--Header-->
    <header class="header my-paddings">
        <!--Header content-->
        <div class="my-container header__content">
            <!--Header Nav-->
            <?php 
            includeTemplate('nav', $currentPage);
            ?>
            <!--/Header Nav-->
        </div><!--/Header content-->

        <!--Nav Mobile-->
        <?php 
            includeTemplate('nav-mobile', $currentPage);
        ?>
        <!--/Nav Mobile-->

    </header> <!--/Header-->

    <!--Main-->
    <main class="main interna">
        <h1 class="text-center">Actualizar Velada</h1>

        <!--Publicar velada-->
        <section class="actualizar-velada my-container my-paddings">
            <div class="actualizar-velada__info">
                <p class="my-2">
                <strong>Aquí podrás actualizar cualquier detalle sobre tu velada</strong>. Recuerda rellenar los campos obligatorios (<span class="required">*</span>) 
                para poder actualizar correctamente tu velada. 
                Esta información mínima es esencial para mostrar la información importante a los asistentes y aficionados.
                <strong>Puedes añadir hasta 14</strong> combates en cada velada.
                </p>
                <p class="my-2">
                   No es obligatario completar los 14 combates, rellena solo los que necesites los demás déjalos vacíos con la primera opción 
                   seleccionada.
                </p>
                <p class="my-5 alert alert-primary" role="alert">
                    ⚠️ Ten en cuenta que un boxeador no puede enfrentarse a sí mismo y no puede participar en más de un combate.
                </p>

                <div class="to-back d-inline-block mt-5">
                    <a href="<?php echo BASE_URL;?>/admin" class="btn-back">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                        </svg>
                        <span>
                        Volver al Panel
                        </span>
                    </a>
                </div>
            </div>

            <!--Formulario-->
            <div class="actualizar-velada__formulario">
                <form class="formulario velada-form" method="POST" enctype="multipart/form-data">

                    <!--Alert de exito-->
                    <?php if (!empty($mensaje_exito)) : ?>
                        <div class="formulario-alert velada-form__alert alert alert-success" role="alert">
                            <?php echo $mensaje_exito; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Alerts errores -->
                    <?php foreach($errores as $error): ?>
                        <div class="formulario-alert velada-form__alert alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach;?>


                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                    
                    <div class="formulario-group velada-form__group--tipo">
                        <label for="tipo">
                            Tipo de velada <span class="required"> *</span> 
                        </label>
                        <input 
                        type="text" 
                        id="tipo" 
                        name="velada[tipo]" 
                        placeholder="Ej. Amateur, Profesional, Interclub, Exhibición"
                        value="<?php echo trim($velada->tipo); ?>"
                        required>
                    </div>

                    <div class="formulario-group velada-form__group--imagen">
                        <div class="label-imagen__cartelera">
                            <span class="label-imagen__cartelera--titulo">Imagen Cartelera</span> 
                            <span class="required"> *</span>
                        </div>
                        <label for="imagen_cartelera" class="cartelera__label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.4" d="M22 16V15C22 12.171 22 10.758 21.121 9.879C20.242 9 18.828 9 16 9H8C5.17 9 3.757 9 2.878 9.88C2 10.757 2 12.17 2 14.998V16C2 18.828 2 20.242 2.879 21.121C3.757 22 5.172 22 8 22H16C18.828 22 20.243 22 21.121 21.121C21.999 20.242 22 18.828 22 16Z" fill="#3E4347"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 15.75C12.1993 15.75 12.39 15.671 12.5307 15.5303C12.6713 15.3897 12.7504 15.1989 12.7504 15V4.02701L14.4304 5.98801C14.5598 6.13918 14.744 6.23275 14.9424 6.24813C15.1408 6.2635 15.3372 6.19943 15.4884 6.07001C15.6395 5.94058 15.7331 5.7564 15.7485 5.55799C15.7639 5.35958 15.6998 5.16318 15.5704 5.01201L12.5704 1.51201C12.5 1.42967 12.4125 1.36357 12.3141 1.31825C12.2157 1.27292 12.1087 1.24945 12.0004 1.24945C11.892 1.24945 11.785 1.27292 11.6866 1.31825C11.5882 1.36357 11.5008 1.42967 11.4304 1.51201L8.43036 5.01201C8.36628 5.08686 8.31756 5.1736 8.287 5.26728C8.25644 5.36096 8.24463 5.45975 8.25224 5.55799C8.25986 5.65624 8.28675 5.75202 8.33138 5.83987C8.37601 5.92772 8.43751 6.00592 8.51236 6.07001C8.58722 6.13409 8.67396 6.18281 8.76764 6.21337C8.86132 6.24393 8.9601 6.25574 9.05835 6.24813C9.15659 6.24051 9.25237 6.21362 9.34022 6.16899C9.42808 6.12436 9.50628 6.06286 9.57036 5.98801L11.2504 4.02801V15C11.2504 15.414 11.5864 15.75 12.0004 15.75Z" fill="#002147"/>
                            </svg>
                            <span class="nombre-archivo-cartelera">Subir archivo</span>
                        </label>
                        
                        <input 
                        type="file" 
                        id="imagen_cartelera" 
                        name="velada[imagen_cartelera]" 
                        accept="image/jpeg, image/png"
                        class="imagen_input" 
                        >

                        <!--Imagen seleccionada-->
                        <div class="imagen-preview">
                            <figure class="figure">
                                <img src="<?php echo BASE_URL;?>/imagenes/<?php echo $imagen_cartelera; ?>" class="figure-img img-fluid rounded shadow" alt="Imagen de la cartelera seleccionada.">
                                <figcaption class="figure-caption">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo-scan">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M15 8h.01" />
                                        <path d="M6 13l2.644 -2.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                                        <path d="M13 13l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l1.644 1.644" />
                                        <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                        <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                        <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                        <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                    </svg>
                                    Imagen de la cartelera seleccionada. Si eliges una nueva imagen no se guardarán los cambios hasta que actualices la velada.
                                </figcaption>
                            </figure>
                        </div>
                        
                    </div>

                    <div class="formulario-group velada-form__group--lugar">
                        <label for="lugar">
                            Lugar <span class="required"> *</span>
                        </label>
                        <input 
                        type="text" 
                        id="lugar" 
                        name="velada[lugar]" 
                        placeholder="Ej. Centro Deportivo Pepito" 
                        value="<?php echo $velada->lugar; ?>" 
                        required>
                    </div>

                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="formulario-group velada-form__group--fecha">
                            <label for="fecha">
                                Fecha <span class="required"> *</span>
                            </label>
                            <input 
                            type="date" 
                            id="fecha" 
                            name="velada[fecha]" 
                            value="<?php echo $velada->fecha; ?>" 
                            required>
                        </div>

                        <div class="formulario-group velada-form__group--hora">
                            <label for="hora">
                                Hora <span class="required"> *</span>
                            </label>
                            <input 
                            type="time" 
                            id="hora" 
                            name="velada[hora]" 
                            value="<?php echo $velada->hora; ?>" 
                            required>
                        </div>
                    </div>

                    <div class="formulario-group velada-form__group--direccion">
                        <label for="direccion">
                            Dirección <span class="required"> *</span>
                        </label>
                        <input 
                        type="text" 
                        id="direccion" 
                        name="velada[direccion]" 
                        placeholder="Ej. Calle Falsa 123, Oviedo" 
                        value="<?php echo $velada->direccion; ?>" 
                        required>
                    </div>
                    
                    <div class="formulario-group velada-form__group--precio">
                        <label for="precio">
                            Precio mínimo (€)  <span class="required"> *</span>
                        </label>
                        <input 
                        type="number" 
                        id="precio" 
                        name="velada[precio]" 
                        min="1" max="1000" 
                        placeholder="Ej. 15" 
                        value="<?php echo $velada->precio; ?>" 
                        required>
                    </div>

                    <div class="formulario-group velada-form__group--promotor">
                        <label for="nombre_promotor">
                            Nombre Promotor/a <span class="required"> *</span>
                        </label>
                        <input 
                        type="text" 
                        id="nombre_promotor" 
                        name="velada[nombre_promotor]" 
                        placeholder="Ej. Pepito Promotions" 
                        value="<?php echo $velada->nombre_promotor; ?>"
                        required>
                    </div>

                    <div class="formulario-group velada-form__group--combates  my-5">
                        <label for="boxeador1_1">Combates (Boxeador 1 VS Boxeador 2)</label>
                        <!--Enfrentamientos-->
                        <div class="combate-boxeadores d-flex flex-wrap justify-content-between gap-4 my-5">
                            
                        <?php
                        // Obtengo un array con los IDs de los combates de la bbdd
                        $combate_ids = array_keys($combates); 
                        $combate_index = 0; 

                        for ($i = 1; $i <= 14; $i++): 
                            // Si hay un ID de combate existente, usa el indice para relacionarlo con el id boxeador, sino genera un nuevo índice
                            $id_combate = isset($combate_ids[$combate_index]) ? $combate_ids[$combate_index] : $i;

                            // Si existe el combate, sigue al siguiente indice
                            if (isset($combate_ids[$combate_index])) {
                                $combate_index++;
                            }
                        ?>

                            <!-- Select para Boxeador 1 -->
                            <div class="combate-boxeadores__item">
                                <span id="contador-combates"><?php echo $i ?>.</span>

                                <label for="boxeador1_<?php echo $i ?>">
                                    Boxeador 1 <span class="required"> *</span> 
                                </label>
                                <select id="boxeador1_<?php echo $i ?>" name="boxeadores[<?php echo $i ?>][boxeador1]" <?php echo $i === 1 ? 'required' : ''; ?>>
                                    <option value="">-- Boxeador 1 --</option>
                                    
                                    <?php
                                        foreach($boxeadores_resultado as $boxeador):
                                        
                                        // Se auto-seleccionan los boxeadores seleccionados previamente al publicar la velada
                                        $selected = isset($combates[$id_combate]) && $combates[$id_combate]['boxeador1'] == $boxeador->id ? 'selected' : '';
                                    ?>
                                        <option value="<?php echo $boxeador->id ?>" <?php echo $selected; ?> >
                                            <?php echo $boxeador->nombre_boxeador . ' ' . $boxeador->apellido_boxeador ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Select para Boxeador 2 -->
                            <div class="combate-boxeadores__item">
                                <label for="boxeador2_<?php echo $i ?>">
                                    Boxeador 2 <span class="required"> *</span> 
                                </label>
                                <select id="boxeador2_<?php echo $i ?>"  name="boxeadores[<?php echo $i ?>][boxeador2]" <?php echo $i === 1 ? 'required' : ''; ?>>
                                    <option value="">-- Boxeador 2 --</option>

                                    <?php 
                                        foreach($boxeadores_resultado as $boxeador): 
                                        $selected = isset($combates[$id_combate]) && $combates[$id_combate]['boxeador2'] == $boxeador->id ? 'selected' : '';
                                    ?>
                                        <option value="<?php echo $boxeador->id ?>" <?php echo $selected; ?> >
                                            <?php echo $boxeador->nombre_boxeador . ' ' . $boxeador->apellido_boxeador ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php endfor; ?>
                        
                        </div><!--/Enfrentamientos-->
                    </div>


                    <div class="formulario-group velada-form__group--descripcion">
                        <label for="descripcion">
                            Descripción <span class="required"> *</span>
                        </label>
                        <textarea 
                            id="descripcion" 
                            name="velada[descripcion]" 
                            rows="4" cols="50" 
                            placeholder="Escribe una breve descripción a cerca del evento o algún dato a tener en cuenta para los asistentes a la velada..." 
                            required><?php echo $velada->descripcion; ?></textarea>
                    </div>

                    <input type="submit" class="formulario-submit velada-form__submit btn-gold-block" value="Actualizar Velada">

                </form>

            </div><!--/Formulario-->

        </section><!--/Publicar velada-->
        
    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>