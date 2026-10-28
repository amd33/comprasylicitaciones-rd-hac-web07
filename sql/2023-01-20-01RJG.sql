ALTER TABLE informix.apertura
  ADD ano SMALLINT
GO  



update apertura
set ano = 2022;


update licitacion
set ano = 2022;

ALTER TABLE tribunal.proveedor_pliego
	ADD ano SMALLINT
GO

update proveedor_pliego
set ano = 2022;


update proveedor_pliego
set ano = 2022;


---- concursos 2023

update licitacion
set ano = 2023
where id in (1,2,3,4,5,6,7,8,9,748) 
and tipo = 1;


update apertura
set ano = 2023
where id in (1,2,3,4,5,6,7,8,9,748) 
and tipo = 1;

-- licitacion privada

update licitacion
set ano = 2023
where id in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,131,157,158,151,159) 
and tipo = 3;


update apertura
set ano = 2023
where id in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,131,157,158,151,159) 
and tipo = 3;


-- licitacion publica

update licitacion
set ano = 2023
where id in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,28,87) 
and tipo = 2;


update apertura
set ano = 2023
where id in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,28,87) 
and tipo = 2;