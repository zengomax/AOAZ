package dataAccess;

import gui.Menu;
import gui.MovimientosGUI;
import modelo.MoveTableModel;
import modelo.Movimiento;
import modelo.Producto;
import modelo.Model;
import modelo.TaulaModeloa;
import gui.View;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.Arrays;
import javax.swing.JOptionPane;
import java.util.Calendar;

import java.sql.Date;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

/**
 * This class purpose is to control data access
 *
 * @author AOAZ
 */
public class Controller implements ActionListener {

    private Model model;
    private View view = new View();
    private Menu menu;
    private MovimientosGUI movimiento = new MovimientosGUI();
    private ArrayList<Producto> productos = model.printToArray();
    private ArrayList<Movimiento> movimientos = model.arrayMovimiento();

    public Controller(Model model, Menu menu) {
        this.model = model;
        this.menu = menu;
        anadirActionListener(this);
        mostrarSaldo();
    }

    private void anadirActionListener(ActionListener listener) {
        //GUIaren konponente guztiei gehitu listenerra

        //VIEW       
        view.GehituButton.addActionListener(listener);
        view.EzabatuButton.addActionListener(listener);

        view.viewMovements.addActionListener(listener);
        view.AddProduct.addActionListener(listener);
        view.cambiarCantidadButton.addActionListener(listener);
        view.AddCantidad.addActionListener(listener);
        view.depositMoneyMenu.addActionListener(listener);
        view.DepositButton.addActionListener(listener);

//MOVIMIENTOGUI       
        movimiento.detailsButton.addActionListener(listener);

        //MENU
        menu.manageProductsButton.addActionListener(listener);
        menu.anadirCantidadButton.addActionListener(listener);
        menu.movementsButton.addActionListener(listener);
        menu.depositDineroButton.addActionListener(listener);
        menu.depositDineroButton.addActionListener(listener);
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
            case "add2":
                anadirProducto();
                datuakKargatu();
                break;

            case "Delete":
                borrarProducto();
                datuakKargatu();
                break;

            case "Add Quantity":
                loadComboBox();
                view.dialogoAnadir.setVisible(true);
                datuakKargatu();

                break;

            case "View Movements":
                movimiento.setVisible(true);
                break;

            case "AddAnadir":
                updateProducto();
                datuakKargatu();
                break;

            case "View Details":
                loadDetailsMovimiento();
                break;

            case "Manage Products":
                view.setVisible(true);
                break;

            case "anadirCantidadMenu":
                loadComboBox();
                view.dialogoAnadir.setVisible(true);

                break;

            case "verMovimientos":
                movimiento.setVisible(true);
                break;

            case "Deposit Money":
                view.dialogoDinero.setVisible(true);
                break;

            case "Deposit":
                depositMoney();
                mostrarSaldo();
                datuakKargatu();
                break;

        }

    }

    /**
     * This function purpose is to charge db data into an array and show it
     */
    public void datuakKargatu() {
        view.modelo = new TaulaModeloa();
        view.tabla.setModel(view.modelo);
        mostrarSaldo();
        loadComboBox();
        productos = model.printToArray();

        movimientos = model.arrayMovimiento();
        movimiento.modelomove = new MoveTableModel();
        movimiento.taulaMove.setModel(movimiento.modelomove);
    }

    /**
     * This function purpose is to show db balance
     */
    public void mostrarSaldo() {

        view.saldoLabel.setText(model.mostrarSaldo() + " €");
        view.balancelabel.setText(model.mostrarSaldo() + " €");

    }

    /**
     * This function purpose is to insert products into the database
     */
    public void anadirProducto() {

        String nombre = view.productoField.getText().toUpperCase();
        int cantidad = 0;
        double precio = 0;
        double total = 0;
        if (nombre.equals("") || view.cantidadField.getText().equals("") || view.precioField.getText().equals("")) {
            JOptionPane.showMessageDialog(null, "You can´t save empty information", "Information", JOptionPane.WARNING_MESSAGE);

        } else {

            try {

                cantidad = Integer.parseInt(view.cantidadField.getText());
                precio = Double.parseDouble(view.precioField.getText());
                Producto p = new Producto(1, nombre, cantidad);
                total = cantidad * precio;   // el total gastado al insertar productos

                String descripcion = "BUY " + cantidad + " of " + nombre + " for " + precio + "€";
                DateTimeFormatter dtf = DateTimeFormatter.ofPattern("yyyy-MM-dd");
                LocalDateTime now = LocalDateTime.now();
                String date = dtf.format(now);

                Movimiento m = new Movimiento(1, descripcion, date, total);

                model.anadirProducto(p);
                model.anadirMovimiento(m);
                JOptionPane.showMessageDialog(null, "The product was added to the inventary", "Information", JOptionPane.INFORMATION_MESSAGE);
                //Vaciar campos
                view.productoField.setText("");
                view.precioField.setText("");
                view.cantidadField.setText("");

                String saldo = model.mostrarSaldo();
                double nuevosaldo = Double.parseDouble(saldo) - total;
                model.actualizarSaldo(nuevosaldo);
            } catch (Exception e) {

                JOptionPane.showMessageDialog(null, "You have introduced incorrect data, please try again", "Error", JOptionPane.ERROR_MESSAGE);
                view.productoField.setText("");
                view.precioField.setText("");
                view.cantidadField.setText("");

            }

        }

    }

    /**
     * This function purpose is to delete products from the database
     */
    public void borrarProducto() {

        try {
            String idproducto = view.tabla.getValueAt(view.tabla.getSelectedRow(), 0) + "";

            int idint = Integer.parseInt(idproducto);

            int selection = JOptionPane.showConfirmDialog(null, "¿Do you want to delete the product?", "Confirm", JOptionPane.YES_NO_OPTION);

            if (selection == 0) {
                model.borrarProducto(idint);

                JOptionPane.showMessageDialog(null, "The product was deleted from the inventary", "Informazioa", JOptionPane.INFORMATION_MESSAGE);
            }
        } catch (Exception e) {

            JOptionPane.showMessageDialog(null, "You have to choose one product to be deleted", "Error", JOptionPane.WARNING_MESSAGE);

        }

    }

    /**
     * This function purpose is to charge product list
     */
    public void loadComboBox() {
        view.elegirProduct.removeAllItems();
        for (Producto p : productos) {
            view.elegirProduct.addItem(p.getIdProducto() + "- " + p.getNombre());
        }

    }

    /**
     * This function purpose is to update the amount of a product into the
     * database
     */
    public void updateProducto() {

        if (view.cantidadAnadir.equals("") || view.precioAnadir.getText().equals("")) {
            JOptionPane.showMessageDialog(null, "You can´t save empty information", "Information", JOptionPane.WARNING_MESSAGE);

        } else {
            try {

                int cantidad = Integer.parseInt(view.cantidadAnadir.getText());
                double precio = Double.parseDouble(view.precioAnadir.getText());
                double total = 0;
                String id = view.elegirProduct.getSelectedItem() + "";
                String[] idsplit = id.split("-");
                int cantidadvieja = 0;

                String descripcion = "ADD  " + cantidad + " OF " + idsplit[1] + " for " + precio + "€";
                DateTimeFormatter dtf = DateTimeFormatter.ofPattern("yyyy-MM-dd");
                LocalDateTime now = LocalDateTime.now();
                String date = dtf.format(now);
                total = cantidad * precio;   // el total gastado al insertar productos
                for (Producto p : productos) {

                    if (p.getIdProducto() == Integer.parseInt(idsplit[0])) {
                        cantidadvieja = p.getCantidad();
                    }

                }

                model.cambiarCantidadProducto(Integer.parseInt(idsplit[0]), cantidadvieja + cantidad);
                Movimiento m = new Movimiento(1, descripcion, date, total);
                model.anadirMovimiento(m);

                JOptionPane.showMessageDialog(null, "The quantity was added to the inventary", "Information", JOptionPane.INFORMATION_MESSAGE);
                String saldo = model.mostrarSaldo();
                System.out.println(saldo);
                double nuevosaldo = Double.parseDouble(saldo) - total;
                model.actualizarSaldo(nuevosaldo);
                //vaciar datos
                view.cantidadAnadir.setText("");
                view.precioAnadir.setText("");
                view.dialogoAnadir.hide();
            } catch (Exception e) {
                JOptionPane.showMessageDialog(null, "You have introduced incorrect data, please try again", "Error", JOptionPane.ERROR_MESSAGE);
                view.cantidadAnadir.setText("");
                view.precioAnadir.setText("");
            }
        }

    }

    /**
     * This function purpose is view transaction details
     */
    public void loadDetailsMovimiento() {
        try {
            int id = Integer.parseInt(movimiento.taulaMove.getValueAt(movimiento.taulaMove.getSelectedRow(), 0) + "");
            String descripcion = movimiento.taulaMove.getValueAt(movimiento.taulaMove.getSelectedRow(), 1) + "";
            String fecha = movimiento.taulaMove.getValueAt(movimiento.taulaMove.getSelectedRow(), 2) + "";;
            double euro = Double.parseDouble(movimiento.taulaMove.getValueAt(movimiento.taulaMove.getSelectedRow(), 3) + "");

            movimiento.idLabel.setText(id + "");
            movimiento.textareaMovimiento.setText(descripcion);
            movimiento.dinerolabel.setText(euro + " €");
            movimiento.fechaslabel.setText(fecha);
            movimiento.dialogoMovimiento.setVisible(true);

        } catch (Exception e) {

            JOptionPane.showMessageDialog(null, "You have to choose one movement to see their details ", "Error", JOptionPane.WARNING_MESSAGE);

        }

    }

    public void depositMoney() {

        double dinero = 0;

        if (view.moneyField.getText() == "") {
            JOptionPane.showMessageDialog(null, "You cant save empty data ", "Error", JOptionPane.WARNING_MESSAGE);

        } else {
            dinero = Double.parseDouble(view.moneyField.getText());// el dinero que esta en el text area

            if (dinero < 1) {
                JOptionPane.showMessageDialog(null, "You have to deposit at least 1€", "Error", JOptionPane.WARNING_MESSAGE);

            } else {

                double total = dinero + Double.parseDouble(model.mostrarSaldo());
                model.actualizarSaldo(total);
                String descripcion = "DEPOSIT OF  " + dinero + "€";
                DateTimeFormatter dtf = DateTimeFormatter.ofPattern("yyyy-MM-dd");
                LocalDateTime now = LocalDateTime.now();
                String date = dtf.format(now);
                Movimiento m = new Movimiento(1, descripcion, date, dinero);
                model.anadirMovimiento(m);

                JOptionPane.showMessageDialog(null, "The money was added to your account", "Success", JOptionPane.INFORMATION_MESSAGE);

            }
        }

    }

}
