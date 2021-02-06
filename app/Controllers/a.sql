create or replace procedure sp_generando_facturacion(
    numeroFac in number, cliente in number
)
as
c1 SYS_REFCURSOR;
begin
open c1 for
    select cli.nombre_cliente, ti.nombre_tienda, enca.total, po.nombre_producto, de.cantidad, de.precio, u.usuario
    from factura_encabezado  enca 
    inner join factura_detalle de on (enca.idfactura = de.idfactura)
    inner join producto po on (de.idproducto = po.idproducto)
    inner join cliente cli on (enca.idcliente = cli.idcliente)
    inner join tienda ti on (enca.idtienda = ti.idtienda)
    inner join usuario u on (enca.id_usuario = u.id_usuario)
    where enca.idfactura = numeroFac and enca.idcliente = cliente;

    DBMS_SQL.RETURN_RESULT(c1);
end;