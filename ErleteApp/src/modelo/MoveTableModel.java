package modelo;


import java.util.ArrayList;
import java.util.Vector;
import javax.swing.table.AbstractTableModel;
 /**
    * This class is the table model of the movements
    */
public class MoveTableModel extends AbstractTableModel {

    private String[] zutabeIzenak = {"MovementID", "Description", "Movements-Date","Euros(€)"};
    private ArrayList<Movimiento> movimientos = new ArrayList<>();
    
    public MoveTableModel() {
     //herriak =Model.inprimatuToArray() ;
     movimientos= Model.arrayMovimiento();
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
        return movimientos.size();
    }

    @Override
    public Object getValueAt(int row, int col) {

        switch (col) {
            case 0:
                return movimientos.get(row).getIdmovimiento();

            case 1:
                return movimientos.get(row).getDescripcion();
    
            case 2:
                return movimientos.get(row).getDate();  
            case 3:
                return movimientos.get(row).getEuro();
            
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