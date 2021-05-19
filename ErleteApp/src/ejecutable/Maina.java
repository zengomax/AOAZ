package ejecutable;


import gui.View;
import modelo.Model;
import dataAccess.Controller;


public class Maina {
    public static void main(String args[]) {
        View view = View.viewaSortuBistaratu();
        Model model = new Model();
        Controller controller = new Controller(model, view);
    }
}