-- Link del inicio
insert into menus(name, link) values('inicio', 'admin');
insert into menus(name, link) values('inicio', 'admin/getData');

-- Lick de matenimiento
insert into menus(name, link) values('categorias', 'matenimiento/categoria');
insert into menus(name, link) values('clientes', 'matenimiento/cliente');
insert into menus(name, link) values('productos', 'matenimiento/producto');

-- Lick de movimientos
insert into menus(name, link) values('ventas', 'movimientos/ventas');

-- Lick de reportes
insert into menus(name, link) values('reportes ventas', 'reportes/ventas');

-- Lick de adminstrador
insert into menus(name, link) values('usuarios', 'adminstrador/usuarios');
insert into menus(name, link) values('permisos', 'adminstrador/permisos');
insert into menus(name, link) values('tipo documento', 'adminstrador/permisos');
insert into menus(name, link) values('menus', 'adminstrador/menus');
insert into menus(name, link) values('perfiles', 'adminstrador/perfiles');

