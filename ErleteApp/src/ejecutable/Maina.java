package ejecutable;


import gui.View;
import modelo.Model;
import dataAccess.Controller;
import gui.Menu;


public class Maina {
    public static void main(String args[]) {
        Menu menu= Menu.MenuaSortuBistaratu();
     //   View view = View.viewaSortuBistaratu();
        Model model = new Model();
        Controller controller = new Controller(model, menu);
    }
}