<?php exit; ?>
{"ids":["contacto_id","nota"],"table":{"crudTitle":"Administrador de Notas","crudRowsPerPage":"20","crudOrderField":"contacto_id","noColumn":"0"},"filter":{"list":["id","contacto_id","nota"],"actived":["contacto_id","nota"],"atrr":{"nota":{"alias":"Nota"},"contacto_id":{"alias":"Contacto"},"id":{"alias":"id"}}},"column":{"list":["id","contacto_id","contactos.nombre","nota","contactos.id","contactos.apellido","contactos.sexo","contactos.fecha_nacimiento","contactos.tipo_documento","contactos.numero","contactos.telefono","contactos.mail","contactos.municipio_id","contactos.localidad_id","contactos.calle","contactos.numero_calle","contactos.complemento","contactos.entre_calles","contactos.instalacion_coccion","contactos.instalacion_aguaCaliente","contactos.instalacion_calefaccion","contactos.posee_gas"],"actived":["id","contactos.nombre","nota"],"atrr":{"nota":{"alias":"Nota"},"contacto_id":{"alias":"Contacto"},"id":{"alias":"id"}}},"frm_type":"2","confirm_page":"1","join":[{"type":"INNER","table":"contactos","currentField":"notas.contacto_id","targetField":"contactos.id"}]}