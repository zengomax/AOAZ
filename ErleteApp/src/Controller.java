
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.Arrays;
import javax.swing.JOptionPane;

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
  //  ArrayList<Herria> herriak;

    public Controller(Model model, View view) {
        this.model = model;
        this.view = view;
        anadirActionListener(this);
        datuakKargatu();

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
            case "GEHITU":
                herriaGehitu();
                datuakKargatu();
                break;

            case "EZABATU":
                herriaEzabatu();
                datuakKargatu();
                break;

            case "ALDATU":
                aldatu();
                datuakKargatu();
                break;
        }

    }

    public void herriaGehitu() {

        String herria = view.HerriaField.getText();

        String probintzia = view.probintziaCombo.getSelectedItem() + "";
        String oharrak = view.OharrakTextArea.getText();
        boolean hondartza = false;
        if (view.hondartzaCheckBox.isSelected()) {
            hondartza = true;
        }

        if (herria.equals("")) {

            JOptionPane.showMessageDialog(null, "Ezin da herria hutsik gehitu", "Informazioa", JOptionPane.WARNING_MESSAGE);

        } else {
            Herria h = new Herria(herria, probintzia, hondartza, oharrak);

            model.herriaGehitu(h);
            JOptionPane.showMessageDialog(null, "Herria Gorde da", "Informazioa", JOptionPane.INFORMATION_MESSAGE);
        }

    }

    public void inprimatu() {
        System.out.println(model.herriakInprimatu());

        System.out.println(model.inprimatuToArray());
    }

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

    public void herriaEzabatu() {

        try {
            String herria = view.tabla.getValueAt(view.tabla.getSelectedRow(), 0) + "";

            model.herriaEzabatu(herria);
            JOptionPane.showMessageDialog(null, "Herria Ezabatu da", "Informazioa", JOptionPane.INFORMATION_MESSAGE);

        } catch (Exception e) {

            JOptionPane.showMessageDialog(null, "Aukeratu taulatik bat", "Errorea", JOptionPane.WARNING_MESSAGE);

        }

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

    }

}
