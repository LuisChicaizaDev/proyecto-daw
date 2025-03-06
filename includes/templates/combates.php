
<?php 
for( $i = 1; $i <= 14; $i++) : ?>

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
        ?>
            <option value="<?php echo $boxeador->id?>" <?php echo (isset($boxeadores[$i]['boxeador1']) && $boxeadores[$i]['boxeador1'] == $boxeador->id) ? 'selected' : ''; ?> >
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
            // Reiniciar el puntero del array (por si acaso)
            //reset($boxeadores);
            foreach($boxeadores_resultado as $boxeador):
        ?>
            <option value="<?php echo $boxeador->id?>" <?php echo (isset($boxeadores[$i]['boxeador2']) && $boxeadores[$i]['boxeador2'] == $boxeador->id) ? 'selected' : ''; ?> >
                <?php echo $boxeador->nombre_boxeador . ' ' . $boxeador->apellido_boxeador ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<?php endfor; ?>