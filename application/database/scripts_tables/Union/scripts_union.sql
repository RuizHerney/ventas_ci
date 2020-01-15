-- Insert para la tabla states --

insert into states (name, description) values('activo/a', 'Usuario actualmente activo');

insert into states (name, description) values('inactivo/a', 'Usuario actualmente inactivo');


-- Insert para la tabla categories --

insert into categories (name, description, state_id) values('Escritura', 'Todo en escritura', 1);

insert into categories (name, description, state_id) values('Papeles', 'Todo en papeles', 1);

insert into categories (name, description, state_id) values('Cuadernos', 'Todo en cuadernos', 1);

insert into categories (name, description, state_id) values('Arte', 'Todo en arte', 1);

insert into categories (name, description, state_id) values('escolares', 'Todo en escolares', 1);

-- Insert para la tabla products --

insert into products (code, name, description, price, stock, category_id, state_id)
values('10001', 'lapiz', 'lapiz para escribir', 1.200, 100, 1, 1);

insert into products (code, name, description, price, stock, category_id, state_id)
values('10002', 'cuaderno', 'cuaderno para escribir', 3.000, 200, 3, 1);

insert into products (code, name, description, price, stock, category_id, state_id)
values('10003', 'pincel', 'pincel para dibujar', 1.500, 100, 4, 1);

-- Insert para la tabla types_clients --

insert into types_clients (name, description) values('Persona', 'Todo tipo de personas');

insert into types_clients (name, description) values('Empresa', 'Todo tipo de empresas');

-- Insert para la tabla types_documents --

insert into types_documents (name, description) values('CC', 'Documento de identidad de personas');

insert into types_documents (name, description) values('NIT', 'Documento de identidad de empresas');


-- Insert para la tabla types_voucher --

insert into types_voucher (name, quantity, igv, serie) value ('Factura', 0, '18', '001');

insert into types_voucher (name, quantity, igv, serie) value ('Boleta', 1, '0', '001');

-- Insert para la tabla clients --

insert into clients (name, phone, address, type_client_id, type_document_id, num_document, state_id)
values('Ivan Duque', '3018971235', 'calle 100', 2, 2, '249308483', 1);

insert into clients (name, phone, address, type_client_id, type_document_id, num_document, state_id)
values('Sena', '75947395', 'calle 52', 1, 1, '249308483567', 1);

-- Insert para la tabla roles --

insert into roles (name, description) values('admin', 'Usuario que puede navegar en todo el sistema');

insert into roles (name, description) values('vendedor', 'Usuario que puede realizar ventas');

-- Insert para la tabla roles --

insert into users (name, last_name, phone, email, user_name, password, role_id, state_id)
values ('Herney', 'Ruiz Meza', '3022794909', 'herneyruiz@hotmail.com', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 1);


insert into users (name, last_name, phone, email, user_name, password, role_id, state_id)
values ('Rosmery', 'Gutierrez', '3119876543', 'rosmeryguti@hotmail.com', 'rosmery', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 1);

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

insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(1, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(2, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(3, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(4, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(5, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(6, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(7, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(8, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(9, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(10, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(11, 1, 1, 1, 1, 1);
insert into permissions (menu_id, role_id, p_read, p_insert, p_update, p_delete) values(12, 1, 1, 1, 1, 1);

