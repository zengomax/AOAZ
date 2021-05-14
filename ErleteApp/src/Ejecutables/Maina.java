package Ejecutables;


import Model.Model;
import DataAccess.Controller;
import GUI.*;


public class Maina {
    public static void main(String args[]) {
        View view = View.viewaSortuBistaratu();
        Model model = new Model();
        Controller controller = new Controller(model, view);
    }
}