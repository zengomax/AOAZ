package Model;

import java.sql.Statement;
import java.sql.Connection;
import java.sql.DriverManager;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import java.util.ArrayList;
import java.util.Date;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author blazquez.asier
 */
public class Model {

   
        private static Connection connect() throws SQLException {
   
        // Connection conn = DriverManager.getConnection("jdbc:mariadb://192.168.65.1:3306/HerrienDBa", "dam1", "dam1");
          Connection conn = DriverManager.getConnection("jdbc:mariadb://localhost/erlete", "root","");

   
        return conn;

    }

 
    public String imprimirInventario() {
        String sql = "SELECT * FROM inventario";
        String s = "";
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {

                s = s + rs.getInt("idproducto") + "\t"
                        + rs.getString("nombre") + "\t"
                        + rs.getInt("cantidad") + "\n";
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return s;
    }

    
    public static ArrayList<Producto> printToArray() {
        String sql = "SELECT * FROM inventario";
        ArrayList<Producto> inventario = new ArrayList<>();
        String s = "";
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {

                inventario.add(new Producto(rs.getInt("idproducto"), rs.getString("nombre"), rs.getInt("cantidad")));

            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return inventario;
    }
    
    
    
   
    public void borrarProducto(int id) {
        String sql = "DELETE FROM inventario WHERE idproducto = ?";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            // set the corresponding param
            pstmt.setInt(1, id);
            // execute the delete statement
            pstmt.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }

    public void cambiarCantidadProducto(int cantidad, int id) {
        String sql = "UPDATE inventario SET cantidad = ? WHERE id = ?";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            // set the corresponding param
            pstmt.setInt(1, cantidad);
            pstmt.setInt(2, id);
            // update 
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

    }
    
    
    
    public void anadirProducto(Producto p) {
        int idproducto = p.getIdProducto();
        String nombre = p.getNombre();
        int cantidad = p.getCantidad();
        
        String sql = "INSERT INTO inventario(nombre,cantidad) VALUES(?,?)"; //revisar la consulta

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
           // pstmt.setInt(1, idproducto);
            pstmt.setString(1, nombre);
            pstmt.setInt(2, cantidad);
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            
        }
    }

    
    public void anadirMovimiento(Movimiento m){
    
        int id= m.getIdmovimiento();
        String descripcion = m.getDescripcion();
        Date data = m.getDate();
        double euro = m.getEuro();
 
    
    String sql = "INSERT INTO movimiento(idmovimiento,descripcion,data,euro) VALUES(?,?,?)"; //revisar la consulta

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, id);
            pstmt.setString(2, descripcion);
            pstmt.setDate(3, (java.sql.Date) data);
            pstmt.setDouble(3, euro);            
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            
        }
    }
    
    public String imprimirMovimiento() {
        String sql = "SELECT * FROM movimiento";
        String s = "";
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {

                s = s + rs.getInt("idmovimiento") + "\t"
                        + rs.getString("descripcion") + "\t"
                        + rs.getDate("date") + "\t"
                        + rs.getDouble("euros") + "\n";
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return s;
    }
    
    public void actualizarSaldo(double euros) {
        String sql = "UPDATE bolsa SET eurostotales = ?";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            // set the corresponding param
            pstmt.setDouble(1, euros);
            // update 
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

    }
    
    public String mostrarSaldo() {
        String sql = "SELECT * FROM bolsa";
        String s = "";
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {

                s = rs.getDouble("eurostotales")+"";
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return s;
    }

    

    
}