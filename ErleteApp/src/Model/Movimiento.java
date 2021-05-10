package Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author blazquez.asier
 */

public class Movimiento {
    private int idmovimiento;
    private String descripcion;
    private String fecha;
    private double euro;

    public Movimiento(int idmovimiento, String descripcion, String fecha, double euro) {
        this.idmovimiento = idmovimiento;
        this.descripcion = descripcion;
        this.fecha = fecha;
        this.euro = euro;
    }

    public int getIdmovimiento() {
        return idmovimiento;
    }

    public void setIdmovimiento(int idmovimiento) {
        this.idmovimiento = idmovimiento;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getDate() {
        return fecha;
    }

    public void setDate(String date) {
        this.fecha = date;
    }


    public double getEuro() {
        return euro;
    }

    public void setEuro(double euro) {
        this.euro = euro;
    }

    @Override
    public String toString() {
        return "Movimiento{" + "idmovimiento=" + idmovimiento + ", descripcion=" + descripcion + ", date=" + fecha + ", euro=" + euro + '}';
    }
    
    
    
    
}
