-- creacion de la base de datos
CREATE DATABASE IF NOT EXISTS cm_tienda_ropa_base_de_datos;    
--  El siguente es la bdd a usar
use cm_tienda_ropa_base_de_datos;                              
-- se crea la tabla que guardara los datos ingresados
CREATE TABLE IF NOT EXISTS cam_tienda_tabla (          
-- lo siguiente realiza el crud
  id int(20) NOT NULL auto_increment, 
  ropa varchar(255) NOT NULL,              
  zapatos float(12) NOT NULL,
  PRIMARY KEY  (id)
); 