<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    public function getProducts()
    {
        # Creamos el inner join - con la clase db
        # Identificamos los campos a traer, de las tablas
        $this->db->select('p.*, c.name as category');

        # Identificamos la tabla principla para el inner join
        $this->db->from('products p');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('categories c', 'p.category_id = c.id');

        # Filtramos productos en el estado activo
        $this->db->where('p.state_id', 1);

        # Traemos todas los productos con el inner join
        $products = $this->db->get();

        # Retornamos los productos
        return $products->result();
    } # End method getProducts

    public function saveProduct($data)
    {
        return $this->db->insert('products', $data);
    } # End method saveProduct

    public function getProductById($id)
    {
        # Creamos el inner join - con la clase db
        # Identificamos los campos a traer, de las tablas
        $this->db->select('p.*, c.name as category, s.name as state');

        # Identificamos la tabla principla para el inner join
        $this->db->from('products p');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('categories c', 'p.category_id = c.id');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('states s', 'p.state_id = s.id');

        # Filtramos productos en el estado activo
        $this->db->where('p.state_id', 1);

        $product = $this->db->get();
        # Retornamos el cliente
        return $product->row();
    } # End method getProductById

    public function updateProduct($id, $data)
    {
        # Filtramos producto por id
        $this->db->where('id', $id);

        # Modificamos el registro de cliente
        return $this->db->update('products', $data);
    } # End method updateProduct

    public function deleteProduct($id)
    {
        $this->db->where('id', $id);

        # Eliminar el registro de producto
        return $this->db->delete('products');
    } # End method deleteProduct


} # End class ProductModel
