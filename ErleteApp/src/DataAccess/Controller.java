package DataAccess;

import Model.Model;
import Model.TaulaModeloa;
import GUI.View;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.Arrays;
import javax.swing.JOptionPane;
import GUI.*;
import Model.*;
import java.util.Calendar;
import java.util.Date;
import javax.swing.JFrame;
import java.util.GregorianCalendar;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author blazquez.asier
 */
public class Controller implements ActionListener {

    private Model model;
    private View view;

    public Controller(Model model, View view) {
        this.model = model;
        this.view = view;
        anadirActionListener(this);
        mostrarSaldo();
    }

    private void anadirActionListener(ActionListener listener) {
        //GUIaren konponente guztiei gehitu listenerra

        view.GehituButton.addActionListener(listener);
        view.EzabatuButton.addActionListener(listener);
        view.AldatuButton.addActionListener(listener);

    }

    @Override
    public void actionPerformed(ActionEvent e) {
        String actionCommand = e.getActionCommand();
        //listenerrak entzun dezakeen eragiketa bakoitzeko. Konponenteek 'actionCommad' propietatea daukate
        switch (actionCommand) {
            case "Add":
                anadirProducto();
                datuakKargatu();
                break;

            case "EZABATU":
                borrarProducto();
                datuakKargatu();
                //  herriaEzabatu();
                break;

            case "ALDATU":
                System.out.println("hola");
                //   aldatu();
                //   datuakKargatu();

                break;

        }

    }


    public void inprimatu() {
        System.out.println(model.imprimirInventario());
        System.out.println(model.printToArray());
    }

    public void datuakKargatu() {
        view.modelo = new TaulaModeloa();
        view.tabla.setModel(view.modelo);
        mostrarSaldo();
    }

    public void mostrarSaldo(){
    
    view.saldoLabel.setText(model.mostrarSaldo()+" €");
    }
    
    public void anadirProducto() {

        String nombre = view.productoField.getText();
        int cantidad = 0;
        double precio = 0;
        double total=0;
        if (nombre.equals("") || view.cantidadField.getText().equals("") || view.precioField.getText().equals("")) {
            JOptionPane.showMessageDialog(null, "You can´t save empty information", "Information", JOptionPane.WARNING_MESSAGE);

        } else {
            cantidad = Integer.parseInt(view.cantidadField.getText());
            precio = Double.parseDouble(view.precioField.getText());
            Producto p = new Producto(1, nombre, cantidad);
            total = cantidad* precio;   // el total gastado al insertar productos
            
            String descripcion = "Buy of " + cantidad + " "+ nombre + " for " + precio+ "€";
            
            
            Calendar fecha = new GregorianCalendar();
            
           int ano = fecha.get(Calendar.YEAR);
           int mes = fecha.get(Calendar.MONTH);
            int dia = fecha.get(Calendar.DAY_OF_MONTH);
            
            Date date= new Date(ano, mes, dia);  // revisar si formato fecha o formato string
            Movimiento m = new Movimiento(1, descripcion, date, total);
            
            model.anadirProducto(p);
           //model.anadirMovimiento(m);
           JOptionPane.showMessageDialog(null, "The product was added to the inventary", "Information", JOptionPane.INFORMATION_MESSAGE);
           
           String saldo= model.mostrarSaldo();
            System.out.println(saldo);
          double nuevosaldo=Double.parseDouble(saldo)-total;
           model.actualizarSaldo(nuevosaldo);
           
            System.out.println(m);
            System.out.println(p);
            
        }   

    }
    
    public void borrarProducto() {

        try {
            String idproducto = view.tabla.getValueAt(view.tabla.getSelectedRow(), 0) + "";
            
            int idint= Integer.parseInt(idproducto);
            
            int selection = JOptionPane.showConfirmDialog(null, "¿Do you want to delete the product?", "Confirm", JOptionPane.YES_NO_OPTION);
            
            if (selection==0){            
             model.borrarProducto(idint);
                    
            JOptionPane.showMessageDialog(null, "The product was deleted from the inventary", "Informazioa", JOptionPane.INFORMATION_MESSAGE);
            }
        } catch (Exception e) {

            JOptionPane.showMessageDialog(null, "Aukeratu taulatik bat", "Errorea", JOptionPane.WARNING_MESSAGE);

        }

    }

    /*

    public void datuakKargatu() {

//        herriak = model.inprimatuToArray();
//
//        int numDatos = view.modelo.getRowCount();
//        for (int i = 0; i < numDatos; i++) {   //para borrar la tabla y no se sobrecargue
//            view.modelo.removeRow(0);
//        }
//        view.tabla.setVisible(true);
//
//        String[] info = new String[4];
//
//        for (Herria h : herriak) {
//
//            info[0] = h.getHerria();
//            info[1] = h.getProbintzia();
//
//            if (h.isHondartza()) {
//                info[2] = "BAI";
//
//            } else {
//                info[2] = "EZ";
//
//            }
//            info[3] = h.getOharrak();
//            view.modelo.addRow(info);
//
//        }       

            view.modelo = new TaulaModeloa();

            view.tabla.setModel(view.modelo);
    }

    

    public void aldatu() {
        try {
            String herria = view.tabla.getValueAt(view.tabla.getSelectedRow(), 0) + "";
            String probintzia = view.tabla.getValueAt(view.tabla.getSelectedRow(), 1) + "";
            String oharrak = view.tabla.getValueAt(view.tabla.getSelectedRow(), 3) + "";
            boolean hondartza = Boolean.parseBoolean(view.tabla.getValueAt(view.tabla.getSelectedRow(), 2) + "");
            Herria h = new Herria(herria, probintzia, hondartza, oharrak);

            model.herriaAldatu(h);
            JOptionPane.showMessageDialog(null, "Herria Aldatu da", "Informazioa", JOptionPane.INFORMATION_MESSAGE);

        } catch (Exception e) {

            JOptionPane.showMessageDialog(null, "Aukeratu taulatik bat eta editatu aldatzeko", "Errorea", JOptionPane.WARNING_MESSAGE);

        }

    }*/
}
