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
import java.util.Date;

public class Movimiento {
    private int idmovimiento;
    private String descripcion;
    private Date date;
    private double euro;

    public Movimiento(int idmovimiento, String descripcion, Date data, double euro) {
        this.idmovimiento = idmovimiento;
        this.descripcion = descripcion;
        this.date = data;
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


    public Date getDate() {
        return date;
    }

    public void setDate(Date data) {
        this.date = data;
    }

    public double getEuro() {
        return euro;
    }

    public void setEuro(double euro) {
        this.euro = euro;
    }

    @Override
    public String toString() {
        return "Movimiento{" + "idmovimiento=" + idmovimiento + ", descripcion=" + descripcion + ", date=" + date + ", euro=" + euro + '}';
    }
    
    
    
    
}
