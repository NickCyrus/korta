<?php
     
    global $wpdb;
    global $nc_tbl;
    global $tables;

    $nc_tbl['09'] =  "09_Seguimiento_reparaciones";
    $nc_tbl['10'] =  "10_Informe_reparacion"; 
    

    $tables[] = ["CREATE TABLE `09_Seguimiento_reparaciones` (
                `ID` int(11) NOT NULL,
                `Remitente` text NOT NULL,
                `Persona_de_contacto` text NOT NULL,
                `Telefono` text NOT NULL,
                `email` varchar(255) NOT NULL,
                `N_de_husillos_enviados` int(11) NOT NULL,
                `Fecha_envio_cliente` datetime NOT NULL,
                `Fecha_recepcion_korta` datetime NOT NULL,
                `Referencia_cliente` varchar(255) NOT NULL,
                `Observaciones` text NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;"];

    $tables[] = ["ALTER TABLE `09_Seguimiento_reparaciones` ADD PRIMARY KEY (`ID`);"];
    
    $tables[] = ["ALTER TABLE `09_Seguimiento_reparaciones` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202474;"];

    $tables[] = ["CREATE TABLE `10_Informe_reparacion` (
                    `ID` int(11) NOT NULL,
                    `ID_formulario` int(11) NOT NULL,
                    `Referencia_cliente_husillo` varchar(255) NOT NULL,
                    `Problema_detectado` varchar(255) NOT NULL,
                    `Urgencia` varchar(255) NOT NULL,
                    `Ofertar_antes_de_reparar` tinyint(1) NOT NULL,
                    `Croquizar_y_ofertar_husillo_nuevo` tinyint(1) NOT NULL,
                    `Achatarrar_husillos_no_reparables` tinyint(1) NOT NULL,
                    `Fabricante_de_la_maquina` varchar(255) NOT NULL,
                    `Modelo_de_maquina` varchar(255) NOT NULL,
                    `Eje` varchar(255) NOT NULL,
                    `Observaciones` varchar(255) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;"];

    $tables[] = ["ALTER TABLE `10_Informe_reparacion` ADD PRIMARY KEY (`ID`);"];
    
    $tables[] = ["ALTER TABLE `10_Informe_reparacion` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;"];



