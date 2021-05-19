package modelo;


import java.util.ArrayList;
import java.util.Vector;
import javax.swing.table.AbstractTableModel;
 /**
    * This class is the table model of the products
    */
public class TaulaModeloa extends AbstractTableModel {

    private String[] zutabeIzenak = {"ProductID", "Name", "Amount"};
    private ArrayList<Producto> inventario = new ArrayList<>();
    public TaulaModeloa() {
     //herriak =Model.inprimatuToArray() ;
     inventario= Model.printToArray();
    }

    @Override

    public int getColumnCount() {
        return zutabeIzenak.length;

    }

    @Override
    public String getColumnName(int col) {
        return zutabeIzenak[col];
    }

    @Override
    public int getRowCount() {
        return inventario.size();
    }

    @Override
    public Object getValueAt(int row, int col) {

        switch (col) {
            case 0:
                return inventario.get(row).getIdProducto();

            case 1:
                return inventario.get(row).getNombre();
    
            case 2:
                return inventario.get(row).getCantidad();
            
        }
        return null;
    }

    @Override
    public Class<?> getColumnClass(int colIndex) {

        return getValueAt(0, colIndex).getClass();

    }
    
    /*
      public boolean isCellEditable(int row, int column) {
        return true;
    }
      
          public void setValueAt(Object value, int row, int col) {
        
          switch (col) {
            case 0:
                 inventario.get(row).setIdProducto(Integer.parseInt(value+""));
                 break;

            case 1:
                 inventario.get(row).setNombre(value+"");
                 break;
    
            case 2:
                 inventario.get(row).setCantidad(Integer.parseInt(value+""));
                 break;


        }
              
        fireTableCellUpdated(row, col);
    }

*/

}