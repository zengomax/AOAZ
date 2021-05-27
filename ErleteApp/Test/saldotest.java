/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author moneo.asier
 */
import junit.framework.Assert;
import junit.framework.TestCase;
import modelo.Model;
import org.junit.Test;

public class saldotest extends TestCase {

    Model model = new Model();
    double saldoActual;
    double d1;
    double d2;
    
  
    public saldotest() {

        setUp();
    }

    public void setUp() {

        saldoActual = Double.parseDouble(model.mostrarSaldo());

    }

    @Test
    public void testkenketa() {
        double esperodena = Double.parseDouble(model.mostrarSaldo()) + 10;
        d1 = saldoActual - 50;

        model.actualizarSaldo(d1);//aplicamos la resta
        saldoActual = Double.parseDouble(model.mostrarSaldo());//obtenemos el saldo actualizado

        d2 = saldoActual + 60;
        model.actualizarSaldo(d2);//aplicamos la suma
        double emaitza = Double.parseDouble(model.mostrarSaldo());//esto es igual al saldo +10
        Assert.assertEquals(emaitza, esperodena);
    }

}
