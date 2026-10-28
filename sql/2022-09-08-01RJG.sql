ALTER TABLE informix.licitacion
	ADD id_arch INTEGER
GO;

update licitacion
set id_arch = codigo;

ALTER TABLE informix.licitacion
	DROP codigo
GO;


RENAME COLUMN informix.licitacion.id_arch TO codigo
GO

