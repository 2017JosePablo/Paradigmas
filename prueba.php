
SELECT tbanualidad.anualidadmonto FROM tbanualidad INNER JOIN tbpagoanualidad ON tbanualidad.anualidadfechaactualizacion >= tbpagoanualidad.pagoanualidadanterior AND tbanualidad.anualidadfechaactualizacion <= tbpagoanualidad.pagoanualidadproximo AND tbpagoanualidad.socioid = 1
